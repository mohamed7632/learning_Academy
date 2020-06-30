@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>Categories/Add new</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/cats')}}">back</a>
</div>
    @include('admin.inc.errors')

    <form action="{{url('Dashboard/cats/store')}}" method="post">
    
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>

        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection