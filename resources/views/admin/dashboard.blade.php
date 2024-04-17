@extends('layout.layout')

@section('title','Admin Panel')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('admin.shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">Admin Panel <i class="fa-solid fa-lock"></i></h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                   @include('shared.widget', [
                        'title' => 'Total Users',
                        'icon' => 'fa-solid fa-users',
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                   @include('shared.widget', [
                        'title' => 'Total Problems',
                        'icon' => 'fa-solid fa-code',
                        'data' => $totalProblems,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                   @include('shared.widget', [
                        'title' => 'Total Solutions',
                        'icon' => 'fa-solid fa-message',
                        'data' => $totalSolutions,
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection