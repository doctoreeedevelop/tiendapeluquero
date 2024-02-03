<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nombre = $request->get('nombre');

        $productos = Product::with('images','category')->where('nombre', 'like', "%$nombre%")->orderBy('nombre')->paginate(10);
        return view('admin.product.index', compact('productos'));

        /*if( Session::get("category_id")!=null){
            $productos = Product::whereCategory_id(Session::get('category_id'))->get(["id","nombre"]);
            $categoria = Category::find(Session::get("category_id"));
            return view("admin.product.index", compact("productos", "categoria"));
            return $productos;
        }*/

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
