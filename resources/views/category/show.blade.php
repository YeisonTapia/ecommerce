@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1> 
            Categorías 
            <small>Ver Categoría</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('category')}}"><i class="fa fa-dashboard"></i> Categorías</a></li>
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
                                <h1>{{$category->name}}</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$category->description}}</p>
                            </div>
                            <div class="col-md-4">
                                <img src="/image/{{$category->image}}" width="100%">
                            </div>

                            {!!Form::open(['route'=> ['category.destroy',$category->id],'method'=>'DELETE','class'=>''])!!}
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger btn-sm'])!!}
                                </div>
                            </div>
                          {!!Form::close()!!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
