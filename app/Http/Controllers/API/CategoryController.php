<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$cat = new Category();
        $cat->nombre    = 'Mujer';
        $cat->slug      = 'Mujer';
        $cat->descripcion   ="Ropa de Mujer";
        $cat->save();
        return $cat;*/

        $categorias = Category::all();
        return view('admin.category.index', compact('categorias'));

    }

    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //return $request;
        //return Category::create($request->all());

        
        Category::create($request->all());

        return redirect()->route('admin.category.index')->with('datos','Registro Creado Corectamente');
    }

    /**
     * Display the specified resource.
     */
    public function show( $slug )
    {

         /* $cat = new Category();
        $cat->nombre = $request->nombre;
        $cat->slug = $request->slug;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        
        
        return $cat; */
        //return $request;

        //return Category::create($request->all());


        if(Category::where('slug', $slug)->first()){
            return 'Slug Existe';
        }
        else{
            return 'Slug Disponible';
        }
        
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
