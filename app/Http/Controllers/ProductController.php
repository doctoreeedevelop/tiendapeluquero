<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');

        $productos = Product::where('nombre', 'like', "%$nombre%")->orderBy('nombre')->paginate(10);
        
        return view('admin.product.index', compact('productos'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        //return $categorias;
        return view('admin.product.create', compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
                
                /* 'nombre' => 'required│max:50│unique:products,nombre',
                'slug' => 'require│unique:products,slug', 
                'imagenes.*' => 'image│mimes:jpeg,png,jpg,gif,svg│max:2048',*/



        ]);

        $urlimagenes = [];

        if ($request->hasfile('imagenes'))
        {
            $imagenes = $request->file('imagenes');

            //dd(($imagenes));

            foreach($imagenes as $imagen)
            {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta,$nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }

            //return $urlimagenes;
        }


        //return $request->all();
        
        $prod = new Product;

        
        $prod->nombre                       =   $request->nombre;
        $prod->slug                         =   $request->slug;
        $prod->category_id                  =   $request->category_id;
        $prod->cantidad                     =   $request->cantidad;
        $prod->precio_anterior              =   $request->precioanterior;
        $prod->precio_actual                =   $request->precioactual;
        $prod->porcentaje_descuento         =   $request->porcentajededescuento;
        $prod->descripcion_corta            =   $request->descripcion_corta;
        $prod->descripcion_larga            =   $request->descripcion_larga;
        $prod->especificaciones             =   $request->especificaciones;
        $prod->datos_de_interes             =   $request->datos_de_interes;
        $prod->estado                       =   $request->estado;
        $prod->activo                       =   $request->activo;
        $prod->sliderprincipal              =   $request->sliderprincipal;
        
        if($request->activo)
        {
            $prod->activo = 'si';
        }else{
            $prod->activo = 'no';
        }

        if($request->sliderprincipal)
        {
            $prod->sliderprincipal = 'si';
        }else{
            $prod->sliderprincipal = 'no';
        }

        $prod->save();


        $prod->images()->createMany($urlimagenes);

        return $prod->images;


        
        //return $prod;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function detalle($id)
    {
        
        $productos = Product::find($id);


        
        return view('front.detalle', compact('productos'));
    }






}
