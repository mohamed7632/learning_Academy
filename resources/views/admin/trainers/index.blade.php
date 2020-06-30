    @extends('admin.layout')

    @section('content')
  <div class="d-flex justify-content-between">
  <h6>Categories</h6>
   <a class="btn btn-sm btn-primary"href="{{url('Dashboard/trainers/create')}}">Add new</a>
  </div>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">spec</th>
      <th scope="col">phone</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($trainers as $trainer)
    <tr>
    
      <th scope="row">{{$loop->iteration}}</th>
      <td>
        <img src="{{asset('uploads/trainers/'.$trainer->img )}} "height="50 px" alt=" "  >
      </td>
      <td>{{$trainer->name}}</td>
      <td>@if($trainer->phone!=null)
        {{$trainer->phone}}
        @else
         not found
         @endif
      </td>
      
      <td>{{$trainer->spec}}</td>
      <td>
      <a class="btn btn -sm btn-info" href="{{url('Dashboard/trainers/edit',$trainer->id)}}">edit</a>
      <a class="btn btn -sm btn-danger" href="{{url('Dashboard/trainers/delete',$trainer->id)}}">delete</a>
      </td>
      
    </tr>
   @endforeach
  </tbody>
</table>
    
    @endsection