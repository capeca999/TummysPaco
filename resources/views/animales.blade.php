@extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')


<input type="hidden"  id="especienombre" value={{ $data['especie'] }}>

<div id="diventero"  class="row product-list dev">


    
    @foreach($data['animales'] as $animal)
          <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">

    <div class="product-container" onclick="clickProducto({{$animal->id}})">

        <div class="row">


            <div class="col-md-12">
                
            <a class="product-image">

                <img class="imagenes_animalestodos" src="{{$animal->url}}">
            </a>
        </div>
        </div>
        <div class="row">
            <div class="col-8">
            <h2>
                
            
            @if( empty($animal->condition))
        
            <img  title="{{$animal->species}}" class="iconoEstrella" src="/img/icons/{{$animal->species}}.png">    
        @else
        <img  title="Caso Especial" class="iconoEstrella" src="/img/icons/star.png">      
   
            @endif

        
 

            {{$animal->nickname}}  </h2> 
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="product-description">{{$animal->description}}</p>
                <div class="row">
                    <div class="col-6">  <a href="/animal/{{$animal->id}}"> <button class="btn btn-light"  type="button">Mas Sobre {{$animal->nickname}}</button> </a></div>
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



<nav>
        <ul class="pagination mb-5">
            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
            

            @for ($i = 2; $i <= round($data['cantidad']/2,0); $i++)
            <li class="page-item "><a class="page-link" href="javascript:void(0)" data-abc="true"> {{$i}}  </a></li>
    @endfor
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
        </ul>
    </nav>
    </div>
    <script src="/js/animalespecie.js"></script>
    <script src="/js/scriptAnimales.js"></script>
    @endsection
