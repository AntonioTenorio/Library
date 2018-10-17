@extends('layouts.app')

@section('title', 'Alumnos')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Alumnos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a>Alumnos</a>
            </li>
            <li class="active">
                <strong>Registro de alumnos</strong>
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
                        <a class="btn btn-success" title="Agregar" href="{{ route('alumnos.create') }}"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-warning" title="Lista" href="{{ route('alumnos.index') }}"><i class="fa fa-list"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Alumnos <small>Guarde la información relacionada a un alumno.</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" class="form-horizontal" action="{{ route('alumnos.store') }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="appat" name="appat" value="{{ old('appat') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Apellido Materno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apmat" name="apmat" value="{{ old('apmat') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="estado" id="estado">
                                    <option value="S">Seleccionar</option>
                                    @foreach($estados as $data)
                                        <option value="{{ $data->idEstado }}">{{ $data->estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Municipio</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="municipio" id="municipio">
                                    <option>Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Colonia</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="colonia" id="colonia">
                                    <option>Seleccionar</option>
                                    <option>Centro</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Localidad</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="localidad" id="localidad">
                                    <option>Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! csrf_field(); !!}
                                <a class="btn btn-white" href="{{ route('alumnos.index') }}">Cancelar</a>
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagescript') 

<script>
$(document).ready(function () { 
      
    @if ($errors->any())
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}','Error!');;
        @endforeach
    @endif
    
});

$("#estado").change(function(event){
    $.get("{{ route('otros.sepomex.municipios')}}/" + event.target.value, function(res, req){
        $("#municipio").empty();
        $("#municipio").append("<option value='S'>Seleccionar</option>")
        for(i = 0; i < res.length; i++){
            $("#municipio").append("<option value='" + res[i].idMunicipio + "'>" + res[i].municipio + "</option>")
        }
    })
});

$("#municipio").change(function(event){
    var idestado = $("#estado").val();
    var idmunicipio = event.target.value;
    
    $.get("{{ route('otros.sepomex.urbano')}}/" + idestado + "/" + idmunicipio, function(res, req){
        $("#colonia").empty();
        $("#colonia").append("<option value='S'>Seleccionar</option>")
        for(i = 0; i < res.length; i++){
            $("#colonia").append("<option value='" + res[i].id + "'>" + res[i].asentamiento + "</option>")
        }
    })
    
    $.get("{{ route('otros.sepomex.rural')}}/" + idestado + "/" + idmunicipio, function(res, req){
        $("#localidad").empty();
        $("#localidad").append("<option value='S'>Seleccionar</option>")
        for(i = 0; i < res.length; i++){
            $("#localidad").append("<option value='" + res[i].id + "'>" + res[i].asentamiento + "</option>")
        }
    })
});


</script>

@stop  
