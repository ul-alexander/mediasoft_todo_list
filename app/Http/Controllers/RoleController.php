<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('name')->where('name', '!=', 'Администратор')->get();
        $permissions = Permission::orderBy('name')->get();
        return view('roles.index', compact(['roles', 'permissions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('roles.create', compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $newRole = Role::create([
            'name' => $request->name
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $newRole->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('status', 'Роль создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('name', '!=', 'Администратор')->findOrFail($id);
        $permissions = Permission::orderBy('name')->get();
        return view('roles.edit', compact([
            'role',
            'permissions',
        ]));
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
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);
        $role = Role::where('name', '!=', 'Администратор')->findOrFail($id);
        $role->update([
            'name' => $request->name
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('status', 'Роль изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('roles.index')->with('status', 'Роль Удалена!');
    }
}
