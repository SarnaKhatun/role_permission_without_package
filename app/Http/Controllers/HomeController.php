<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        //assign role
//        $role = Role::where('slug', 'editor')->first();
//        $user->roles()->attach($role);
//        dd($user->roles);
//        dd($user->hasRole('author'));
        //check permission
//        $permission = Permission::first();
//        $user->permissions()->attach($permission);
//        dd($user->permissions);
//        dd($user->hasPermission('add-post'));
//        dd($user->can('add-post'));

        return view('home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        return view('home');
//    }
}
