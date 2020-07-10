@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>courses/Add new</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/courses')}}">back</a>
</div>
    @include('admin.inc.errors')

    <form action="{{url('Dashboard/courses/store')}}" method="post" enctype="multipart/form-data">
    
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
        <select class="form-control" name="category_id">
            @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <select class="form-control" name="trainer_id">
            @foreach($trainers as $t)
            <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
       </div>

        <div class="form-group">
            <label>small Desc:</label>
            <input class="form-control" type="text" name="small_desc">
        </div>
        <textarea class="form-control" name="desc" col="30" row="10"></textarea>
        <div class="form-group">
            <label>price:</label>
            <input class="form-control" type="text" name="price">
        </div>

        <div class="form-group">
            <label>image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>

        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection