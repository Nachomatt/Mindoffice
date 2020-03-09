<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use App\PermissionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("permission:see permissions")->only("index", "show");
        $this->middleware("permission:create permissions")->only("create", "store");
        $this->middleware("permission:edit permissions")->only("edit", "update");
        $this->middleware("permission:delete permissions")->only("destroy");

    }

    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionTypes = PermissionType::all();
        return view('permissions.create', compact('permissions','permissiontypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        $permission->permission_type_id = $request->permission_type_id;
        $permission->save();
        return redirect()->route('permissions.index')->with('message', 'ヾ(⌐■_■)ノ♪ Continue jamming, Permission has been added partner.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        dd($permission->permissiontype);
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permissionTypes = PermissionType::all();
        return view('permissions.edit', compact('permission','permissiontypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->permission_type_id = $request->permission_type_id;
        $permission->save();

        return redirect()->route('permissions.index')->with('message', '\ (•◡•) /Woop Woop! Permission successfully edited\ (•◡•) /');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('message', '\ (•◡•) /Woop Woop! Permission successfully deleted\ (•◡•) /');
    }
}
