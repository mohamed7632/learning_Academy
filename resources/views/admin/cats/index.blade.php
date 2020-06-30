    @extends('admin.layout')

    @section('content')
  <div class="d-flex justify-content-between">
  <h6>Categories</h6>
   <a class="btn btn-sm btn-primary"href="{{url('Dashboard/cats/create')}}">Add new</a>
  </div>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($cats as $cat)
    <tr>
    
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$cat->name}}</td>
      <td>
      <a class="btn btn -sm btn-info" href="{{url('Dashboard/cats/edit',$cat->id)}}">edit</a>
      <a class="btn btn -sm btn-danger" href="{{url('Dashboard/cats/delete',$cat->id)}}">delete</a>
      </td>
      
    </tr>
   @endforeach
  </tbody>
</table>
    
    @endsection