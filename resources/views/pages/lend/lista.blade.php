@extends('layouts.app')

@section('title', 'Grupos')

@section('content')

@if(isset($msg))
    <p>{!! $msg !!}</p>
@endif

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Grupos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a>Grupos</a>
            </li>
            <li class="active">
                <strong>Lista de grupos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-10"></div>
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Acciones</h5>
                </div>
                <div class="ibox-content">
                    <div class="text-center">
                        <a class="btn btn-success" title="Agregar" href="{{ route('grupos.create') }}"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de grupos </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="i-checks" name="seleccionar"></th>
                                    <th>Nombre</th>
                                    <th>Domicilio</th>
                                    <th>Estado</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grupos as $data)
                                <tr>
                                    <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                    <td>{{ $data->nombre }}</td>
                                    <td>{{ $data->direccion }}</td>
                                    <td>{{ $data->estados_rel->estado }}</td>
                                    <td>{{ $data->telefono }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <a href="{{ route('relgruper.show', $data->id) }}" class="inline">
                                            <input class="btn btn-success btn-xs" type="button" value="Agregar Periodo">
                                        </a>
                                        <a href="{{ route('grupos.show', $data->id) }}" class="inline">
                                            <input class="btn btn-info btn-xs" type="button" value="Mostrar">
                                        </a>
                                        <form method="POST" class="inline" action="{{ route('grupos.destroy', $data->id) }}">
                                            {!! method_field('DELETE'); !!}
                                            {!! csrf_field(); !!}
                                            <input class="btn btn-danger btn-xs" type="submit" value="Borrar">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">No existen registros.</td>
                                    </tr>                                    
                                @endforelse                                
                                {{ $grupos->links() }}
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
