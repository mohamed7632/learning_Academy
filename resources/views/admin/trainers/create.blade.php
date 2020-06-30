@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>trainers/Add new</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/trainers')}}">back</a>
</div>
    @include('admin.inc.errors')

    <form action="{{url('Dashboard/trainers/store')}}" method="post" enctype="multipart/form-data">
    
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label>phone:</label>
            <input class="form-control" type="text" name="phone">
        </div>
        <div class="form-group">
            <label>speciality:</label>
            <input class="form-control" type="text" name="spec">
        </div>

        <div class="form-group">
            <label>image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>

        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection