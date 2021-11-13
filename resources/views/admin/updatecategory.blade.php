@extends('layouts.admin')

@section('content')
    <div class="container">
     <h1 class="text-muted border-bottom mb-3">Update  Category {{ $category->name }} </h1>
     @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong> {{ session('message') }}</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
    @endif

    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input id="name" class="form-control" type="text" name="name" placeholder="Category Name" value="{{ $category->name }}">
            @error('name')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Category Slug" value="{{ $category->slug }}">
            @error('slug')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <span for="img"> Category Image </span><br>
            <img class="w-25" src="{{ asset('/storage/'.$category->img) }}" alt="">
            <input  id="img" class="form-control-file bg-white p-2 rounded border" type="file" name="img">
            @error('img')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <button class="btn btn-success w-50" type="submit">Add Category</button>
    </form>

    <script>

    </script>
    </div>
@endsection