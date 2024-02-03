

 {{-- @extends('plantilla.admin')  --}}


@extends('dashboard') 

@section('titulo', 'Crear Categoria')


@section ('contenido')


<div id="apicategory">

    <form action="{{ route('admin.category.store')}}" method="POST">
        @csrf

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Administracion de Categorias</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">


                   {{-- <h1>Crear Categoria</h1> --}}
                    <div class="form-group">
                        
                        <label for="nombre">Nombre</label>                        
                        <input v-model="nombre"

                            @blur= "getCategory"
                            @focus = "div_aparecer= false"
                        
                        class="form-control" type="text" name="name" id="name"
                        >
                        
                        <label for="slug">Slug</label>
                        <input readonly v-model="generarSlug" 
                        class="form-control" type="text" name="slug" id="slug"
                        >
                        
                        <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                            @{{ div_mensajeslug }}
                        </div>

                        <br v-if="div_aparecer">

                        
                        
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        
                    </div>
                  
              @{{ nombre }} 
                <br>
                {{-- @{{ generarSlug }} --}}
                <br>
               @{{ slug }} 

        </div>
    </div>
    <!-- /.card-body -->
        
        <div class="card-footer">
          
            <input
            :disabled = "desabilitar_boton ==1" 
            type="submit" value="Guardar" class="btn btn-primary float-right"
            >
            
        </div>
    </form>
        <!-- /.card-footer-->
</div>
    <!-- /.card -->



  @endsection