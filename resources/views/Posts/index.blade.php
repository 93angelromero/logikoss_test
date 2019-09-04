@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('usuarios.index') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Regresar</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('posts.create') }}" class="btn btn-success float-right"><i class="fa fa-plus-square"></i> Agregar</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-title">
        <h1 class="text-center">Posts</h1>
    </div>
    <div class="card-body">
        
        <form action="{{ route('posts.index') }}" method="GET" class="navbar-form navbar-left pull-left" role="search">    
            <div class="form-inline">
                <input type="text" name="slug" class="form-control mr-sm-2" placeholder="Slug...">
                <button type="submit" class="btn btn-outline-info my-2 my-sm-0">Buscar</button>
            </div>
        </form><br><br>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Imagen</th>
                <th>Slug</th>
                <th>Acciones</th>
            </tr>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ htmlentities($row->content) }}</td>
                <td><img src="{{ URL::to('/') }}/images/posts/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
                <td>{{ $row->slug }}</td>
                <td>
                    <form action="{{ route('posts.destroy', $row->id) }}" method="post">
                        <a href="{{ route('posts.show', $row->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('posts.edit', $row->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
{!! $data->links() !!}
@endsection