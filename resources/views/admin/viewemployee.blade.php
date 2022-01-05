@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center display-3 text-primary">List of All Employee</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Registration Date</th>
            <th>Action</th>
        </tr>
        @foreach ($employees as $emp)
        <tr>
            <td>{{$emp->id}}</td>
            <td>{{$emp->name}}</td>
            <td>{{$emp->username}}</td>
            <td>{{$emp->email}}</td>
            <td>{{$emp->phone}}</td>
            <td>{{$emp->created_at->diffForHumans()}}</td>
            <td><a href="{{url('/delete-employee/'.$emp->id)}}" class="btn btn-outline-danger">Delete</a></td>
        </tr>


        @endforeach
    </table>
</div>
@endsection