@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>trainers/Edit/{{$trainer->name}}</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/trainers')}}">back</a>
</div>
@include('admin.inc.errors')

    <form action="{{url('Dashboard/trainers/update')}}" method="post" enctype="multipart/form-data" >
        @csrf
           
        <div class="form-group">
            <input type="hidden" name="id" value="{{$trainer->id}}">
            <label>id:</label>
            <input class="form-control" type="text" name="id" value="{{$trainer->id}}">
        </div>
        <div class="form-group">
            <label>name:</label>
            <input class="form-control" type="text" name="name" value="{{$trainer->name}}">
        </div>
        <div class="form-group">
            <label>phone:</label>
            <input class="form-control" type="text" name="phone" value="{{$trainer->phone}}">
        </div>
        <div class="form-group">
            <label>speciality:</label>
            <input class="form-control" type="text" name="spec"value="{{$trainer->spec}}">
        </div>
         <img src="{{asset('uploads/trainers/'.$trainer->img)}}" height="100px" alt=" ">
        <div class="form-group">
            <label>image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>

        <input class="btn btn-info" type="submit" value="edit">

    </form>


@endsection