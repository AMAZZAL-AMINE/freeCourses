@extends('layouts.admin')

@section('content')

    <div class="container">
 
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
 @if(session()->has('message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 @endif
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<br><br>

<table class="table-responsive table-hover w-100">
  <thead>
  <tr>
    <th>Id</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody id="myTable" >
  @foreach($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td> {{ $user->name }} </td>
    <td> {{ $user->email }} </td>
    <td> 
        <form action="{{ route('user.delete',$user->id) }}" method="post">
            @csrf
            @method('DELETE')           
            <button type="submit" class="btn btn-danger" > <i class="fa fa-trash" aria-hidden="true"></i> </button>
        </form>    
    </td>
  </tr>
  <div>
  @endforeach
  </tbody>
</table>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection