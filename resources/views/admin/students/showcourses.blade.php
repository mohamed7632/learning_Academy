    @extends('admin.layout')

    @section('content')
    <div class="d-flex justify-content-between mb-3">
    <h6>students /showcourses</h6>
    <div>
    <a class="btn btn-sm btn-primary" href="{{url('Dashboard/students')}}">back</a>
    <a class="btn btn-sm btn-info" href="{{route('Admin.students.addToCourse',$student_id)}}">add-to-course</a>
</div> 
</div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">status</th>
        <th scope="col">Action</th>
       
        </tr>
    </thead>
     <tbody>
         @foreach($courses as $course)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->pivot->status}}</td>
            <td>
                @if($course->pivot->status!='approve')
            
            <a class="btn btn -sm btn-info" href="{{route('Admin.students.approveCourse',[$student_id,$course->id])}}">approve</a>
              @endif 
              @if($course->pivot->status!='reject')       
            <a class="btn btn -sm btn-danger" href="{{url('Admin.students.rejectCourse',[$student_id,$course->id])}}">reject</a>
             @endif     
        </td>
        </tr>
        @endforeach
     </tbody>
  </table>

    @endsection