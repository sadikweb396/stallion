<?php

namespace  App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use  Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:update user', ['only' => ['update','edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);
       
        
        $user = User::create([
                        'username' => $request->first_name . ' ' . $request->last_name, 
                        'first_name' => $request->first_name,
                        'last_name'=>$request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);
        toast('User created successfully with roles');
        return redirect('/users')->with('status','User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('admin.role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'username' => $request->first_name . ' ' . $request->last_name, 
            'first_name' => $request->first_name,
            'phone' => $request->phone,
            'last_name'=>$request->last_name,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        toast('User Updated Successfully with roles');
        return redirect('/users')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        toast('User Delete Successfully');
        return redirect('/users')->with('status');
    }

    public function userSearch(Request $request)
    {
        $query = $request->get('query');  // Get the search query
        $users = User::where('username', 'like', '%' . $query . '%')
        ->get();
        return view('admin.role-permission.user.partials.user_table', compact('users'));
    }
}