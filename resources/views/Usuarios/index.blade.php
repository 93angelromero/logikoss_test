@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('posts.index') }}" class="btn btn-info">Posts</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success float-right">Agregar</a>
    </div>
</div>
<br />
<div class="card">
    <div class="card-title">
        <h1 class="text-center">Usuarios</h1>
    </div>
    <div class="card-body">   
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Avatar</th>
                    <th>Acciones</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->username }}</td>
                    <td><img src="{{ URL::to('/') }}/images/{{ $row->avatar }}" class="img-thumbnail" width="75" /></td>
                    <td>
                        <form action="{{ route('usuarios.destroy', $row->id) }}" method="post">
                            <a href="{{ route('usuarios.show', $row->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('usuarios.edit', $row->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
</div>
{!! $data->links() !!}
@endsection