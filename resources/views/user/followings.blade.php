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
                @foreach($user->followings as $following)
                <tr>
                    <td><a href="../../user/{{$following->id}}" class="black"><img style="width:40px; height:40px" src="../../storage/files/profile_pics/{!!$following->image!!}" align="left" class="rounded-circle" alt="profile picture"/>{{$following->name}}</a></td>
                    <td><a href="../../user/{{$following->id}}" class="black">{{$following->email}}</a></td>
                    <td><a href="../../user/{{$following->id}}" class="black">{{$following->status}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection