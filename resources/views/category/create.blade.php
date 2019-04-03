@extends('admin.layout')
@section('content')
    <section class="content-header">
        <h1> 
            Categorías 
            <small>Crear Categoría</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('category')}}"><i class="fa fa-dashboard"></i> Categorías</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('errornotifications')
                                {!!Form::open(['route'=>'category.store','method'=>'POST','files'=>'true','class'=>''])!!}
                                    @include('category.form')
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
