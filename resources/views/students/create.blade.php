@extends('students.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('students.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="number" name="age" class="form-control" placeholder="Age">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                <input type="radio" class="form-check-input" id="radio1" name="gender" value="M" checked> Male

                <input type="radio" class="form-check-input" id="radio1" name="gender" value="F" checked> Female
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
  
        <div class="form-group">
            <label for="exampleFormControlSelect1">Reporting Teacher</label>
                <select class="form-control" name ="teacher" id="exampleFormControlSelect1">
                    <option value="Katie">Katie</option>
                    <option value="MAxi">MAxi</option>
                    <option value="Jhon">Jhon</option>
                    <option value="Thoams">Thoams</option> 
                </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection