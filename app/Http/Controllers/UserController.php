<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('name')->where('email', '!=', 'admin@gmail.com')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'check_list_count' => 'required|integer',
            'active' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->check_list_count = $request->check_list_count;
        $user->active = $request->active;
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('status', 'Пользователь изменен');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'active' => 'required|boolean',
        ]);
        $user = User::findOrFail($id);
        $user->active = $request->active;
        $user->save();

        return redirect()->route('users.index')->with('status', 'Статус пользователя изменен');
    }
}
