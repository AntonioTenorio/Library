@extends('layouts.app')

@section('title', 'libros')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Información de libro </h3>
                <div class="box-right">                    
                    <a href="{{ route('book.index') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Lista de libros">
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" action="{{ route('book.update', $book->id) }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del libro</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del autor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Categoría</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $data)
                                <option value="{{ $data->id }}"  @if($data->id == $book->category_id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Fecha de publicación</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="published_date" name="published_date" value="{{ $book->published_date }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            {!! method_field('PUT'); !!}
                            {!! csrf_field(); !!}
                            <a class="btn btn-white" href="{{ route('book.index') }}">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Actualizar</button>
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
