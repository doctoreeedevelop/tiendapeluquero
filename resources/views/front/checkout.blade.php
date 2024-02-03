@include('front/header') 


<section>
    <div class="container p-b-30">
        <h3>Tenemos dos Metodos de pago</h3>
        
        <p></p>la factura con un valor de 100.000 $ Esta lista</p>

        <h3>Selecciona algun metodo a continuacion:</h3>

        <div class="row mb-11">
        
            <div class="col-md-6">
                <a href="{{ route('confirmarcarrito')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Pago contraentrega Efectivo
                </a>
            </div>
            <div class="col-md-6">        
                <a href="{{ route('confirmarcarrito')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Pago contraentrega Transferencia
                </a>

            </div>
        </div>
    </div>
</section>




@include('front/footer') 