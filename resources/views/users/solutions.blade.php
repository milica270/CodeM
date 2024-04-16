@extends('layout.layout')

@section('title','Solutions')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-5" style="text-align: right">{{__('codem.your_solutions')}} <i class="fa-solid fa-message"></i></h1>
            @if(auth()->user()->solutions->count()===0) 
                <h4 style="text-align: center" class="bg-danger">{{__('codem.there_are_no_solutions')}}</h4>
            @else
                @foreach(auth()->user()->solutions as $solution)
                    <div style="border-bottom: 1px solid black" class="d-flex justify-content-between align-items-center mt-3 mb-3">
                        <a href="{{route('problems.show',$solution->problem->id)}}" style="color: rgb(52, 58, 64)"><pre>{{$solution->content}}</pre></a>
                        <h5 class="bg-warning">{{$solution->created_at->diffforHumans()}}</h5>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</div>
@endsection