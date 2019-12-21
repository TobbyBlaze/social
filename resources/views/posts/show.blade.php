{{-- @extends('layouts.app') --}}
@extends('layouts.temp')

@section('content')


@if ($post->post_user_id == null)
<div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
    <br />
    <div>
        <img style="width:40px; height:40px" src="../storage/files/profile_pics/{{$post->user->image}}" align="left" class="rounded-circle" alt="profile picture"/>
    <h5 class="text-left"><a href="../user/{{$post->user->id}}" class="black"> &nbsp {!!$post->user->name!!} </a></h5>
    <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
    </div>
        <br />
        <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
        <br />
        <p> <span style="display:block; color:black;>&nbsp  {!!$post->body!!} </span> </p>
        <br />
        {{--<img style="width:100%" src="storage/files/images{{$post->image}}" />--}}
        @if($post->file)
            <p>
            <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="../storage/files/documents/{{$post->file}}" download> Download &nbsp {{$post->file}} </a>
            </p>
        @endif
        @if($post->image)
            <img style="width:100%; height:400px" src="../storage/files/images/{{$post->image}}" class="rounded img-fluid" alt="picture"/>
            <p>
            <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="../storage/files/images/{{$post->image}}" download> Download image </a>
            </p>
        @endif
        <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
        <br />
        <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
        <div class="text-center">
            @if($post->views > 0)
                &nbsp <a class="btn btn-primary" style="padding:1px; color:white"> &nbsp Views: {{$post->views}} &nbsp</a>
            @endif
        </div>
        <br />
    <br />
    <div class="row">
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <div class="col-6 text-left">
                    <a class="btn btn-primary" title="Click to edit post" href="../show/{{$post->id}}/edit"> Edit </a>
                </div>
                <div class="col-6 text-right">
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'text-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger', 'title' => 'Click to delete post'])}}
                    {!!Form::close()!!}
                </div>
            @endif
        @endif
    </div>
    <div class="text-left">
        <h4> <a class="btn btn-default" title="Click to go back" href="../"> <<-Go home</a> </h4>
    </div>
    <br />
    {{-- {{$comments->body->last()}} --}}
    @include('posts.create_comments')
    <br />
</div>
@foreach ($comments as $comment)
    <div class="card">
        @if($post->id == $comment->post_id)
            <div>
                <img style="width:40px; height:40px" src="../storage/files/profile_pics/{{$comment->user->image}}" align="left" class="rounded-circle img-fluid" alt="profile picture"/>
                <h6>
                    &nbsp <a href="../user/{{$comment->user->id}}">{{$comment->user->name}}</a>
                    <br />
                </h6>
                <p style="color:black;">
                    &nbsp {{$comment->body}}
                </p>
            </div>
            <br />
            <small class="text-right" font-size="10px" >
                Comment posted at {{$comment->created_at}}
            </small>
            <small class="text-right" font-size="10px">
                Comment updated at {{$comment->updated_at}}
            </small>
            <br />
        @endif
    </div>
    <br />
@endforeach
{{$comments->links()}}
@endif

@if ($post->post_user_id != null)
<div class="card" style="margin: 0px 0px 0px 0px; padding: 5px;">
    <br />
    <div>
        <img style="width:40px; height:40px" src="../storage/files/profile_pics/{{$post->user->image}}" align="left" class="rounded-circle" alt="profile picture"/>
    <h5 class="text-left"><a href="../user/{{$post->user->id}}" class="black">&nbsp {{$post->post_user_name}}
                >>
                {!!$post->user->name!!} </a></h5>
    <p class="text-left" style="color:black;"> &nbsp Updated {{$post->updated_at->diffForHumans()}} &nbsp </p>
    </div>
        <br />
        <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
        <br />
        <p> <span style="display:block; color:black;>&nbsp  {!!$post->body!!} </span> </p>
        <br />
        {{--<img style="width:100%" src="storage/files/images{{$post->image}}" />--}}
        @if($post->file)
            <p>
            <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="../storage/files/documents/{{$post->file}}" download> Download &nbsp {{$post->file}} </a>
            </p>
        @endif
        @if($post->image)
            <img style="width:100%; height:400px" src="../storage/files/images/{{$post->image}}" class="rounded img-fluid" alt="picture"/>
            <p>
            <a class="btn btn-default" style="padding:1px;" title="Click to download image" href="../storage/files/images/{{$post->image}}" download> Download image </a>
            </p>
        @endif
        <small class="text-right" font-size="10px">Updated on {{$post->updated_at->toDayDateTimeString()}}  &nbsp </small>
        <br />
        <small class="text-right">Created on {{$post->created_at->toDayDateTimeString()}} &nbsp </small>
        <div class="text-center">
            @if($post->views > 0)
                &nbsp <a class="btn btn-primary" style="padding:1px; color:white"> &nbsp Views: {{$post->views}} &nbsp</a>
            @endif
        </div>
        <br />
    <br />
    <div class="row">
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <div class="col-6 text-left">
                    <a class="btn btn-primary" title="Click to edit post" href="../show/{{$post->id}}/edit"> Edit </a>
                </div>
                <div class="col-6 text-right">
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'text-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger', 'title' => 'Click to delete post'])}}
                    {!!Form::close()!!}
                </div>
            @endif
        @endif
    </div>
    <div class="text-left">
        <h4> <a class="btn btn-default" title="Click to go back" href="../"> <<-Go home</a> </h4>
    </div>
    <br />
    {{-- {{$comments->body->last()}} --}}
    @include('posts.create_comments')
    <br />
</div>
@foreach ($comments as $comment)
    <div class="card">
        @if($post->id == $comment->post_id)
            <div>
                <img style="width:40px; height:40px" src="../storage/files/profile_pics/{{$comment->user->image}}" align="left" class="rounded-circle img-fluid" alt="profile picture"/>
                <h6>
                    &nbsp <a href="../user/{{$comment->user->id}}">{{$comment->user->name}}</a>
                    <br />
                </h6>
                <p style="color:black;">
                    &nbsp {{$comment->body}}
                </p>
            </div>
            <br />
            <small class="text-right" font-size="10px" >
                Comment posted at {{$comment->created_at}}
            </small>
            <small class="text-right" font-size="10px">
                Comment updated at {{$comment->updated_at}}
            </small>
            <br />
        @endif
    </div>
    <br />
@endforeach
{{$comments->links()}}
@endif

@endsection()