<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;
use App\Http\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index(){
        return view('dashboard.index');
    }
    
    public function roles(){
        $users = User::orderBy('name')->paginate(10);
        $rol = Role::orderBy('name')->pluck('name','name')->all();
        return view('dashboard.roles')->withUsers($users)->withRol($rol);    
    }
    
    public function rolesassign(Request $request)
    {
        
        $currentrole = $request->input('roles');
        //dd($currentrole);
        $user_id = $request->input('user');
        $page = $request->input('page');
        $user = User::findOrFail($user_id);
        
        if($user->hasRole($currentrole)){
            $message = "user already has this role";
        }else{
            $user->assignRole($currentrole);
            $message = "Role assigned successfully";
        }
        
        return Redirect::route('users.roles', ['page' => $page]);    
    }
}
