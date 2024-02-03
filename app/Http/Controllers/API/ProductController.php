<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        /*$cat = new Product();
        $cat->nombre    = 'Mujer';
        $cat->slug      = 'Mujer';
        $cat->descripcion   ="Ropa de Mujer";
        $cat->save();
        return $cat;*/

        //$categorias = Product::all();
        return Product::all();
        //return view('admin.Product.index', compact('categorias'));

    }

    public function show( $slug )
    {

         /* $cat = new Product();
        $cat->nombre = $request->nombre;
        $cat->slug = $request->slug;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        
        
        return $cat; */
        //return $request;

        //return Product::create($request->all());


        if(Product::where('slug', $slug)->first()){
            return 'Slug Existe';
        }
        else{
            return 'Slug Disponible';
        }
        
    }


}
