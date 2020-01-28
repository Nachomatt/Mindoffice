<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware("permission:see users")->only("index", "show");
    //     $this->middleware("permission:create users")->only("create", "store");
    //     $this->middleware("permission:edit users")->only("edit", "permissionEdit", "update","permissionUpdate");
    //     $this->middleware("permission:delete users")->only("destroy");

    // }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $permissions = Permission::all();
        $roles = Role::all();
        return view('users.create', compact('user', 'permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::findById($request->role);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->syncPermissions($request->permissions);
        $user->assignRole($role);
        $user->save();
        return redirect()->route('users.index')->with('message', 'Yayy, a new user has been created (◕‿◕✿)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::with('roles', 'permissions')->where('id', $user->id)->first();
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('users.edit', compact('permissions', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.edit', $user);
    }



    public function roleEdit(User $user)
    {
        $roles = Role::all();

        return view('users.roleEdit', compact('permissions', 'user', 'roles'));
    }

    public function roleUpdate(Request $request, User $user)
    {
        if($request->role)
        {
            $user->syncRoles($request->role);
            $role = Role::where('id',$request->role)->with('permissions')->first();
            $user->syncPermissions($role->permissions);
        }
        else{
            $user->syncRoles($request->role);
        }
        return redirect()->route('users.roleEdit', $user);
    }
    public function permissionEdit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('users.permissionEdit', compact('permissions', 'user', 'roles'));
    }

    public function permissionUpdate(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return redirect()->route('users.permissionEdit', $user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
