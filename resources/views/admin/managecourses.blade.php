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
 
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<br><br>

<table class="table-responsive table-hover w-100">
  <thead>
  <tr>
    <th>Id</th>
    <th>Img</th>
    <th>Title</th>
    <th>Category</th>
    <th>Edite</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody id="myTable" >
  @foreach($courses as $cours)
  <tr>
    <td>{{ $cours->id }}</td>
    <td> <img style="width: 35px;height: 35px;border-radius: 50px;" src="{{ asset('/storage/'.$cours->img) }}" alt=""> </td>
    <td> {{ $cours->title }} </td>
    <td> {{ $cours->categories->name }} </td>
    <td> <a class="btn btn-success" href="{{ route('coursupdate.show',$cours->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a> </td>
    <td> 
        <form action="" method="post">
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