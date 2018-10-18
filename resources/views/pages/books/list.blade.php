@extends('layouts.app')

@section('title', 'Libros')

@section('content')

@if(isset($msg))
    <p>{!! $msg !!}</p>
@endif


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Lista de libros </h3>
                <div class="box-right">                    
                    <a href="{{ route('book.create') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Crear libro">
                    </a>
                </div>
            </div>           
            <div class="box-title">
                <div class="row">
                    <form method="GET" action="{{ route('book.index') }}" class="form-horizontal">
                        <div class="col-lg-3">
                                <input type="text" class="form-control" id="filter" name="filter" placeholder="Ingrese su búsqueda">
                        </div>
                        <div class="col-lg-2">
                                <input type="submit" class="btn btn-success" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Fecha de publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $data)
                                @php
                                    $class = '';
                                    if($data->status != 1){
                                        $class = 'not_delivery';
                                    }
                                @endphp
                                <tr class="{{ $class }}">
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->author }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->published_date }}</td>
                                    <td>
                                        <a href="{{ route('book.show', $data->id) }}" class="inline">
                                            <input class="btn btn-info btn-xs" type="button" value="Mostrar">
                                        </a>
                                        <form method="POST" class="inline" action="{{ route('book.destroy', $data->id) }}">
                                            {!! method_field('DELETE'); !!}
                                            {!! csrf_field(); !!}
                                            <input class="btn btn-danger btn-xs" type="submit" value="Borrar">
                                        </form>
                                        <input class="btn btn-warning btn-xs" type="button" value="Cambiar estatus" onclick="popup({{ $data->id }})">
                                    </td>
                                </tr>   
                            @empty
                                <tr>
                                    <td class="text-center" colspan="9">No existen registros.</td>
                                </tr>                                    
                            @endforelse
                            {{ $books->links() }}
                        </tbody>
                    </table>                        
                </div>
            </div>
        </div>
    </div>
</div>

<div id="pop_up" class="pop_up"> 
    <img src="{{ asset('images/close.png') }}" class="close_pop_up">
    <div class="ibox-content">
        <form method="POST" class="inline" action="{{ route('book.status') }}">
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label text-left">Estatus</label><br>
                    <select class="form-control input-sm" id="status" name="status">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-12 text-right"> 
                    {!! csrf_field(); !!}
                    <input type="hidden" id="book_id" name="book_id" value=""><br>
                    <input class="btn btn-success btn-xs" type="submit" value="Actualizar estatus">
                </div>
            </div>
        </form>
    </div>   
</div>
@endsection

@section('pagescript') 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="{{ asset('js/bpopup.js') }}"></script>   
<script>
function popup(book_id){
    $('#pop_up #book_id').val(book_id);
    $('#pop_up').bPopup({
        closeClass:'close_pop_up',
    });
}
</script>
@stop 