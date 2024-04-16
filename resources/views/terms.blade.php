@extends('layout.layout')

@section('title','About')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
        </div>
        <div class="col-md-9" style="text-align: right;">
            <h1 class="mb-4" style="text-align: right">{{__('codem.about_app')}} <i class="fa-solid fa-book"></i></h1>
            <p>{{__('codem.terms1')}} <span class="bg-success" style="font-weight: bold">CodeM</span>{{__('codem.terms2')}}</p>
        </div>
    </div>
</div>
@endsection