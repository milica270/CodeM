@extends('layout.layout')

@section('title',$user->name)

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">{{__('codem.profile')}} <i class="fa-solid fa-address-card"></i></h1>
            <div class="p-4" style="border: 1px solid black">
                <div class="d-flex align-items-center">
                    <div class="card" style="border: none; width: 35%">
                        <div class="card-body text-center" style="border: none">
                            <img src="{{ $user->getImageURL() }}" class="img-fluid rounded-circle" alt="Profile Image">
                        </div>
                    </div>
                    <div>
                        <h3 style="text-decoration: underline">{{$user->name}}</h3>
                        <h5><span style="font-weight: normal ">{{$user->email}}</span></h5>
                    </div>
                </div>
                <div class="mb-4">
                    <h4>Bio:</h4>
                    {{$user->bio}}
                </div>
                @auth()
                    @if(auth()->user()->id===$user->id)
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <form action="{{route('friendship.showFriends')}}" method="GET">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-users"></i> {{ auth()->user()->showFriendCount() }} {{__('codem.friends')}}
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form action="{{route('friendship.showFriendRequests')}}" method="GET">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-question"></i> {{ auth()->user()->showFriendRequestsCount() }} {{__('codem.requests')}}
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('problems.showAll') }}" method="GET">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-code"></i> {{$user->problems->count()}} {{__('codem.problems')}}
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('solutions.showAll') }}" method="GET">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-comment"></i> {{$user->solutions->count()}} {{__('codem.solutions')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <button class="btn btn-warning me-2"><a style="color: white; text-decoration: none;" href="{{route('users.edit',$user->id)}}">{{__('codem.edit_profile')}}</a></button>
                            <div class="btn btn-outline-secondary">
                                <i class="fa-solid fa-heart"></i> {{$user->getTotalLikesCount()}} {{__('codem.total_likes')}}
                            </div>
                        </div>
                    @endif
                    @if(auth()->user()->id!==$user->id)
                        @php 
                            $friendship = auth()->user()->friendships1()->where('friend_id',$user->id)->first();
                            if(!$friendship){
                                $friendship = auth()->user()->friendships2()->where('user_id', $user->id)->first();
                            }
                            
                        @endphp
                        @if($friendship && $friendship->accepted)
                            <form action="{{route('friendship.delete', $user->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-success">{{__('codem.friend')}}</button>
                            </form>
                        @elseif($friendship && !$friendship->accepted)
                            <form action="{{route('friendship.unsendRequest', $user->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">{{__('codem.requested')}}</button>
                            </form>
                        @else
                            <form action="{{route('friendship.sendRequest', $user->id)}}" method="POST">
                                @csrf 
                                <button type="submit" class="btn btn-primary">{{__('codem.sent_request')}}</button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>
    
</div>
@endsection