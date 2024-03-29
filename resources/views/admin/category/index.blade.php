

 {{-- @extends('plantilla.admin')  --}}


@extends('dashboard') 

@section('titulo', 'Administracion De Categorias')


@section ('contenido')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Seccion De Categorias</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <td><a class="m-3 float-right btn btn-primary" href="{{ route('admin.category.create') }}">Crear Categoria</a></td>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripcion</th>
                <th>Fecha de Creacion</th>
                <th>Fecha de Modificacion</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($categorias as $categoria)
              <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->slug }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>{{ $categoria->created_at }}</td>
                <td>{{ $categoria->update_at }}</td>

                <td><a class="btn btn-default btn-sm"  href="{{ route('admin.category.show', $categoria->slug) }}"><i class="fa-solid fa-eye">ver</i></a></td>
                <td><a class="btn btn-info btn-sm"     href="{{ route('admin.category.edit', $categoria->slug) }}">Editar</a></td>
                <td><a class="btn btn-danger btn-sm"   href="{{ route('admin.category.index') }}">Eliminar</a></td>

              </tr>
            @endforeach  
            
            </tbody>
          </table>

         {{--  {{ $categorias->links()}} --}}


        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

{{-- {{ dd($categorias) }} --}}

  @endsection