@extends('layouts.master')

@section('titulo')
    - Terminos y condiciones
@endsection
   
@section('contenido')


<div class="container py-5">

<form id="formDonar" action="/paginaComprar/" method="get">


<div class="row">
  <div class="col-lg-8 mx-auto">

    <!-- List group-->
    <ul class="list-group shadow">


@foreach($productos as $producto)

      <!-- list group item-->
      <li class="list-group-item">
        <!-- Custom content-->
        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
          <div class="media-body order-2 order-lg-1">
            <h5 class="mt-0 font-weight-bold mb-2">{{$producto->name}}</h5>
            <p class="font-italic text-muted mb-0 small">{{$producto->description}}</p>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <h6 class="font-weight-bold my-2">{{$producto->price}}€</h6>
              <ul class="list-inline small">
              <input type="number" id="{{$producto->id}}" name="{{$producto->id}}" min="0">
              </ul>
            </div>
          </div>
          <img src="{{$producto->image}}"  alt="{{$producto->name}}" width="200" class="ml-lg-5 order-1 order-lg-2 ">
        </div>
        <!-- End -->
      </li>
      <!-- End -->
@endforeach

    </ul>
    <!-- End -->
    <button  class="button" type="submit" value="Submit" data-hover="Haz Click Aqui!"><span>Comprar!</span></button>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/js/giftaza.js"></script>
@endsection