@extends('layouts.master')

@section('titulo')
    - Terminos y condiciones
@endsection
   
@section('contenido')


<div class="container py-5">

<form id="formDonar" action="//" method="get">


<div class="row">
  <div class="col-lg-8 mx-auto">

    <!-- List group-->
    <ul class="list-group shadow">

      <!-- list group item-->
      <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Taza Tummys</h5>
            <p class="font-italic text-muted mb-0 small">Una taza con un diseño sencillo pero muy especial.</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">€10.00</h6>
              <ul class="list-inline small">
              <input type="number" id="cantidadTaza" name="cantidadTaza" min="0">
              </ul>
            </div>
          </div>
          

          <img src="/img/products/tazaTummys/taza.jpg" id="giftaza" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2 ">



        </div>
        <!-- End -->
      </li>
      <!-- End -->

      <!-- list group item-->
      <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Camiseta Manga Larga Unisex Tummys</h5>
            <p class="font-italic text-muted mb-0 small">Camiseta de Manga Larga Unisex 100% algodón con el logo de Tummys!</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">$25.00            
              <input type="number" id="cantidadCamisetaLarga" name="cantidadCamisetaLarga" min="0">
</h6>
              <ul class="list-inline small">
                <li  id="blancoLargo" class="list-inline-item m-0"><i class="fa fa-circle" style="color: snow; border-style:solid ; border-color:black  ;border-radius: 50%;"  ></i></li>
                <li  id="grisLargo"class="list-inline-item m-0"><i class="fa  fa-circle" style="color: grey; border-style:solid ; border-color:black  ;border-radius: 50%;" ></i></li>
                <li  id="negroLargo"class="list-inline-item m-0"><i class="fa  fa-circle" style="color: black; border-style:solid ;  border-color:black ;border-radius: 50%;" ></i></li>
<input type="hidden" id="colorCamisetaLarga" name="colorCamisetaLarga" value="white">

              </ul>
            </div>
          </div>
        
          <img id="camisetaLarga" src="/img/products/camisetaBlancaTummys/1.JPG" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
        </div>
        <!-- End -->
      </li>
      <!-- End -->

      <!-- list group item -->
      <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Camiseta Manga Corta Unisex Tummys</h5>
            <p class="font-italic text-muted mb-0 small">Camiseta de Manga Corta Unisex 100% algodón con el logo de Tummys! </p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">$25.00               
              <input type="number" id="cantidadCamisetaCorta" name="cantidadCamisetaCorta" min="0">
</h6>
              <ul class="list-inline small">
              <li  id="blancoCorto" class="list-inline-item m-0"><i class="fa fa-circle" style="color: snow; border-style:solid ; border-color:black  ;border-radius: 50%;"  ></i></li>
                <li  id="moradoCorto"class="list-inline-item m-0"><i class="fa  fa-circle" style="color: purple; border-style:solid ; border-color:black  ;border-radius: 50%;" ></i></li>
                <li  id="negroCorto"class="list-inline-item m-0"><i class="fa  fa-circle" style="color: black; border-style:solid ;  border-color:black ;border-radius: 50%;" ></i></li>
                <input type="hidden" id="colorCamisetaCorta" name="colorCamisetaCorta" value="white">

              </ul>
            </div>
          </div>
          
          
          <img id="camisetaCorta" src="/img/products/camisetaCortaBlancaTummys/1.JPG" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
 
       
        </div>
        <!-- End -->
      </li>
      <!-- End -->

      <!-- list group item -->
      <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Alfombrilla Tummys</h5>
            <p class="font-italic text-muted mb-0 small">Navega con estilo con nuestra alfombrilla Tummys!.</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">$10.00            
              <input type="number" id="cantidadAlfombrilla" name="cantidadAlfombrilla" min="0">
</h6>

            </div>
          </div>
          <img id="alfombrilla" src="/img/products/alfombrilla/1.png" alt="Alfombrilla" width="200" class="ml-lg-5 order-1 order-lg-2">
        </div>
        <!-- End -->
      </li>
      <!-- End -->


   <!-- list group item -->
   <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Collar Tummys Personalizable</h5>
            <p class="font-italic text-muted mb-0 small">Personaliza tu mascota con un collar personalizable!</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">$15.00            
              <input type="number" id="cantidadCollar" name="cantidadCollar" min="0">
              <input type="text" id="nombreCollar" name="nombreCollar" placeholder="nombre de tu mascota">
</h6>
              <ul class="list-inline small">
              </ul>
            </div>
          </div>
          
          
          <img id="collar" src="/img/products/collar/1.JPG" alt="Collar Tummys" width="200" class="ml-lg-5 order-1 order-lg-2">
 
       
        </div>
        <!-- End -->
      </li>
      <!-- End -->
   <!-- list group item -->
   <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">Pulsera Goma Tummys!</h5>
            <p class="font-italic text-muted mb-0 small">Pulsera de goma negra de Tummys!</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">$10.00      
              <input type="number" id="cantidadPulsera" name="cantidadPulsera" min="0">
</h6>
              <ul class="list-inline small">
            
              </ul>
            </div>
          </div>
          
          
          <img id="Pulsera" src="/img/products/PulseraGoma/1.png" alt="Pulsera Goma" width="200" class="ml-lg-5 order-1 order-lg-2">
 
       
        </div>
        <!-- End -->
      </li>
      <!-- End -->




    </ul>
    <!-- End -->
    <button  class="button" type="submit" value="Submit" data-hover="Haz Click Aqui!"><span>Comprar!</span></button>
  </div>
</div>
</div>
<script src="/js/giftaza.js"></script>
@endsection