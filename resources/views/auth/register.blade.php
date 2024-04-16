@extends('layout.layout')

@section('title','Register')

@section('content')

<div class="container mt-3">
    <h1 style="text-align: center">{{__('codem.register')}}</h1>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">{{__('codem.name')}}:</label>
            <input class="form-control" id="name" placeholder="{{__('codem.enter_name')}}" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="{{__('codem.enter_email')}}" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="pwd" class="form-label">{{__('codem.password')}}:</label>
            <input type="password" class="form-control" id="pwd" placeholder="{{__('codem.enter_password')}}" name="password">
        </div>
        <div class="mb-3 mt-3">
            <label for="con_pwd" class="form-label">{{__('codem.confirm_password')}}:</label>
            <input type="password" class="form-control" id="con_pwd" placeholder="{{__('codem.confirm_password')}}" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{__('codem.submit')}}</button>
    </form>
</div>

@endsection