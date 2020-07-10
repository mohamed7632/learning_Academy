@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>students/Add new</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/students')}}">back</a>
</div>
    @include('admin.inc.errors')

    <form action="{{url('Dashboard/students/store')}}" method="post">
    
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label>email:</label>
            <input class="form-control" type="email" name="email">
        </div>
        <div class="form-group">
            <label>spec:</label>
            <input class="form-control" type="text" name="spec">
        </div>

        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection