<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\PermissionType;
use App\Role;
use Illuminate\Http\Request;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware("permission:see roles")->only("index", "show");

        $this->middleware("permission:create roles")->only("create", "store");

        $this->middleware("permission:edit roles")->only("edit", "update");

        $this->middleware("permission:delete roles")->only("destroy");

    }

    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create(PermissionType $permissionType)
    {
        $permissionTypes = $permissionType::pluck('name', 'id');

        $permissions = Permission::all()->groupBy('permission_type_id');


        return view('roles.create', compact('permissions', 'permissionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreRole $request)
    {
        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('message', 'Role succesfully created, here is some money [̲̅$̲̅(̲̅5̲̅)̲̅$̲̅]');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Role $role, PermissionType $permissionType)
    {
        /**Van de permission types worden alleen het id en de naam gepakt*/
        $permissionTypes = $permissionType::pluck('name', 'id');

        /**hier worden de permissions gepakt die een type hebben en worden ze gesorteerd op hun permission type id*/
        $permissions = $role->permissions()->get()->groupBy('permission_type_id');

        return view('roles.show', compact('role', 'permissions', 'permissionTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Role $role, Permission $permission, PermissionType $permissionType)
    {
        $permissionTypes = $permissionType::pluck('name', 'id');

        $permissions = Permission::all()->groupBy('permission_type_id');

        return view('roles.edit', compact('permissions', 'role', 'permissionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(StoreRole $request, Role $role)
    {
        $role->name = $request->name;

        $role->syncPermissions($request->permissions);

        $role->save();

        return redirect()->route('roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
