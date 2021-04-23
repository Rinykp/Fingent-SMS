@extends('marks.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Marks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('marks.index') }}"> Back</a>
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
  
    <form action="{{ route('marks.update',$mark->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="form-group">
            <label for="exampleFormControlSelect1">Name</label>
                <select class="form-control" name ="name" disabled="true" id="exampleFormControlSelect1">
                @foreach($students as $student)
                    <option value="{{ $student->id }}"  {{ $student->id == $mark->name ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
                </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>MAths:</strong>
                <input type="number" value="{{ $mark->maths }}"  name="maths" class="form-control" placeholder="Maths">
            </div>
        </div> <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Science:</strong>
                <input type="number"  value="{{ $mark->science }}"  name="science" class="form-control" placeholder="Science">
            </div>
        </div> <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>History:</strong>
                <input type="number" value="{{ $mark->history }}"  name="history" class="form-control" placeholder="History">
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
  
        <div class="form-group">
            <label for="exampleFormControlSelect1">Term</label>
                <select class="form-control" name ="term" id="exampleFormControlSelect1">
                    <option value="One" {{ $mark->term == 'One' ? 'selected' : '' }}>One</option>
                    <option value="Two" {{ $mark->term == 'Two' ? 'selected' : '' }}>Two</option>
                    <option value="Three" {{ $mark->term == 'Three' ? 'selected' : '' }}>Three</option>
                </select>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection