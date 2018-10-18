
@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Editar usuarios </h3>
                <div class="box-right">                    
                    <a href="{{ route('user.index') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Lista de usuarios">
                    </a>                   
                    <a href="{{ route('user.edit', $users->id) }}" class="inline">
                        <input class="btn btn-info btn-xs" type="button" value="Editar usuario">
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10"><p class="col-sm-12 form-control-static">{{ $users->name }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><p class="col-sm-12 form-control-static">{{ $users->email }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10"><p class="col-sm-12 form-control-static">{{ $users->full_name }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10"><p class="col-sm-12 form-control-static">{{ $users->address }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Teléfono</label>
                        <div class="col-sm-10"><p class="col-sm-12 form-control-static">{{ $users->phone }}</p></div>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endsection
