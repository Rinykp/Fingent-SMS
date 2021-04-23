@extends('marks.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>School Management System</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('marks.create') }}"> Create Marks</a>
            </div>
            
            <div class="pull-right" style="padding-right:20px;">
                <a class="btn btn-success" href="{{ route('students.index') }}"> Student List</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>History</th>
            <th>Science</th>
            <th>Maths</th>
            <th>Total Marks</th>
            <th>Term</th>
            <th>Created on</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($marks as $mark)
        <?php 
       $marksTotal = 0;
       $marksTotal = $mark->history + $mark->maths + $mark->science;  ?>
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mark->student->name }}</td>
            <td>{{ $mark->history }}</td>
            <td>{{ $mark->science }}</td>
            <td>{{ $mark->maths }}</td>
            <td>{{ $marksTotal }}</td>
            <td>{{ $mark->term }}</td>
            <td>{{ $mark->created_at }}</td>
            <td>
                <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
   
    
                    <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $marks->links() !!}
      
@endsection