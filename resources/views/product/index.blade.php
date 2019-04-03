@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1> 
            Productos
            <small>Listado de productos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Productos</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-success btn-sm" href="{{route('product.create')}}">Crear Producto</a>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <table class="table table-hover table-bordered table-sm">
                                    <thead>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th width="100">Imagen</th>
                                        <th>Categoría</th>
                                        <th width="180">Opciones</th>   
                                    </thead>
                                    @foreach($products as $product)
                                    <tbody>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="/image/{{ $product->image }}" width="100%">
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            {!!link_to_route('product.show', $title = 'Ver', $parameters = $product->id, ['class'=>'btn btn-success btn-sm'])!!}
                                            {!!link_to_route('product.edit', $title = 'Editar', $parameters = $product->id, ['class'=>'btn btn-primary btn-sm'])!!}
                                        </td>
                                    </tbody>
                                    @endforeach
                                </table>
                                {!! $products->render() !!}  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
