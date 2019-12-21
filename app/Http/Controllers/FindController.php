<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class FindController extends Controller
{
    public function post()
    {
        $q = Input::get ( 'q' );

        $user = User::find($userId);
        $followers = $user->followers;
        $followings = $user->followings;

        $posts = Post::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $posts ) > 0)
            return view ( 'pages.found-posts', compact('user', 'followers' , 'followings', 'posts') )->with('posts', $posts)->withDetails ( $posts )->withQuery ( $q );
        else
            return view ( 'pages.found-posts', compact('user', 'followers' , 'followings', 'posts') )->with('posts', $posts)->withMessage ( 'No Details found. Try to search again !' );
    }

    public function user()
    {
        $q = Input::get ( 'q' );
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $user ) > 0)
            return view ( 'pages.found-users', compact('user', 'followers' , 'followings', 'posts') )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'pages.found-users', compact('user', 'followers' , 'followings', 'posts') )->withMessage ( 'No Details found. Try to search again !' );
    }

    public function all(){
        $q = Input::get ( 'q' );
        $posts = Post::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->paginate(20);
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate(20);

        $user1 = User::find(auth::user()->id);
        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.updated_at', 'desc')->paginate(10);

        $followers = $user1->followers;
        $followings = $user1->followings;

        if($q != null){
            if (count($posts)>0||count($user)>0){

                //return response()->json(USER::all());
                return view ( 'pages.found-all', compact('user', 'users', 'followers' , 'followings', 'posts') )->withDetails (  $user, $users, $posts )->withQuery ( $q );
            }else{
                ?>
                <script>
                alert("Search not found!");
                </script>
                <?php
                return view ( 'pages.found-all', compact('user', 'users', 'followers' , 'followings', 'posts') )->withMessage ( 'No Details found. Try to search again !' );
            }
        }else{
            return redirect()->back();
        }
    }
}
