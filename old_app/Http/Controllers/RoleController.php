<?php

namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:update role', ['only' => ['update','edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.role-permission.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',

                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);
        toast('Role Created Successfully','success');
        return redirect('roles')->with('status','Role Created Successfully');
    }

    public function edit(Role $role)
    {
    
        return view('admin.role-permission.role.edit',[
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);
        toast('Role Updated Successfully','success');
        return redirect('roles')->with('status','Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);

        $role->delete();
        toast('Role Deleted Successfully');
        return redirect('roles')->with('status','Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('admin.role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }

    public function roleSearch(Request $request)
    {
        $query = $request->get('query');  // Get the search query
        $roles = Role::where('name', 'like', '%' . $query . '%')
        ->get();

        return view('admin.role-permission.role.partials.role_table', compact('roles'));
    }
}