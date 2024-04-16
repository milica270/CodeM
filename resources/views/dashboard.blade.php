@extends('layout.layout')

@section('title','Home')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('shared.left-nav')
            <div class="card">
                <div class="card-header" style="font-weight: bold">
                {{__('codem.search_problems')}}
                </div>
                <div class="p-2">
                    <form action="{{ route('dashboard') }}" method="GET">
                        <input value="{{ request('search','') }}" placeholder="..." type="text" name="search" class="form-control my-2">
                        <button style="font-weight: bold" class="btn btn-success" type="submit">{{__('codem.search')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">{{__('codem.home')}} <i class="fa-solid fa-house"></i></h1>
            @guest()
                <h3>{{ __('codem.login_to_publish') }}</h3>
            @endguest
            @auth()
                <form action="{{route('problems.store')}}" method="POST">
                    @csrf
                    <h5>{{ __('codem.you_have_problem') }}</h5>
                    <textarea name="content" cols="30" rows="3" class="form-control mb-3"></textarea>
                    <button type="submit" class="btn btn-primary">{{ __('codem.publish_problem') }}</button>
                </form>
            @endauth
            <hr>
            @if(count($problems)>0)
            @foreach($problems as $problem)
                @include('problems.problem-card')
            @endforeach
            @else
            <h3>{{ __('codem.no_results') }}</h3>
            @endif
            {{ $problems->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection