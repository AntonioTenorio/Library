@extends('layouts.app')

@section('title', 'Maestros')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Maestros</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/home') }}">Home</a>
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
                        <a class="btn btn-success" title="Agregar" href="{{ route('maestros.create') }}"><i class="fa fa-plus"></i></a>
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
                    <form method="POST" class="form-horizontal" action="{{ route('maestros.update', $maestro->id) }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user" name="user" value="{{ $maestro->username }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $maestro->nombre }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="appat" name="appat" value="{{ $maestro->apellido_paterno }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Apellido Materno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apmat" name="apmat" value="{{ $maestro->apellido_materno }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $maestro->direccion }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="estado" id="estado">
                                    <option value="S">Seleccionar</option>
                                    @foreach($estados as $data)
                                        <option value="{{ $data->idEstado }}" @if($maestro->estado_id == $data->idEstado) selected="selected"  @endif >{{ $data->estado }}</option>
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
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $maestro->telefono }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="{{ $maestro->email }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cédula Profesional</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $maestro->cedula }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Salario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="salario" name="salario" value="{{ $maestro->salario }}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! method_field('PUT'); !!}
                                {!! csrf_field(); !!}
                                <a class="btn btn-white" href="{{ route('maestros.index') }}">Cancelar</a>
                                <button class="btn btn-primary" type="submit">Actualizar</button>
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

$.get("{{ route('otros.sepomex.municipios')}}/" + {{ $maestro->estado_id }}, function(res, req){
    $("#municipio").empty();
    $("#municipio").append("<option value='S'>Seleccionar</option>")
    for(i = 0; i < res.length; i++){
        var select = "";
        var municipio_id = "{{ $maestro->municipio_id }}";
        
        if(municipio_id == res[i].idMunicipio){
            select = 'selected="selected"';
        }
        
        $("#municipio").append("<option value='" + res[i].idMunicipio + "' " + select + ">" + res[i].municipio + "</option>")
    }
}).done(function() {    
    $.get("{{ route('otros.sepomex.urbano')}}/" + {{ $maestro->estado_id }} + "/" + {{ $maestro->municipio_id }}, function(res, req){
        $("#colonia").empty();
        $("#colonia").append("<option value='S'>Seleccionar</option>")
        for(i = 0; i < res.length; i++){
            var select = "";
            var colonia_id = "{{ $maestro->colonia_id }}";

            if(colonia_id == res[i].id){
                select = 'selected="selected"';
            }
            $("#colonia").append("<option value='" + res[i].id + "' " + select + ">" + res[i].asentamiento + "</option>")
        }
    })
    
    $.get("{{ route('otros.sepomex.rural')}}/" + {{ $maestro->estado_id }} + "/" + {{ $maestro->municipio_id }}, function(res, req){
        $("#localidad").empty();
        $("#localidad").append("<option value='S'>Seleccionar</option>")
        for(i = 0; i < res.length; i++){
            var select = "";
            var localidad_id = "{{ $maestro->localidad_id }}";

            if(localidad_id == res[i].id){
                select = 'selected="selected"';
            }
            $("#localidad").append("<option value='" + res[i].id + "' " + select + ">" + res[i].asentamiento + "</option>")
        }
    })
})

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
