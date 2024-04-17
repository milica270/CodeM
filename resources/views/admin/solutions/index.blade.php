@extends('layout.layout')

@section('title','Solutions')

@section('content')
<div class="container mt-3">
    <div class="row mt-4">
        <div class="col-md-3">
            @include('admin.shared.left-nav')
        </div>
        <div class="col-md-9">
            <h1 class="mb-4" style="text-align: right">Solutions <i class="fa-solid fa-message"></i></h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Problem</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solutions as $solution)
                        <tr>
                            <td>{{$solution->id}}</td>
                            <td><a href="{{route('users.show',$solution->user->id)}}">{{$solution->user->name}}</a></td>
                            <td><a href="{{route('problems.show',$solution->problem->id)}}">{{$solution->problem->id}}</a></td>
                            <td><pre>{{$solution->content}}</pre></td>
                            <td>{{$solution->created_at->toDateString()}}</td>
                            <td>
                                <form action="{{route('admin.solutions.destroy',$solution->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$solutions->links()}}
            </div> 
        </div>
    </div>
</div>
@endsection