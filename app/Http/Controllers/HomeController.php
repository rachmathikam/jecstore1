<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;


class HomeController extends Controller
{
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
    public function index()
    {
        return view('/pages/home/index');
        // $role = Auth::user()->role;
        // if($role == "admin"){
        //     alert()->success('Success','Login Success to Admin Panel!');
        //     return redirect()->to('admin');
        // } else if($role == "user"){
        //     alert()->success('Success','Login Success to Teknisi Panel!');
        //     return redirect()->to('user');
        // } else {
        //     return redirect()->to('logout');
        // }
    }
}
