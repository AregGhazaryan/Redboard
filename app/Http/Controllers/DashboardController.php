<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $ind = Post::where('user_id',$user_id)->orderBy('created_at','DESC')->paginate(5);
        // $user = User::find($user_id);
        return view('dashboard')->with('posts',$ind);
    }
}
