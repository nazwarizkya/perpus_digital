<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.user_index', compact('users', 'roles'));
    }
    public function create()
    {

        $roles = Role::all();
        return view('user.user_create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',


        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->assignRole($request->roles);
        return redirect()->route('users.index')->with('susccess', 'user berhasil di tambahkan');
    }
    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        return view('user.edit_user', compact('users', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $request->password = bcrypt($request->password);
        }
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()->route('users.update')->with('susccess', 'user berhasil di edit');
    }
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();


        return redirect('/user');
    }
}
