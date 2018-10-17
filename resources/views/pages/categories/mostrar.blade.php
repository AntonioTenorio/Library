@extends('layouts.app')

@section('title', 'Maestros')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Maestros</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a>Maestros</a>
            </li>
            <li class="active">
                <strong>Registro de maestros</strong>
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
                        <a class="btn btn-info" title="Actualizar" href="{{ route('maestros.edit', $maestro->id) }}"><i class="fa fa-refresh"></i></a>
                        <a class="btn btn-success" title="Nuevo" href="{{ route('maestros.create') }}"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-warning" title="Lista" href="{{ route('maestros.index') }}"><i class="fa fa-list"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Maestros <small>Guarde la información relacionada a un maestro.</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->username }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->nombre }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Apellido Paterno</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->apellido_paterno }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Apellido Materno</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->apellido_materno }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->direccion }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->estados_rel->estado }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Municipio</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $sepomex["municipio"][0]["nombre"] }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Colonia</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->colonia_rel->asentamiento }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Localidad</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->localidads_rel->asentamiento }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->telefono }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->email }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Cédula Profesional</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $maestro->cedula }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Salario</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">${{ $maestro->salario }}</p></div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
