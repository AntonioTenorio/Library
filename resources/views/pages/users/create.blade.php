@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Crear usuarios </h3>
                <div class="box-right">                    
                    <a href="{{ route('user.index') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Lista de usuarios">
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" action="{{ route('user.store') }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
                        <label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            {!! csrf_field(); !!}
                            <a class="btn btn-white" href="{{ route('user.create') }}">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endsection

@section('pagescript') 

<script>
$(document).ready(function () { 
      
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            alert('{{ $error }}','Error!');;
        @endforeach
    @endif
    
});
</script>

@stop  
