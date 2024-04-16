@extends('layout.layout')

@section('title','Login')

@section('content')

<div class="container mt-3">
    <h1 style="text-align: center">{{__('codem.login')}}</h1>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="{{__('codem.enter_email')}}" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="pwd" class="form-label">{{__('codem.password')}}:</label>
            <input type="password" class="form-control" id="pwd" placeholder="{{__('codem.enter_password')}}" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{__('codem.submit')}}</button>
    </form>
</div>

@endsection