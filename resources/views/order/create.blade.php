@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1> 
            Ordenes
            <small>Crear orden</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Ordenes</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <hr>
                            {!!Form::open(['route'=>'order.store','method'=>'POST','files'=>'true','class'=>''])!!}

                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
