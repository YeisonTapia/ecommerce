@extends('admin.layout')
@section('content')

    <section class="content-header">
        <h1> 
            Productos 
            <small>Crear Productos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                         @include('errornotifications')
                        {!!Form::open(['route'=>'product.store','method'=>'POST', 'files'=>'true', 'class'=>''])!!}
                            @include('product.form')
                        {!!Form::close()!!}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
