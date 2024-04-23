@extends('layout.layout')

@section('title','Edit Profile')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">{{__('codem.edit_profile')}} <i class="fa-solid fa-pen-to-square"></i></h1>
            <div class="p-4" style="border: 1px solid black">
                <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-center">
                        <div class="card" style="border: none; width: 35%">
                            <div class="card-body text-center" style="border: none">
                                <img src="/images/{{ $user->image }}" class="img-fluid rounded-circle" alt="Profile Image">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="name" class="mb-0"><h5>{{__('codem.name')}}:</h4></label>
                                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-0 mb-3">
                        <label for="image" class="mb-0"><h5>{{__('codem.choose_image')}}:</h5></label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="bio" class="mb-0"><h5>Bio:</h5></label>
                        <textarea class="form-control" name="bio" id="bio" cols="30" rows="5">{{$user->bio}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('codem.save_changes')}}</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection