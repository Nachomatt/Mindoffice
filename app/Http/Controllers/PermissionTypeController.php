<?php

namespace App\Http\Controllers;

use App\PermissionType;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissionTypeController extends Controller
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
        $permissionTypes = PermissionType::all();
        return view('permissionTypes.index', compact('permissionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('permissionTypes.create', compact('permissionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, PermissionType $permissionType)
    {
        $permissionType->name = $request->name;
        $permissionType->save();
        return redirect()->route('permissionTypes.index')
            ->with('message', 'ヾ(⌐■_■)ノ♪ Continue jamming, Permission Type has been added partner.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(PermissionType $permissionType)
    {
        return view('permissionTypes.show', compact('permissionType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PermissionType $permissionType)
    {
        return view('permissionTypes.edit', compact('permissionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PermissionType $permissionType)
    {
        $permissionType->name = $request->name;
        $permissionType->save();
        return redirect()->route('permissionTypes.index')
            ->with('message', '\ (•◡•) /Woop Woop! Permission Type successfully edited\ (•◡•) /');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PermissionType $permissionType)
    {
        $permissionType->delete();

        return redirect()->route('permissionTypes.index')
            ->with('message', '\ (•◡•) /Woop Woop! Permission Type successfully deleted\ (•◡•) /');
    }
}
