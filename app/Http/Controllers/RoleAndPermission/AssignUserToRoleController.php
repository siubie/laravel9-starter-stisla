<?php

namespace App\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserToRoleRequest;
use App\Http\Requests\UpdateUserToRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignUserToRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:assign.user.index')->only('index');
        $this->middleware('permission:assign.user.create')->only('create', 'store');
        $this->middleware('permission:assign.user.edit')->only('edit', 'update');
    }
    //
    public function index()
    {
        //
        // $users = User::with('roles')->paginate(5);
        $users = User::with('roles')->paginate(5);
        return view('permissions.user.index', compact('users'));
    }

    function create()
    {
        //
        $roles = Role::all();
        $users = User::all();
        return view('permissions.user.create', compact('roles', 'users'));
    }

    function store(StoreUserToRoleRequest $request)
    {
        //
        $user = User::findOrFail($request->user);
        $user->assignRole($request->roles);
        return redirect()->route('assign.user.index')->with('success', 'User Assigned To Role Successfully');
    }

    public function edit(User $user)
    {
        //
        $roles = Role::all();
        $users = User::all();
        return view('permissions.user.edit', compact('user', 'roles', 'users'));
    }

    public function update(UpdateUserToRoleRequest $request, User $user)
    {
        //
        $user->syncRoles($request->roles);
        return redirect()->route('assign.user.index')->with('success', 'User Assigned To Role Successfully');
    }
}
