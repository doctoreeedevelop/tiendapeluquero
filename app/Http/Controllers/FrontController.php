<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontController extends Controller
{

    public function home()
    {
        $categorias = Category::all();
        //return $categorias;
        return view('front.plantillappal', compact('categorias'));
    }


    public function catalogo()
    {
        //$cat = Category::find(1)->products;
        //return $cat;
        //$categorias = Category::all();
        //return $categorias;
        $productos = Product::all();

        //return $productos;
        return view('front.catalogo', compact('productos'));
    }

    public function categoria($id)
    {
        //$cat =  Category::find($id);
        $productos = Category::find($id)->products()->get();
        //return $productos;
        return view('front.categoria', compact('productos'));
    }
}
