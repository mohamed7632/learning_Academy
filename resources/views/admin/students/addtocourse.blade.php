@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>students/Edit/add-to-course</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/students')}}">back</a>
</div>
@include('admin.inc.errors')

    <form action="{{route('Admin.students.storeCourse',$student_id)}}" method="post">
        @csrf
        <input type='hidden' name='id'value="{{$student_id}}">
       
        <div class="form-group">
        <select class="form-control" name="course_id">
            @foreach($courses as $c)
            <option value="{{$c->id}}"> {{$c->name}}</option>
            @endforeach
        </select>
        </div>


        <input class="btn btn-info" type="submit" value="edit">

    </form>


@endsection