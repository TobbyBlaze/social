{{-- @extends('layouts.app') --}}
@extends('layouts.temp')

@section('content')
    <table class="table">
        <tbody>
            @if (auth()->user()->notifications->count() > 0)
                <a href="{{auth()->user()->id}}/read" class="btn btn-primary"> Mark all as read </a>
            @endif
            @if (auth()->user()->notifications->count() == 0)
                <p style="color:black;">You have no notification.</p>
            @endif
            @foreach (auth()->user()->unReadNotifications as $notification)
                <tr>
                    @if ($notification->type == "App\Notifications\\newFollower")
                        <td style="background-color: lightgray"><a href="../user/{{Auth::user()->id}}/followers"  class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}} </a></td>
                    @endif
                    @if ($notification->type == "App\Notifications\\newComment")
                        <td style="background-color: lightgray"><a href="../show/" class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</a></td>
                    @endif
                    @if ($notification->type == "App\Notifications\\newPost")
                        <td style="background-color: lightgray"><a href="../user/{{Auth::user()->id}}" class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</a></td>
                    @endif
                </tr>
            @endforeach
            @foreach (auth()->user()->readNotifications as $notification)
                <tr>
                    @if ($notification->type == "App\Notifications\\newFollower")
                        <td style="background-color: white"><a href="../user/{{Auth::user()->id}}/followers" class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</a></td>
                    @endif
                    @if ($notification->type == "App\Notifications\\newComment")
                        <td style="background-color: white"><a href="../show/" class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</a></td>
                    @endif
                    @if ($notification->type == "App\Notifications\\newPost")
                        <td style="background-color: white"><a href="../user/{{Auth::user()->id}}" class="black">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
