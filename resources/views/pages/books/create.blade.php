@extends('layouts.app')

@section('title', 'Libros')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-title">
                <h3>Crear libro </h3>
                <div class="box-right">                    
                    <a href="{{ route('book.index') }}" class="inline">
                        <input class="btn btn-success btn-xs" type="button" value="Lista de libros">
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" action="{{ route('book.store') }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del libro</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del autor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Categoría</label>                       
                        <div class="col-sm-10">                            
                            <div class="ui-widget">
                                <input type="text" class="form-control" id="categories" name="categories" value="{{ old('categories') }}">
                                <input type="hidden" id="category_id" name="category_id">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Fecha de publicación</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="published_date" name="published_date" value="{{ old('published_date') }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            {!! csrf_field(); !!}
                            <a class="btn btn-white" href="{{ route('book.create') }}">Cancelar</a>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    
$( function() {
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            alert('{{ $error }}','Error!');;
        @endforeach
    @endif

    var categories = [
        @foreach($categories as $category)
        {
            value: {{$category->id}},
            label: '{{$category->name}}'
        }, 
        @endforeach
    ];


    $("#categories").autocomplete({
        source: categories,
        select: function (event, ui) {
			event.preventDefault();
            $(this).val(ui.item.label);
            $("#category_id").val(ui.item.value);
        }
    });
} );
</script>

@stop  

@section('pagescss') 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop  