@extends('parent')

@section('main')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('posts.index') }}" class="btn btn-danger">Back</a>
    </div>
    <br />
    <img src="{{ URL::to('/') }}/images/posts/{{ $data->image }}" class="img-thumbnail" />
    <h3>Título - {{ $data->title }} </h3>
    <h3>Contenido - {{ $data->content }}</h3>
    <h3>Slug - {{ $data->slug }}</h3>
</div>
@endsection