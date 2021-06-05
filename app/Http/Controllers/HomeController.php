<?php

namespace App\Http\Controllers;

use App\Post;
// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::latest()->paginate(3);

        return view('posts.index', ['posts' => $posts])
        ->with('i', (request()->input('page', 1) - 1) * 3);
    }

}

