@extends('parent')

@section('main')
            
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div align="right">
        <a href="{{ route('posts.index') }}" class="btn btn-danger">Regresar</a>
    </div>
    <br />
    <form method="post" action="{{ route('posts.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">Título</label>
            <div class="col-md-8">
                <input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group">
            <label class="col-md-4 text-right">Slug:</label>
            <div class="col-md-8">
                <input type="text" name="slug" value="{{ $data->slug }}" class="form-control input-lg" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group">
            <label class="col-md-4 text-right">Selecciona una imagen</label>
            <div class="col-md-8">
                <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/posts/{{ $data->image }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group">
            <label class="col-md-12">Contenido</label>
            <div class="col-md-12">
                <!--<input type="text" name="correo" value="{{ $data->correo }}" class="form-control input-lg" />-->
                <textarea name="content" id="edit" class="form-control input-lg">{{ $data->content }}</textarea><br />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-info input-lg" value="Editar" />
        </div>
    </form>

@endsection