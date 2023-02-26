<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Directory;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function dashboard()
    {
        $users = User::where('id',100001);
        $directories = Directory::where('user_id',auth()->id())->get();
        return view('admin.dashboard', compact('users','directories'));
    }
}
