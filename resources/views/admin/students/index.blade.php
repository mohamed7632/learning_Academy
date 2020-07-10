    @extends('admin.layout')

    @section('content')
  <div class="d-flex justify-content-between">
  <h6>students</h6>
   <a class="btn btn-sm btn-primary"href="{{url('Dashboard/students/create')}}">Add new</a>
  </div>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">spec</th>
      <th scope="col">actions</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
    <tr>
    
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->spec}}</td>
      <td>
      <a class="btn btn -sm btn-info" href="{{url('Dashboard/students/edit',$student->id)}}">edit</a>
      <a class="btn btn -sm btn-danger" href="{{url('Dashboard/students/delete',$student->id)}}">delete</a>
      <a class="btn btn -sm btn-primary" href="{{url('Dashboard/students/showcourses',$student->id)}}">showcourses</a>
      </td>
      
    </tr>
   @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center width-100">
               {!! $students->render() !!}
                </div>
    
    @endsection