@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center display-3 text-primary">Add Employee</h1>
    <form method="POST" action="{{url('/save-data')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="fname" class="form-control">
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="uname" class="form-control">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="femail" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" name="fphone" class="form-control">
        </div>
        <div class="form-group">
            <label>Upload Employee Picture:</label>
            <input class="form-control" name="image" type="file">
        </div>
        <div class="form-group">
            <input type="Submit" value="Save Data" class="btn btn-outline-primary">
        </div>

    </form>
</div>
@endsection