@extends('layout.layout')

@section('title','Users')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('admin.shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">Users</h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined at</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toDateString()}}</td>
                            <td>
                                <a href="{{route('users.show', $user->id)}}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection