@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('posts.index') }}" class="btn btn-danger">Regresar</a>
</div>

<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label class="col-md-4 text-right">Título</label>
        <div class="col-md-8">
            <input type="text" name="title" class="form-control input-lg" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group">
        <label class="col-md-4 text-right">Slug:</label>
        <div class="col-md-8">
            <input type="text" name="slug" class="form-control input-lg" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group">
        <label class="col-md-4 text-right">Selecciona una imagen</label>
        <div class="col-md-8">
            <input type="file" name="image" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group">
        <label class="col-md-12">Contenido:</label>
        <div class="col-md-12">
            <!--<input type="text" name="correo" class="form-control input-lg" />-->
            <textarea id="edit" class="form-control input-lg" name="content"></textarea><br />
        </div>
    </div>
    <br /><br /><br /><br /><br />
    <div class="form-group text-center">
        <input type="submit" name="add" class="btn btn-success input-lg" value="Agregar" />
    </div>
</form>

@endsection