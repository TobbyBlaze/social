{{-- @extends('layouts.app') --}}
@extends('layouts.tem')

@section('content')
<div class="container">
    @if(isset($details))
        <p> Your Search results for <b> {{ $query }} </b> are </p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Profession</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td><a href="user/{{$user->id}}" class="black"><img style="width:40px; height:40px" src="storage/files/profile_pics/{!!$user->image!!}" align="left" class="rounded-circle" alt="profile picture"/>{{$user->name}}</a></td>
                <td><a href="user/{{$user->id}}" class="black">{{$user->email}}</a></td>
                <td><a href="user/{{$user->id}}" class="black">{{$user->status}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br />

    @if(count($posts)>0)
            @foreach ($posts as $post)
            @if ($post->post_user_id == null)
                <div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
                    <br />
                    <div>
                    <img style="width:40px; height:40px" src="storage/files/profile_pics/{!!$post->user->image!!}" align="left" class="rounded-circle" alt="profile picture"/>
                <h5 class="text-left"><a href="user/{{$post->user->id}}" class="black"> &nbsp {!!$post->user->name!!} </a></h5>
                <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
                    <br />
                    <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                    <br />
                    <p> <span style="display:block; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                    <br />
                    
                    @if($post->file)
                        <p>
                        <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="storage/files/documents/{{$post->file}}" download> Download <br /> {{$post->file}} </a>
                        </p>
                    @endif
                    @if($post->image)
                        <img src="storage/files/images/{{$post->image}}" class="rounded img-fluid" alt="picture"/>
                        <p>
                        <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="storage/files/images/{{$post->image}}" download> Download <br /> {{$post->image}} </a>
                        </p>
                    @endif
                    <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
                    <br />
                    <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
                    <br />
                    <div class="text-center">
                        @if($post->views > 0)
                            &nbsp <a href="show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> &nbsp Views: {{$post->views}} &nbsp </a>
                        @endif
                        <a href="show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> View post </a> &nbsp 
                    </div>
                    <br />
                    @include('posts.create_comments')
                    <br />
                </div>
                <hr>
            @endif

            @if ($post->post_user_id != null)
                <div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
                    <br />
                    <div>
                    <img style="width:40px; height:40px" src="storage/files/profile_pics/{!!$post->user->image!!}" align="left" class="rounded-circle" alt="profile picture"/>
                <h5 class="text-left"><a href="user/{{$post->user->id}}" class="black">&nbsp {{$post->post_user_name}}
                >>
                {!!$post->user->name!!} </a></h5>
                <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
                    <br />
                    <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                    <br />
                    <p> <span style="display:block; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                    <br />
                    
                    @if($post->file)
                        <p>
                        <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="storage/files/documents/{{$post->file}}" download> Download <br /> {{$post->file}} </a>
                        </p>
                    @endif
                    @if($post->image)
                        <img src="storage/files/images/{{$post->image}}" class="rounded img-fluid" alt="picture"/>
                        <p>
                        <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="storage/files/images/{{$post->image}}" download> Download <br /> {{$post->image}} </a>
                        </p>
                    @endif
                    <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
                    <br />
                    <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
                    <br />
                    <div class="text-center">
                        @if($post->views > 0)
                            &nbsp <a href="show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> &nbsp Views: {{$post->views}} &nbsp </a>
                        @endif
                        <a href="show/{{$post->id}}" class="btn btn-primary" style="padding:1px;"> View post </a> &nbsp 
                    </div>
                    <br />
                    @include('posts.create_comments')
                    <br />
                </div>
                <hr>
            @endif
            @endforeach
            {{$posts->links()}}
        @else
            <div class="card">
                <h6 class="text-center">There are no posts available for you.</h6>
            </div>
        @endif

    @endif
</div>
@endsection