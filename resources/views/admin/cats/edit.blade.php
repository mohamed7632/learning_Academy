@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Categories/Edit/{{$cat->name}}</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/cats')}}">back</a>
</div>
@include('admin.inc.errors')

    <form action="{{url('Dashboard/cats/update')}}" method="post">
        @csrf
           
        <div class="form-group">
            <input type="hidden" name="id" value="{{$cat->id}}">
            <label>Name:</label>
            <input class="form-control" type="text" name="name" value="{{$cat->name}}">
        </div>

        <input class="btn btn-info" type="submit" value="edit">

    </form>


@endsection