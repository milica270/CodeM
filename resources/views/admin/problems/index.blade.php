@extends('layout.layout')

@section('title','Problems')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('admin.shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">Problems <i class="fa-solid fa-code"></i></h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($problems as $problem)
                        <tr>
                            <td>{{$problem->id}}</td>
                            <td><a href="{{route('users.show',$problem->user->id)}}">{{$problem->user->name}}</a></td>
                            <td>{{$problem->content}}</td>
                            <td>{{$problem->created_at->toDateString()}}</td>
                            <td>
                                <a href="{{route('problems.show', $problem->id)}}">View</a>
                                <a class="ms-1" href="{{route('problems.edit', $problem->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$problems->links()}}
            </div> 
        </div>
    </div>
</div>
@endsection