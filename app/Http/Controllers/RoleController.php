<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware("permission:see roles")->only("index", "show");
    //     $this->middleware("permission:create roles")->only("create", "store");
    //     $this->middleware("permission:edit roles")->only("edit", "update");
    //     $this->middleware("permission:delete roles")->only("destroy");

    // }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();


        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // $permissions= Role::with("permissions")->get();
        $permission = $role->permissions()->get();
        return view('roles.show', compact('role', 'permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();


        return view('roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
