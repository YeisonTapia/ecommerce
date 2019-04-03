@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1> 
            Categorías 
            <small>Listado de categorías</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('category')}}"><i class="fa fa-dashboard"></i> Categorías</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- -->
                        <div class="col-md-12">
                            <a class="btn btn-success btn-sm" href="{{route('category.create')}}">Crear Categoría</a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <table class="table table-sm">
                                <thead>
                                    <th width="10">#</th>
                                    <th>Categoría</th>
                                    <th width="180">Opciones</th>      
                                </thead>
                                @foreach($categories as $category)
                                <tbody>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {!!link_to_route('category.show', $title = 'Ver', $parameters = $category->id, ['class'=>'btn btn-success btn-sm'])!!}
                                        {!!link_to_route('category.edit', $title = 'Editar', $parameters = $category->id, ['class'=>'btn btn-primary btn-sm'])!!}
                                    </td>
                                </tbody>
                                @endforeach
                            </table>
                            {!! $categories->render() !!}  
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
