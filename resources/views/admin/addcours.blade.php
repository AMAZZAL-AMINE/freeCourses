@extends('layouts.admin')

@section('content')
<div class="container m-3">
    <h1 class="text-muted">Add New Cours</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input id="cours" class="form-control" type="text" name="title" placeholder="Cours Title">
        </div>
        <div class="form-group">
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Cours Slug">
        </div>

        <div class="form-group">
            <textarea id="desc" name="desc" placeholder="Cours Description"></textarea>
        </div>
        <div class="form-group">
            <input id="creted_by" class="form-control" type="text" name="creted_by" placeholder="Who Creted this Cours ?">
        </div>
        <div class="form-group">
            <input id="url" class="form-control" type="url" name="url" placeholder="Link From Google Drive">
        </div>
        <div class="form-group">
            <input id="img" class="form-control" type="file" name="url" placeholder="Cours Image">
        </div>
        <div class="form-group">
            <select id="category" class="form-control" name="category">
                <option>Cours Category</option>
                <option value="1">Coding</option>
                <option value="2">Cebyr Security</option>
                <option value="3">Web Development</option>
                <option value="4">Mobile Developments</option>
            </select>
        </div>
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