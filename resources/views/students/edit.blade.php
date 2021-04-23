@extends('students.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student</h2>
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
  
    <form action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Age:</strong>
                    <input type="text" name="age" value="{{ $student->age }}" class="form-control" placeholder="Age">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                <input type="radio" class="form-check-input" id="radio1" name="gender" value="M" {{ ($student->gender=="M")? "checked" : "" }} > Male

                <input type="radio" class="form-check-input" id="radio1" name="gender" value="F" {{ ($student->gender=="F")? "checked" : "" }} > Female
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
  
        <div class="form-group">
            <label for="exampleFormControlSelect1">Reporting Teacher</label>
                <select class="form-control" name ="teacher" id="exampleFormControlSelect1">
                    <option value="Katie" {{ $student->teacher == 'Katie' ? 'selected' : '' }}>Katie</option>
                    <option value="MAxi" {{ $student->teacher == 'MAxi' ? 'selected' : '' }}>MAxi</option>
                    <option value="Jhon" {{ $student->teacher == 'Jhon' ? 'selected' : '' }}>Jhon</option>
                    <option value="Thoams" {{ $student->teacher == 'Thoams' ? 'selected' : '' }}>Thoams</option> 
                </select>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection