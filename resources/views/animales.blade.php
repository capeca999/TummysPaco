@extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')

<div class="row product-list dev">

@foreach($animales as $animal)
   <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">
    <div class="product-container" onclick="clickProducto({{$animal->id}})">
        <div class="row">
            <div class="col-md-12"><a class="product-image"><img class="imagenes_animales" src="{{$animal->url}}"></a></div>
        </div>
        <div class="row">
            <div class="col-8">
                <h2>{{$animal->nickname}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="product-description">{{$animal->description}}</p>
                <div class="row">
                    <div class="col-6"> <button class="btn btn-light" type="button">Mas Sobre {{$animal->nickname}}</button></div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

</div>
</div>

    <script src="/js/scriptAnimales.js"></script>
    @endsection
