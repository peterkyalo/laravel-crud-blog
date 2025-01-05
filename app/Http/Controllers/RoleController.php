<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('role-permission.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:roles,name'],
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role-permission.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:roles,name,' . $role->id],
        ]);

        $role->update(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    // Assign permission to role
    public function assignPermissionToRole($roleId)
    {
        // dd($roleId);
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();
        return view('role-permission.role.add-permissions', compact('role', 'permissions'));
    }

    //sync permissions to a role
    public function givePermissionToRole(Request $request, $roleId)
    {
        // dd($request->all());
        $role = Role::findOrFail($roleId);
        // dd($request->permission);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success', 'Permissions assigned to role successfully.');
    }
}
