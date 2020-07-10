    @extends('admin.layout')

    @section('content')
  <div class="d-flex justify-content-between">
  <h6>Categories</h6>
   <a class="btn btn-sm btn-primary"href="{{url('Dashboard/courses/create')}}">Add new</a>
  </div>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
    <tr>
    
      <th scope="row">{{$loop->iteration}}</th>
      <td>
        <img src="{{asset('uploads/courses/'.$course->img )}} "height="50 px" alt=" "  >
      </td>
      <td>{{$course->name}}</td>
    
      <td>{{$course->price}}</td>
      <td>
      <a class="btn btn -sm btn-info" href="{{url('Dashboard/courses/edit',$course->id)}}">edit</a>
      <a class="btn btn -sm btn-danger" href="{{url('Dashboard/courses/delete',$course->id)}}">delete</a>
      </td>
      
    </tr>
   @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center width-100">
               {!! $courses->render() !!}
                </div>
    
    @endsection