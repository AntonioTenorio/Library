@extends('layouts.app')

@section('title', 'Grupos')

@section('content')
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
                <strong>Registro de grupos</strong>
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
                        <a class="btn btn-info" title="Actualizar" href="{{ route('grupos.edit' , $grupo->id) }}"><i class="fa fa-refresh"></i></a>
                        <a class="btn btn-success" title="Nuevo" href="{{ route('grupos.create') }}"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-warning" title="Lista" href="{{ route('grupos.index') }}"><i class="fa fa-list"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Grupos <small>Guarde la información relacionada a un grupo.</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $grupo->nombre }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $grupo->direccion }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $sepomex["estado"][0]["nombre"] }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Municipio</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $sepomex["municipio"][0]["nombre"] }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Colonia</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $sepomex["colonia"][0]["nombre"] }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Localidad</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $sepomex["localidad"][0]["nombre"] }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Teléfono de contacto</label>
                            <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $grupo->telefono }}</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Email de contacto</label>
                            <div class="col-sm-10"><p class="col-sm-2  form-control-static">{{ $grupo->email }}</p></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection