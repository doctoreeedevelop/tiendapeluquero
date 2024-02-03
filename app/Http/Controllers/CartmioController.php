<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
            return view('front.cart')->with('products', Product::all());
    }

    public function cart()
    {
        return view('front.cart');
    }
    

    public function addtocart($id)
    {
        
        //return session()->get('cart');
        
        //dd($id);
        //return $id;
        $product = product::findOrfail($id);
        //return $product;
        $cart = session()->get('cart');

         //dd($cart);


        //---------------SE EJECUTA CUANDO EL CARRRITO ESTA VACIO------------------// 
        if (!$cart) 
        {

            $cart= [$product->id => $this->sessionData($product)];
            $this->setSessionAndReturnResponse($cart);

            //return 'entro';
           /*  $cart= [

                $product->id => $this->sessionData($product)

                
                 $product->id =>[
                    'nombre' => $product->nombre,
                    'cantidad' => 1,
                    'precio' => $product->precio_actual,
                    'image' => $product->imgppal
                ] 
            ]; */

            //return $cart;
            //$valor = session()->put('cart', $cart);
           /*  //return $valor;
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', "Adicioanste al Carrito"); */

        }

        //---------------SE EJECUTA CUANDO EL CARRRITO ESTA CON EL MISMO PRODUCTO , OSEA SE ESCOJIO EL MISMO PRODUCTO------------------// 

        if (isset($cart[$product->id]))
        {
            
            $cart[$product->id]['cantidad']++;
            return $this->setSessionAndReturnResponse($cart);

            
            
            
            //return 'entro';
            /* $cart[$product->id]['cantidad']++;
            $this->setSessionAndReturnResponse($cart); */


            /* $cart=[
                $product->id =>[
                    'nombre' => $product->nombre,
                    'cantidad' => ['cantidad']+['cantidad'],
                    'precio' => $product->precio,
                    'image' => $product->imgppal
                ]

            ];        */ 
            /* session()->put('cart', $cart);
            return redirect()->route('cart')->with('successes', "Adicioanste al Carrito"); */
        }

        //---------------SE EJECUTA CUANDO EL CARRRITO YA SE INICIALIZO Y SE ESCOJE UNO DIFERENTE------------------// 

        /* $cart[$product->id] = [
                'nombre' => $product->nombre,
                'cantidad' => 1,
                'precio' => $product->precio_actual,
                'image' => $product->imgppal
        ]; */
        
        $cart[$product->id] = $this->sessionData($product);
        return $this->setSessionAndReturnResponse($cart);

        //return $cart;
       /*  session()->put('cart', $cart);
        return redirect()->route('cart')->with('successes', "Adicioanste al Carrito"); */

    }

    public function removecart(Product $product, $id)
    {
        return $product;
        return $id;
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('successes', "Eliminaste Un Articulo Del Carrito");

    }

    protected function sessionData(Product $product)
    {
        return [
            
                'nombre'    => $product->nombre,
                'cantidad'  => 1,
                'precio'    => $product->precio_actual,
                'image'     => $product->imgppal
              
        ];
    }

    protected function setSessionAndReturnResponse($cart)
    {
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('successes', "Adicioanste al Carrito");
    }
}
