<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use Auth;
use DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['about']]);
    }
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function find(){
        $user = User::all();
        $followers = $user->followers;
        $followings = $user->followings;


        return view('pages.find', compact('user', 'followers' , 'followings', 'posts'));
    }

    public function notification(){
        $posts = Post::orderBy('posts.updated_at', 'desc')->paginate(20);
        $user = User::all();
        // $followers = $user->followers;
        // $followings = $user->followings;
        return view('pages.notification');
    }

    public function profile(){
        return view('pages.profile');
    }
}
