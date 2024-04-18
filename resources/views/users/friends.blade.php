@extends('layout.layout')

@section('title','Friends')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-5" style="text-align: right">{{__('codem.friends')}} <i class="fa-solid fa-users"></i></h1>
            @if(auth()->user()->showFriendCount()===0) 
                <h4 style="text-align: center" class="bg-danger">{{__('codem.there_are_no_friends')}}</h4>
            @else
                @foreach($friends as $friend)
                    <div class="p-4 mt-3 mb-3 d-flex justify-content-between align-items-center" style="border: 1px solid black">
                        <div class="d-flex align-items-center">
                            <img src="
                            @if(auth()->id()===$friend->user->id)
                             {{$friend->friend->getImageURL()}}
                            @else
                              {{$friend->user->getImageURL()}}
                            @endif" class="img-fluid rounded-circle" style="width: 15%" alt="">
                            <h5 style="text-decoration: underline;" class="ms-1"><a href="{{route('users.show',$friend->user->id)}}" style="color: rgb(52, 58, 64)">
                            @if(auth()->id()===$friend->user->id)
                             {{$friend->friend->name}}
                            @else
                              {{$friend->user->name}}
                            @endif
                        </a></h5>
                        </div>
                        <form action="{{ route('friendship.delete',
    (auth()->id() === $friend->user->id) ? $friend->friend->id : $friend->user->id
) }}" method="POST">
                            
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">{{__('codem.remove_friend')}}</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</div>
@endsection