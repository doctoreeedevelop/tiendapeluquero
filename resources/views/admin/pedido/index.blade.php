@extends('dashboard') 

@section('titulo', 'Pedidos')


@section ('contenido')


<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <h3 class="mt-3 mb-3 fs-4">Seccion Pedidos</h3>
            @if($pedidos->count())
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">id Pedido</th>
                    <th scope="col">id Cliente</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha Pedido</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Accion</th>
                    <th colspan="3" >*</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pedidos as $pedido)   
                        <tr>
                            <th scope="row">  {{ $pedido->id }}</th>
                            <td>{{ $pedido->user_id }}</td>
                            {{-- <td>{{ $pedido->users->name }}</td> --}}
                            <td>{{ $pedido->fechapedido}}</td>
                            <td>{{ $pedido->description }}</td>
                            <td>{{ $pedido->total}}</td>
                            <td>{{ $pedido->estado}}</td>
                            <td><a                             
                                class="btn btn-info btn-sm"
                                {{-- href="{{ route('admin.pedido.show', $pedido->id) }}" --}}
                                >Detalle
                                </a>
                            </td>
                            <td><a                             
                                class="btn btn-success btn-sm"
                                href="{{ route('admin.pedido.edit', $pedido->id) }}"
                                >Edit
                                </a>
                            </td>
                            <td>                                   
                                
                                {{-- <form action="{{ route('admin.pedido.destroy', $pedido->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>             
                                </form> --}}
                                                                    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

