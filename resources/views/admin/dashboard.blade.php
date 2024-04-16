@extends('layout.layout')

@section('title','Admin Panel')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('admin.shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">Admin Panel</h1>
        </div>
    </div>
</div>
@endsection