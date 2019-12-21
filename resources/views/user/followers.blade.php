{{-- @extends('layouts.app') --}}
@extends('layouts.templ')

@section('content')


<section class="banner-bottom" id="about">
	<div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profession</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->followers as $follower)
                <tr>
                    <td><a href="../../user/{{$follower->id}}" class="black"><img style="width:40px; height:40px" src="../../storage/files/profile_pics/{!!$follower->image!!}" align="left" class="rounded-circle" alt="profile picture"/>{{$follower->name}}</a></td>
                    <td><a href="../../user/{{$follower->id}}" class="black">{{$follower->email}}</a></td>
                    <td><a href="../../user/{{$follower->id}}" class="black">{{$follower->status}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection