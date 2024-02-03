@extends('dashboard') 

@section('titulo', 'Editar Pedidos')

@section ('contenido')

<div class="container">
    <div class="row justifi-content-center">
        <div class="col-sm-8">
            <div class="card">
                Pedido
            </div>

            <div class="col-sm-6">
                {!! Form::open(['route'=>['admin.pedido.update', $pedido], 'method'=>'PUT']) !!}
                <div class="row">
                    <div class="col-6">
                        {!! Form::select('estado', ["nuevo"=>"Nuevo", "proceso"=>"Proceso", "entregado"=>"Entregado"], $pedido->estado,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="col-6">
                        {{ Form::submit('ACTUALIZAR', ['class'=>'btn btn-success w-100']) }}
                    </div>
                </div> 
                {!! Form::close() !!}
            </div>


            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Cliente: {{$pedido->user->name}}</li>
                    <li class="list-group-item">Celular: {{$pedido->user->celular}}</li>
                    <li class="list-group-item">Email: {{$pedido->user->email}}</li>
                    <li class="list-group-item">Direccion: {{$pedido->user->direccion}}</li>
                    <li class="list-group-item">Fecha Pedido: {{$pedido->fechapedido}}</li>
                </ul>
            </div>

            <table class="table table-striped">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Importe</th>
                </thead>
                <tbody>
                    {{$pedido->detalles}}
                    @forelse ($pedido->detalles as $item)
                    <tr>
                        <td>{{$item->product->nombre}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->precio}}</td>
                        <td>{{$item->importe}}</td>
                    </tr>
                    @empty
                    @endforelse

                    <tr><td colspan="4" class="text-end">Subtotal: {{$pedido->subtotal}}</td></tr>
                    <tr><td colspan="4" class="text-end">Impuesto 19%: {{$pedido->impuesto}}</td></tr>
                    <tr><td colspan="4" class="text-end">Total: {{$pedido->total}}</td></tr>

                </tbody>
            </table>
        </div>
    </div>
</div>








@endsection