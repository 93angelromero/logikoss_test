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
        <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Regresar</a>
    </div>
    <br />
    <form method="post" action="{{ route('usuarios.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">Username</label>
            <div class="col-md-8">
                <input type="text" name="username" value="{{ $data->username }}" class="form-control input-lg" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group">
            <label class="col-md-4 text-right">Selecciona tu avatar</label>
            <div class="col-md-8">
                <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/{{ $data->avatar }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $data->avatar }}" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </div>
    </form>

@endsection