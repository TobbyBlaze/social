{{-- @extends('layouts.app') --}}
@extends('layouts.temp')

@section('content')


<section class="banner-bottom" id="about">
		<div class="container">
            <div class="inner-sec">
                <div class="row middle-grids">
                    <div class="col-lg-4 advantage-grid-info1">
                        <div class="advantage_left1 text-center">
                            <img src="../storage/files/profile_pics/{!!$user->image!!}" style="width:150px; height:150px" class="rounded-circle" alt="profile picture">
                        </div>
                    </div> 
					<div class="col-lg-8 advantage-grid-info">
                        <div class="advantage_left">
                            <h3 class="heading text-capitalize mb-sm-5 mb-4">Hi. I'm <span>{!!$user->title!!} {!! $user->first_name!!} {!! $user->last_name!!}({!!$user->name!!}).</span></h3>
                            <p class="mt-4" style="color:black;">I am a {!!$user->status!!} in the University of Cape Coast. </p>
                            @if ($user->bio)
                                <p class="mt-4" style="color:black;"><span style="font-size:+2;">Biography:</span> {!!$user->bio!!}</p>
                            @endif
                            
							<p class="mt-4" style="color:black;">Contact me on <a href="mailto:{!!$user->email!!}">{!!$user->email!!}</a></p>
						</div>
                    </div>
                    <br />
                    {{-- @foreach ($followers as $follower)
                        {{auth()->follower()}}
                    @endforeach --}}
                    {{-- {{$me = null}} --}}
                    {{-- {{$me = $user}} --}}
                    <br />
                    <span hidden>
                    {{$me = auth()->user()}}
                    </span>
                    {{-- {{$user->id}}
                    <br />
                    {{$user->followers}}
                    <br />
                    {{$me->followers}}
                    <br /> --}}
                    {{-- @foreach ($me->followers as $follower)
                    {{$follower->id}}
                    @endforeach --}}
                    {{-- {{$user->followers->last()->name}} --}}
                    <br />
                    @if((($me->followings->count() < 1) && ($me->id != $user->id)) || (($user->followers->count() < 1) && ($me->id != $user->id)))
                        <a id="follow1" href="{{route('user.follow', $user->id)}}" class="btn btn-success" style="padding:1px;">Follow</a>
                    @endif
                    {{-- @if(($user->followers->count() < 1) && ($me->id != $user->id))
                        <a id="follow2" href="{{route('user.follow', $user->id)}}" class="btn btn-danger">Follow</a>
                    @endif --}}

                    @foreach ($user->followers as $follower)
                    {{-- {{$follower}} --}}
                        @foreach ($me->followings as $mefollowing)
                            {{-- {{$follower->id}}
                            <br />
                            <br />
                            {{auth()->user()->id}}
                            <br />
                            <br />
                            {{$mefollowing->id}}
                            <br />
                            <br />
                            {{$user->id}}
                            <br /> --}}
                            @if (($follower->id == auth()->user()->id) && ($mefollowing->id == $user->id))
                                {{-- {{$follower->id}}
                                {{auth()->user()->id}}
                                {{$mefollowing}}
                                {{$user->id}} --}}
                                <a id="unfollow" href="{{route('user.unfollow', $user->id)}}" class="btn btn-danger" style="padding:1px;">Unfollow</a>
                            @endif
                            @if (($me->id != $follower->id) && ($mefollowing->id != $user->id) && ($me->id != $user->id))
                                {{-- {{$me->id}}
                                {{$follower->id}}
                                {{$mefollowing->id}}
                                {{$user->id}} --}}
                                <a id="follow" href="{{route('user.follow', $user->id)}}" class="btn btn-success" style="padding:1px;">Follow</a>
                            @endif
                        @endforeach
                    @endforeach
                    
                    
                    <br />&nbsp
                    <span class="btn btn-primary" id="followers" style="padding:1px;"> <a href="{{$user->id}}/followers" style="color:white;"> {{$user->followers->count()}} Followers </a></span> 
                    {{-- <span id="showfollowers" hidden>
                        @foreach($user->followers as $follower)
                            {{$follower->name}}
                        @endforeach
                    </span> --}}
                    <br />&nbsp
                    <span class="btn btn-primary" style="padding:1px;"><a href="{{$user->id}}/followings" style="color:white;"> {{$user->followings->count()}} Followings </a></span> 
                    
                </div>
                <br />
                <span class="btn btn-primary" style="padding:1px;"> {{$user->posts->count()}} Posts</span> 
                @if(Auth::user()->id == $user->id)
                    <a href="{{$user->id}}/edit" class="btn btn-primary" style="padding:1px;"> Edit profile </a>
                @endif
                <br />
                <br />
                <span style="color:black;">Joined on {!!$user->created_at->toDayDateTimeString()!!} </span>
                <br />
                <br />
                @if($user->phone_number_1 != null || $user->phone_number_2 != null)
                <span class="btn">Phone number(s)  {!!$user->phone_number_1!!} &nbsp {!!$user->phone_number_2!!}</span>
                <br />
                @endif
                @if($user->department != null)
                <span class="btn">Belongs to the deparment of {!!$user->department!!}</span> 
                <br />
                @endif
                @if($user->school != null)
                <span class="btn">Belongs to the school of {!!$user->school!!}</span> 
                <br />
                @endif
                @if($user->college != null)
                <span class="btn">Belongs to the college  of {!!$user->college!!}</span> 
                <br />
                @endif
            </div>
		</div>
    </section>
    <br />
    <br />


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                {{--  --}}
                @if(count($posts)>0)
                    <h5>
                        Images
                    </h5>
                    @foreach ($posts as $post)
                        @if(!Auth::guest())
                                @if($post->image)
                                    <img id="image" src="../storage/files/images/{!!$post->image!!}/" style="width:60px; heigth:60px;" class="" alt="picture"/>
                                    <a hidden id="dimage" class="btn btn-primary" style="padding:1px;" title="Click to download image" href="../storage/files/images/{{$post->image}}" download> Download image </a>
                                @else
                                    <span hidden></span>
                                @endif                              
                        @endif
                    @endforeach
                    {{$posts->links()}}
                    <br />
                @endif
                {{--  --}}

                {{--  --}}
                @if(count($posts)>0)
                    <h5>
                        Documents
                    </h5>
                    @foreach ($posts as $post)
                        @if(!Auth::guest())
                                @if($post->file)
                                    <a class="btn btn-primary" style="padding:1px;" title="Click to download file" href="../storage/files/documents/{{$post->file}}" download> Download {{$post->file}} </a>
                                @else
                                    <span hidden></span>
                                @endif
                                <br />                          
                        @endif
                    @endforeach
                    {{$posts->links()}}
                    <hr />
                @endif
                {{--  --}}
                @foreach ($user->followers as $follower)
                    @foreach ($me->followings as $mefollowing)
                        @if (($follower->id == auth()->user()->id) && ($mefollowing->id == $user->id))
                            @include('posts.createpost')
                        @endif
                    @endforeach
                @endforeach
                <br />

                <hr />
                
                @if(count($posts)>0)
                    @foreach ($posts as $post)
                        @if(!Auth::guest())
                        @if ($post->post_user_id == null)
                            <div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
                                <br />
                                <div>
                                <img style="width:40px; height:40px" src="../storage/files/profile_pics/{!!$post->user->image!!}" align="left" class="rounded-circle" alt="profile picture"/>
                                <h5 class="text-left"><a href="user/{{$post->user->id}}" class="black"> &nbsp {!!$post->user->name!!} </a></h5>
                                <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
                                </div>
                                <br />
                                <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                                <br />
                                <p> <span style="display:block; color:black; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                                <br />
                                {{--<img style="width:100%" src="storage/files/images{{$post->image}}" />--}}
                                @if($post->file)
                                    <p>
                                    <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="../storage/files/documents/{{$post->file}}" download> Download {{$post->file}} </a>
                                    </p>
                                @endif
                                @if($post->image)
                                    <img src="../storage/files/images/{!!$post->image!!}/" class="rounded img-fluid" alt="picture"/>
                                    <p>
                                    <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="../storage/files/images/{{$post->image}}" download> Download image </a>
                                    </p>
                                @endif
                                <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
                                <br />
                                <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
                                <br />
                                <div class="text-center">
                                    @if($post->views > 0)
                                        &nbsp <a href="../show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> &nbsp Views: {{$post->views}} &nbsp </a>
                                    @endif
                                    <a href="../show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> View post </a> &nbsp 
                                    <br />
                                    @include('posts.create_comments')
                                    <br />
                                </div>
                                                
                            </div>
                            <hr>
                        @endif

                        @if ($post->post_user_id != null)
                            <div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
                                <br />
                                <div>
                                <img style="width:40px; height:40px" src="../storage/files/profile_pics/{!!$post->user->image!!}" align="left" class="rounded-circle" alt="profile picture"/>
                                <h5 class="text-left"><a href="user/{{$post->user->id}}" class="black">&nbsp {{$post->post_user_name}}
                                >>
                                {!!$post->user->name!!} </a></h5>
                                <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
                                </div>
                                <br />
                                <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                                <br />
                                <p> <span style="display:block; color:black; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                                <br />
                                {{--<img style="width:100%" src="storage/files/images{{$post->image}}" />--}}
                                @if($post->file)
                                    <p>
                                    <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="../storage/files/documents/{{$post->file}}" download> Download {{$post->file}} </a>
                                    </p>
                                @endif
                                @if($post->image)
                                    <img src="../storage/files/images/{!!$post->image!!}/" class="rounded img-fluid" alt="picture"/>
                                    <p>
                                    <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="../storage/files/images/{{$post->image}}" download> Download image </a>
                                    </p>
                                @endif
                                <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
                                <br />
                                <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
                                <br />
                                <div class="text-center">
                                    @if($post->views > 0)
                                        &nbsp <a href="../show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> &nbsp Views: {{$post->views}} &nbsp </a>
                                    @endif
                                    <a href="../show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> View post </a> &nbsp 
                                    <br />
                                    @include('posts.create_comments')
                                    <br />
                                </div>
                                                
                            </div>
                            <hr>
                        @endif
                        @endif
                    @endforeach
                    {{$posts->links()}}
                @else
                    <div class="card">
                        <h6 class="text-center">There are no posts available for you.</h6>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection