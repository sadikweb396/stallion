<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('admin.role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);
        toast('Permission Created Successfully','success');
        return redirect('permissions');
    }

    public function edit(Permission $permission)
    {
        return view('admin.role-permission.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);
        toast('Permission Updated Successfully','success');
        return redirect('permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status','Permission Deleted Successfully');
    }

    public function permissionSearch(Request $request)
    {
        $query = $request->get('query');  
        $permissions = Permission::where('name', 'like', '%' . $query . '%')
        ->get();
        return view('admin.role-permission.permission.partials.permission_table', compact('permissions'));
    }
}