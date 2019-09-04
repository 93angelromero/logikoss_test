@extends('parent')

@section('main')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Regresar</a>
    </div>
    <br />
    <img src="{{ URL::to('/') }}/images/{{ $data->avatar }}" class="img-thumbnail" />
    <h3>Username - {{ $data->username }} </h3>
</div>
@endsection