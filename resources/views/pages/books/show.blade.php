
@extends('layouts.app')

@section('title', 'Libros')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Editar libro</h3>
                <div class="box-right">                    
                    <a href="{{ route('book.index') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Lista de libros">
                    </a>                   
                    <a href="{{ route('book.edit', $book->id) }}" class="inline">
                        <input class="btn btn-info btn-xs" type="button" value="Editar libro">
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre del libro</label>
                        <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $book->name }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre del autor</label>
                        <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $book->author }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Categoría</label>
                        <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $book->category->name }}</p></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Fecha de publicación</label>
                        <div class="col-sm-10"><p class="col-sm-2 form-control-static">{{ $book->published_date }}</p></div>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endsection
