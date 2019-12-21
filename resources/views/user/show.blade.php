{{-- @extends('layouts.app') --}}
@extends('layouts.tem')

@section('content')
    <div class="jumbotron">
        <div>
            <img style="width:150px; height:150px" src="storage/files/images/{!!$user->image!!}" />
        </div>
        <h3>
            @if(Auth::user()->id == $user->id)
                <a href="edit" class="btn btn-success"> Edit profile </a>
            @endif
            <br />
            UserName: {!!$user->name!!}
            <br />
            Email: {!!$user->email!!}
            <br />
            {!!$user->status!!}
            <br />
            <a href="{{route('user.follow', $user->id)}}" class="btn btn-primary">Follow</a>
            <a href="{{route('user.unfollow', $user->id)}}" class="btn btn-danger">Unfollow</a>
            <br />
            <br />
            Account created at {!!$user->created_at!!}
            <br />
            Name: {!!$user->title!!} {!! $user->first_name!!} {!! $user->last_name!!}
            <br />
            Phone number 1: {!!$user->phone_number_1!!}
            <br />
            Phone number 2: {!!$user->phone_number_2!!}
            <br />
            Deparment: {!!$user->department!!}
            <br />
            school: {!!$user->school!!}
            <br />
            College: {!!$user->college!!}
            <br />
            Date of birth: {!!$user->date_of_birth!!}
            <br />
            Followers 
            <br />
            Has {{$followers->count()}} follower(s)
            <br />
            @foreach ($followers as $follower)
            <a href="../../user/{{$follower->id}}" class="black">{!!$follower->name!!} </a><br />
            @endforeach
            <br />
            Followings 
            <br />
            Following {{$followings->count()}} user(s)
            <br />
            @foreach ($followings as $following)
            <a href="../../user/{{$following->id}}" class="black">{!!$following->name!!} </a><br />
            @endforeach
        </h3>
    </div>
@endsection