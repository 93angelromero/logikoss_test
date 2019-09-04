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
 <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Regresar</a>
</div>

<form method="post" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label class="col-md-4 text-right">Username</label>
        <div class="col-md-8">
            <input type="text" name="username" class="form-control input-lg" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group">
        <label class="col-md-4 text-right">Selecciona tu avatar</label>
        <div class="col-md-8">
            <input type="file" name="image" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group text-center">
        <input type="submit" name="add" class="btn btn-success input-lg" value="Agregar" />
    </div>
</form>

@endsection