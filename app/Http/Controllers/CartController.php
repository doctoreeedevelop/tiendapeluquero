<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Pedido;
use App\Models\Detalle;

class CartController extends Controller
{
        
        function index()
        {

            return view('front.cart');

           
            
        }
    
    
    
        function cart()
        {

            

            $contar = auth();
            return $contar;
        }

        public function add(Request $request)
        {
            $producto = Product::find($request->id);
            //return $producto;
            if (empty($producto))
                return redirect('categoria');
                //dd($producto);
            Cart::add(
                $producto->id,
                $producto->nombre,
                1,
                $producto->precio_actual,
                ["image" => $producto->imgppal]
                
            );

            //return 'AGREGADO';
            return redirect()->back()->with('succes',"item agregado". $producto->nombre);



        } 

        public function checkout()
        {
            return view('front.checkout');
        }

        public function removeItem(Request $request)
        {
            Cart::remove($request->rowId);
            return redirect()->back()->with('danger',"item Eliminado");

        }
        
        public function clear()
        {
            Cart::destroy();
            return redirect()->back()->with('success',"Carrito Vacio");

        }


       

        public function confirmarCarrito()
        {
            $pedido = new Pedido();
            $pedido->subtotal           =   Cart::subtotal();
            $pedido->iva                =   Cart::tax();
            $pedido->total              =   Cart::total();
            $pedido->fechapedido        =   date("y-m-d h:m:s");
            $pedido->estado             =   "Nuevo";
            $pedido->user_id            =   auth()->user()->id;
            $pedido->save();    

            foreach(Cart::content() as $item)
            {
                
                $detalle = new Detalle();
                $detalle->precio        =   $item->price;        
                $detalle->cantidad      =   $item->qty;
                $detalle->importe       =   $item->price * $item->qty;
                $detalle->product_id    =   $item->id;
                $detalle->pedido_id     =   $pedido->id;
                $detalle->save();

            }

            Cart::destroy();
            //return redirect()->back()->with("success", "Listo Tu pedido Esta En Camino");

            return redirect()->route('home')->with('status_success', 'El Usuario Se Actulizo Correctamente');

        }



}
