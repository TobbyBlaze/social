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
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td><a href="user/{{$user->id}}" class="black">{{$user->name}}</a></td>
                <td><a href="user/{{$user->id}}" class="black">{{$user->email}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection