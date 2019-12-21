<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Follow;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\newFollower;
use App\Notifications\newComment;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function viewProfile(User $user)

    public function notification(int $profileId){
        $user = User::find($profileId);
        // User::find($profileId)->notify(new newFollower);

        if($user){
            $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

            $followers = Follow::where('followers.follower_id', $user->id)->get();
            $followings = Follow::where('followers.leader_id', $user->id)->get();

            $posts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', $user->id)->paginate(20);
            $comments = Comment::orderBy('comments.updated_at', 'desc')
            ->paginate(20);
            $post = Post::find($user->id);

            return view('user.notification', compact('user', 'users', 'followers' , 'followings', 'posts', 'post', 'comments'), ['user' => $user])->with('posts', $posts)->with('post', $post)->with('user', $user)->with('users', $users)->with('followers', $followers)->with('followings', $followings)->with('comments', $comments);
        }else{
            return redirect()->back();
        }
    }

    public function notificationRead(int $profileId){
        $user = User::find($profileId);
        // User::find($profileId)->notify(new newFollower);

        if($user){
            $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

            $followers = Follow::where('followers.follower_id', $user->id)->get();
            $followings = Follow::where('followers.leader_id', $user->id)->get();

            $posts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', $user->id)->paginate(20);
            $comments = Comment::orderBy('comments.updated_at', 'desc')
            ->paginate(20);
            $post = Post::find($user->id);

            auth()->user()->unReadNotifications->markAsRead();
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    public function viewProfile(int $profileId)
    {
        $user = User::find($profileId);
        if($user){
        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

        // $followers = $user->followers;
        // $followings = $user->followings;
        $auth = Auth::user();

        $followers = Follow::where('followers.follower_id', $user->id)->get();
        $followings = Follow::where('followers.leader_id', $user->id)->get();

        $pfollower = Follow::orderBy('followers.created_at', 'desc')
        ->select('followers.*')
        ->join('users', 'users.id', '=', 'followers.follower_id')
        ->where('followers.follower_id', $auth->id)
        // ->where(auth()->user()->id, $user->id)
        // ->where('users.id', $user->id)
        ->get();
        $pfollowing = Follow::where('followers.leader_id', $user->id)->get();

        // $posts = Post::orderBy('posts.updated_at', 'desc')
        // ->select('posts.*')
        // ->join('followers', 'followers.leader_id', '=', 'posts.user_id')
        // // ->where([['followers.follower_id', '=', $user->id], ['posts.user_id', '=', '1']])
        // // ->where('posts.user_id', $user->id)
        // ->where('followers.follower_id', $user->id)
        // ->paginate(20);

        // $follower = User::join('followers', 'followers.follower_id', '=', 'users.id')
        // ->where('followers.follower_id', $user->id)->get();

        $posts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', $user->id)->paginate(20);
        //$users = User::orderBy('updated_at', 'desc');

        $comments = Comment::orderBy('comments.updated_at', 'desc')
        ->paginate(20);
        
        return view('user.profile', compact('user', 'users', 'followers', 'pfollower' , 'followings', 'posts'), ['user' => $user])->with('posts', $posts)->with('user', $user)->with('users', $users)->with('comments', $comments)->with('followers', $followers)->with('pfollower', $pfollower)->with('followings', $followings);
        }else{
            return redirect()->back();
        }
        
    }

    public function followers(int $profileId)
    {
        $user = User::find($profileId);

        if($user){
            $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

            // $followers = $user->followers;
            // $followings = $user->followings;

            $followers = Follow::where('followers.follower_id', $user->id)->get();
            $followings = Follow::where('followers.leader_id', $user->id)->get();

            $posts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', $user->id)->paginate(20);

            return view('user.followers', compact('user', 'users', 'followers' , 'followings', 'posts'), ['user' => $user])->with('posts', $posts)->with('user', $user)->with('users', $users)->with('followers', $followers)->with('followings', $followings);
        }else{
            return redirect()->back();
        }
    }

    public function followings(int $profileId)
    {
        $user = User::find($profileId);

        if($user){
            $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

            // $followers = $user->followers;
            // $followings = $user->followings;

            $followers = Follow::where('followers.follower_id', $user->id)->get();
            $followings = Follow::where('followers.leader_id', $user->id)->get();

            $posts = Post::orderBy('updated_at', 'desc')->where('posts.user_id', $user->id)->paginate(20);

            return view('user.followings', compact('user', 'users', 'followers' , 'followings', 'posts'), ['user' => $user])->with('posts', $posts)->with('user', $user)->with('users', $users)->with('followers', $followers)->with('followings', $followings);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function followUser(int $profileId)
    {
        $user = User::find($profileId);

        if(!$user) {
            
            return redirect()->back()->with('error', 'User does not exist.'); 
        }

        //important
        $user->followers()->attach(auth()->user()->id);

        User::find($profileId)->notify(new newFollower);

        // if(! $user->isFollowing(auth()->user()->id)){ 
        //     $user->followers()->attach(auth()->user()->id);

        //     User::find($profileId)->notify(new newFollower);
        // }

        return redirect()->back()->with('success', 'Successfully followed the user.');
    }

//     public function isFollowing(User $user)
// {
//     return !is_null($this->following()->where('user_id', $user->id)->first());
// }

    public function unFollowUser(int $profileId)
    {
        $user = User::find($profileId);
        
        if(! $user) {
            return redirect()->back()->with('error', 'User does not exist.'); 
        }
        $user->followers()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    public function isFollowing(int $profileId)
    {
        $user = User::find($profileId);
        
        return !! $user->followings()->where('leader_id', auth()->user()->id)->count();
    }

    public function isFollower(int $profileId)
    {
        $user = User::find($profileId);
        
        return !! $user->followers()->where('follower_id', auth()->user()->id)->count();
    }

    // public function show(int $userId)
    // {
    //     $posts = Post::orderBy('updated_at', 'desc')->paginate(20);
    //     $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

    //     $user = User::find($userId);
    //     $followers = $user->followers;
    //     $followings = $user->followings;
    //     return view('user.show', compact('user', 'users', 'followers' , 'followings', 'posts'));
    // }

    public function edit(User $user)
    {   
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);

        $user = Auth::user();
        $users = User::where('users.status', '!=', auth()->user()->status)->orWhere('users.department', '=', auth()->user()->department)->orWhere('users.school', '=', auth()->user()->school)->orWhere('users.college', '=', auth()->user()->college)->orderBy('users.created_at', 'desc')->paginate(10);

        $followers = $user->followers;
        $followings = $user->followings;
        return view('user.edita', compact('user', 'users', 'followers' , 'followings', 'posts'));
    }

    public function find(){
        $user = User::all();
        //$followers = $user->followers;
        //$followings = $user->followings;

        return view('pages.find');
        // return view('pages.find', compact('user', 'followers' , 'followings', 'posts'));
    }

    public function update(Request $request, $id)
    {

        $user = Auth::user();

        // $this->validate($request, ['password' => 'required']);
        //return 123;

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //$path = $request->file('file')->storeAs('public/files/documents', $filenameToStore);
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $path = $request->file('file')->storeAs('public/files/profile_pics', $filenameToStore);
            }else{

            }

            //update user

            $user = User::find($id);
            $user->name = $request->input('name');
            // $user->title = $request->input('title');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            // $user->status = $request->input('status');
            $user->bio = $request->input('bio');
            $user->email = $request->input('email');
            $user->phone_number_1 = $request->input('phone_number_1');
            $user->phone_number_2 = $request->input('phone_number_2');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->department = $request->input('department');
            $user->school = $request->input('school');
            $user->college = $request->input('college');

            //$post->document = $filenameToStore;

            //$extension = $request->file('file')->getClientOriginalExtension();
            
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){
                $user->image = $filenameToStore;
            }else{

            }
            
            $user->save();

            return redirect()->back()->with('success', 'successfully');
            
            
        }else{
            $filenameToStore = 'NoFile';

            //update user

            $user = User::find($id);
            $user->name = $request->input('name');
            // $user->title = $request->input('title');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            // $user->status = $request->input('status');
            $user->bio = $request->input('bio');
            $user->email = $request->input('email');
            $user->phone_number_1 = $request->input('phone_number_1');
            $user->phone_number_2 = $request->input('phone_number_2');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->department = $request->input('department');
            $user->school = $request->input('school');
            $user->college = $request->input('college');
            
            $user->save();

            return redirect()->back()->with('success', 'successfully');
        }

    }
}
