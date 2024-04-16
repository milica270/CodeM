@extends('layout.layout')

@section('title','Edit Problem')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">{{__('codem.show_problem')}}</h1>
            <div class="mb-3 mt-3 p-4 d-flex flex-column" style="border: 1px solid black;">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{$problem->user->getImageURL()}}" alt="" class="img-fluid rounded-circle" style="width: 20%">
            <h5 style="text-decoration: underline;" class="ms-1"><a href="{{route('users.show',$problem->user->id)}}" style="color: rgb(52, 58, 64)">{{$problem->user->name}}</a></h5>
        </div>
        <div class="d-flex">
        <form action="{{route('problems.destroy',$problem->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">X</button>
        </form>
    </div>
    </div>
    <form class="mt-3" enctype="multipart/form-data" action="{{route('problems.update', $problem->id)}}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="content" cols="30" rows="3" class="form-control mb-3">{{$problem->content}}</textarea>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{__('codem.update')}}</button>
            <div style="text-align: right"><i class="fa-solid fa-clock"></i> {{$problem->created_at->diffForHumans()}}</div>
        </div>
    </form>
    
    
</div>
        </div>
    </div>
</div>
@endsection