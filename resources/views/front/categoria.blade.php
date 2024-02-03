

@include('front/header') 
{{-- @include('front/detalle')   --}}




<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>


{{-- {{$categorias}} --}}



<section class="p-t-23 p-b-130 mt-56">
    <div class="container mt-56">
        <div class="fondo-categoria">

            <div class="p-b-10">
                <h3 class="titulo2 ltext-103 cl5">
                   CATEGORIA {{ $productos[0]->category_id }}  
                  {{--  {{$categorias}}  --}}
                  
                   {{-- {{$categorias[0]->category_id}}        --}} 
                   
                     {{--  {{\Cart::count()}} --}}
                   
                </h3>
            </div>
        </div>


        {{-- CATEGOARIAS DESDE CATEGORIA --}}
        {{-- 
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men"> --}}
                <!-- Block2 -->
                <div class="row">
                        {{-- {{$productos}}  --}}
                      
                        @foreach ($productos as $product)
                        
                        {{$product->id}}

                        <div class="col-sm-3 mb-5">
                            <div class="block2 card">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ $product->imgppal }}"  alt="IMG-PRODUCT">
                                    
                                    
                                    
                                    <a href="{{ route('detalle', $product->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 jjs-show-modal1">
                                        Ver Detalle .!!!
                                    </a>

                                 

                                </div>


                                <form action="{{ route('add') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    
                                    <input type="hidden" name="id" value={{$product->id}}>
                                    <input type="submit" name="btn" class="btn btn-success w-100" value="Agregar al carrito">
                                </form> 


                                {{-- <button class="btb btn-success"   type="button"   onclick="openmodal()"    >Modal</button> --}}

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l card-body">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->nombre}}
                                        </a>

                                        <span class="stext-105 cl3">
                                            {{$product->precio_actual}}
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset ('asset/plantillappal/imagenes/iconos/corazon.png') }}" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset ('asset/plantillappal/imagenes/iconos/corazon2.png') }}" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      

                </div>
            {{-- </div> --}}
    </div>
    

</section>

@include('front/footer') 