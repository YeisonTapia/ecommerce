@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1> 
            Ordenes
            <small>Listado de ordenes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Ordenes</a></li>
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
                                <a class="btn btn-success btn-sm" href="{{route('order.create')}}">Crear Orden</a>
                            </div>
                            <div class="col-md-12">
                                <table id="orders" class="table table-hover table-bordered table-sm">
                                    <thead>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th width="105">Opciones</th>
                                        <hr>
                                    </thead>
                                    @foreach($orders as $order)
                                    <tbody>
                                        <td># {{ $order->id }}</td>
                                        <td>{{ $order->user_id }}</td>
                                        <td>{{ $order->created_at}}</td>
                                        <td>
                                            {!!link_to_route('order.edit', $title = 'Editar', $parameters = $order->id, ['class'=>'btn btn-primary btn-sm'])!!}
                                        </td>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        let pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: '{{env('PUSHER_APP_CLUSTER')}}',
            encrypted: true,
        });

        let channel = pusher.subscribe('orders-channel');
        channel.bind('new-order-event', nuevoPedido);

        function nuevoPedido(data) {
            let table = document.getElementById("orders");
            let row = table.insertRow(1);
            row.insertCell(0).innerHTML = `# ${data.id}`;
            row.insertCell(1).innerHTML = data.user_id;
            row.insertCell(2).innerHTML = data.created_at;
            row.insertCell(3).innerHTML = '<a href="/order/'+data.id+'/edit" class="btn btn-primary btn-sm">Editar</a>';
        }
    </script>
@endsection