@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1> 
            Productos 
            <small>Crear Productos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
            <li class="active">Ver</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h1>{{$product->name}}</h1>
                            </div>
                            <div class="col-md-6">
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="col-md-6">
                                <img src="/image/{{$product->image}}" width="100%">                           
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
