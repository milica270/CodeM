@extends('layout.layout')

@section('title','Show Problem')

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
        @if(auth()->id() === $problem->user->id || auth()->user()->is_admin)
        <form action="" class="mx-2">
        <button class="btn btn-success btn-sm"><a href="{{route('problems.edit', $problem->id)}}" style="color: white; text-decoration: none">{{__('codem.edit')}}</a></button>
        </form>
        <form action="{{route('problems.destroy',$problem->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">X</button>
        </form>
        @endif
    </div>
    </div>
    <p class="my-3">{{$problem->content}}</p>
    <div style="text-align: right"><i class="fa-solid fa-clock"></i> {{$problem->created_at->diffForHumans()}}</div>
    @auth()
        <form action="{{route('problems.solutions.store', $problem->id)}}" method="POST" class="my-2">
            @csrf
            <textarea class="form-control code-editor" name="content" id="" cols="30" rows="5"></textarea>
            <button type="submit" class="btn btn-success btn-sm mt-2">{{__('codem.share_solution')}}</button>
        </form>
        <script>
            document.querySelectorAll('.code-editor').forEach(function (element) {
                var editor = CodeMirror.fromTextArea(element, {
                    lineNumbers: true,
                    mode: 'php',
                    theme: '3024-day'
                });
            });
        </script>
    @endauth
    <hr>
    @include('solutions.show')
</div>
        </div>
    </div>
</div>
@endsection