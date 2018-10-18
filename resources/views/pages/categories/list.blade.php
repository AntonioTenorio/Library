@extends('layouts.app')

@section('title', 'Categorización')

@section('content')

@if(isset($msg))
    <p>{!! $msg !!}</p>
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Lista de categorías </h3>
                <div class="box-right">                    
                    <a href="{{ route('category.create') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Crear categoría">
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $data->id) }}" class="inline">
                                            <input class="btn btn-info btn-xs" type="button" value="Mostrar">
                                        </a>
                                        <form method="POST" class="inline" action="{{ route('category.destroy', $data->id) }}">
                                            {!! method_field('DELETE'); !!}
                                            {!! csrf_field(); !!}
                                            <input class="btn btn-danger btn-xs" type="submit" value="Borrar">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="9">No existen registros.</td>
                                </tr>                                    
                            @endforelse
                            {{ $categories->links() }}
                        </tbody>
                    </table>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection