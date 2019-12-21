<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use lluminate\Database\Eloquent\Collection::visits;
use lluminate\Database\Eloquent\Collection\visits;
use App\Post;
use App\User;
use App\Comment;
use App\Notifications\newComment;
use App\Notifications\newPost;
use App\Follow;
use Auth;
use DB;
//use App\Http\Controllers\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['about']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth::user()->id);
        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);
        $followers = $user->followers;
        $followings = $user->followings;

        // $posts = Post::orderBy('posts.updated_at', 'desc')->paginate(20);
        $posts = Post::orderBy('posts.updated_at', 'desc')
        ->select('posts.*')
        ->join('followers', 'followers.leader_id', '=', 'posts.user_id')
        // ->where([['followers.follower_id', '=', $user->id], ['posts.user_id', '=', '1']])
        // ->where('posts.user_id', $user->id)
        ->where('followers.follower_id', $user->id)
        ->paginate(20);

        $postas = Post::orderBy('posts.views', 'desc')->paginate(20);

        $myposts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', Auth::user()->id)->paginate(3);

        $comments = Comment::orderBy('comments.updated_at', 'desc')
        ->paginate(20);

        return view('posts.index', compact('user', 'users', 'followers' , 'followings', 'posts', 'postas', 'myposts'), ['user' => $user])->with('posts', $posts)->with('postas', $postas)->with('myposts', $myposts)->with('user', $user)->with('comments', $comments);
        // return response()->json($posts);
        // return response()->json($users);
    }

    public function explore()
    {
        $user = User::find(auth::user()->id);
        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);
        $followers = $user->followers;
        $followings = $user->followings;

        $postas = Post::orderBy('posts.views', 'desc')->paginate(20);

        $comments = Comment::orderBy('comments.updated_at', 'desc')
        ->paginate(20);

        return view('posts.explore', compact('users', 'followers' , 'followings', 'postas'), ['user' => $user])->with('postas', $postas)->with('user', $user)->with('comments', $comments)->with('followers', $followers)->with('followings', $followings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);
        //return 123; 'image' => , 'file' => 'nullable|max:6000'

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //$path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $path = $request->file('file')->storeAs('public/files/images', $filenameToStore);
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            }

            //create post

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
           
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $post->image = $filenameToStore;
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $post->file = $filenameToStore;
            }
            
            $post->save();

            return redirect('/')->with('success', 'Post created successfully');
            
            
        }else{
            $filenameToStore = 'NoFile';

            //create post

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
           
            $post->save();

            return redirect('/')->with('success', 'Post created successfully');
        }

    }

    public function post(Request $request)
    {

        // $user = User::find($profileId);

        $this->validate($request, ['body' => 'required']);
        //return 123; 'image' => , 'file' => 'nullable|max:6000'

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //$path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $path = $request->file('file')->storeAs('public/files/images', $filenameToStore);
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            }

            //create post

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->post_user_id = $request->input('user_id');
            // $post->user_id = $user->id;
           
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $post->image = $filenameToStore;
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $post->file = $filenameToStore;
            }
            
            $post->save();

            return redirect()->back()->with('success', 'Post created successfully');
            
            
        }else{
            $filenameToStore = 'NoFile';

            //create post

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = $request->input('user_id');
            $post->post_user_id = $request->input('user_id');
            $post->post_user_name = $request->input('user_name');
            // $post->user_id = $user->id;

            $post->save();

            User::find($post->user_id)->notify(new newPost);
            return redirect('/')->with('success', 'Post created successfully');
        }

    }

    public function store_comments(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

            $comment = new Comment;
            $comment->body = $request->input('body');
            $comment->post_id = $request->input('post_id');
            $comment->post_user_id = $request->input('user_id');
            $comment->user_id = auth()->user()->id;
            
            $comment->save();

            User::find($comment->post_user_id)->notify(new newComment);

            return redirect()->back()->with('success', 'successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        $user = User::find($id);

        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

        
        $posts = Post::all();

        Post::where('id', '=', $id)
        ->update([
            // Increment the view counter field
            'views' => 
            $post->views + 1        ,
            // Prevent the updated_at column from being refreshed every time there is a new view
            'updated_at' => \DB::raw('updated_at')   
        ]);

        $comments = Comment::orderBy('comments.updated_at', 'desc')
        ->paginate(20);

        return view('posts.show', compact('user', 'users', 'posts', 'comments'))->with('post', $post)->with('comments', $comments)->with('users', $users);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $user = User::find($id);

        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

        

        $posts = Post::orderBy('posts.updated_at', 'desc');
       
        if(auth()->user()->id !== $post->user_id){
            return redirect('/')->with('error', 'Unauthorised page');
        }

        return view('posts.edit')->with('post', $post)->with('user', $user)->with('users', $users);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['body' => 'required']);
        //return 123;

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //$path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $path = $request->file('file')->storeAs('public/files/images', $filenameToStore);
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "zip" || $extension == "rar" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            }

            //create post

            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            //$post->document = $filenameToStore;

            //$extension = $request->file('file')->getClientOriginalExtension();
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $post->image = $filenameToStore;
            }elseif ($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "zip" || $extension == "rar" || $extension == "pptx" || $extension == "tex" || $extension == "txt") {
                $post->file = $filenameToStore;
            }
            
            $post->save();

            return redirect()->back()->with('success', 'Post created successfully');
            
            
        }else{
            $filenameToStore = 'NoFile';

            //update post

            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            //$post->document = $filenameToStore;
            
            $post->save();

            return redirect()->back()->with('success', 'Post updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/')->with('error', 'Unauthorised page');
        }

        Storage::delete('public/files/documents/'.$post->file);
        Storage::delete('public/files/images/'.$post->image);
        $post->delete();

        return redirect('/')->with('success', 'Post deleted successfully');
        // return redirect()->back();
    }
}
