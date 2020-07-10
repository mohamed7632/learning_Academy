@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h6>courses/Edit/{{$course->name}}</h6>
   <a class="btn btn-sm btn-primary" href="{{url('Dashboard/courses')}}">back</a>
</div>
@include('admin.inc.errors')

<form action="{{url('Dashboard/courses/update')}}" method="post" enctype="multipart/form-data">
    
    @csrf
 <input type="hidden" name="id" value="{{$course->id}}">
    <div class="form-group">
        <label>Name:</label>
        <input class="form-control" type="text" name="name" value="{{$course->name}}">
    </div>
    <div class="form-group">
        <select class="form-control" name="category_id">
            @foreach($cats as $cat)
            <option value="{{$cat->id}}" @if($course->category_id == $cat->id) selected @endif>{{$cat->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <select class="form-control" name="trainer_id">
            @foreach($trainers as $t)
            <option value="{{$t->id}}" @if($course->trainer_id == $t->id) selected @endif>{{$t->name}}</option>
            @endforeach
        </select>
       </div>
 <div class="form-group">
        <label>small Desc:</label>
        <input class="form-control" type="text" name="small_desc" value="{{$course->small_desc}}">
    </div>
    <textarea class="form-control" name="desc" col="30" row="10">
        {{$course->desc}}
    </textarea>
    <div class="form-group">
        <label>price:</label>
        <input class="form-control" type="text" name="price" value="{{$course->price}}">
    </div>
    
         <img src="{{asset('uploads/courses/'.$course->img)}}" height="100px" alt=" ">
    <div class="form-group">
        <label>image:</label>
        <input class="form-control-file" type="file" name="img">
    </div>
   

    <input class="btn btn-info" type="submit" value="edit">

</form>



@endsection