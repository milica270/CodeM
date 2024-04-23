@extends('layout.layout')

@section('title','Requests')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-5" style="text-align: right">{{__('codem.friend_requests')}} <i class="fa-solid fa-question"></i></h1>
            @if(auth()->user()->showFriendRequestsCount()===0)
                <h4 style="text-align: center" class="bg-danger">{{__('codem.there_are_no_requests')}}</h4>
            @else
                @foreach($friendRequests as $request)
                    <div class="p-4 mt-3 mb-3 d-flex justify-content-between align-items-center" style="border: 1px solid black">
                        <div class="d-flex align-items-center">
                            <img src="/images/{{ $request->user->image }}" class="img-fluid rounded-circle" style="width: 15%" alt="">
                            <h5 style="text-decoration: underline;" class="ms-1"><a href="{{route('users.show',$request->user->id)}}" style="color: rgb(52, 58, 64)">{{$request->user->name}}</a></h5>
                        </div>
                        <div class="d-flex">
                            <form enctype="multipart/form-data" action="{{route('friendship.acceptRequest', $request->user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-success">{{__('codem.accept')}}</button>
                            </form>
                            <form action="{{route('friendship.unacceptRequest', $request->user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="ms-2 btn btn-outline-danger">{{__('codem.decline')}}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</div>
@endsection