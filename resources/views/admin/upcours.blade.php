@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-muted border-bottom mb-3">Add New Cours</h1>
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
    <form action="{{ route('coursupdate.store',$cours->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input id="cours" class="form-control" type="text" name="title" placeholder="Cours Title" value="{{ $cours->title }}">
            @error('title')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Cours Slug" value="{{ $cours->slug }}">
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
            <textarea id="desc" name="desc" placeholder="Cours Description"> {{ $cours->desc }} </textarea>
            @error('desc')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input id="created_by" class="form-control" type="text" name="created_by" placeholder="Who Creted this Cours ?" value="{{ $cours->created_by }}">
            @error('created_by')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input id="url" class="form-control" type="url" name="url" placeholder="Link From Google Drive" value="{{ $cours->url }}">
            @error('url')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <div>
              <img src="{{ asset('/storage/'.$cours->img ) }}" alt="" class="w-50">
            </div>
            <input id="img" class="form-control-file bt-white p-2 rounded border" type="file" name="img"  placeholder="Cours Image">
            @error('img')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <select id="category" class="form-control" name="category">
                <option value="{{ $cours->category_id }}">{{ $cours->categories->name }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @error('category')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @enderror
            </select>
        </div>
        <button class="btn btn-primary w-100" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Edite</button>
    </form>
</div>


<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

@endsection