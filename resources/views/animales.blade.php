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
            <h2>
                
            
            @if( empty($animal->condition))
            @if($animal->species == "Hamster")
            <img  title="Hamster" class="iconoEstrella" src="/img/icons/hamster.png">    
         
            @elseif  ($animal->species == "Gato")
            <img title="Gato"class="iconoEstrella" src="/img/icons/gato.png">    
            @elseif  ($animal->species == "Ave")
            <img title="Ave" class="iconoEstrella" src="/img/icons/pajaro.png">  
            @elseif  ($animal->species == "Conejo")
            <img title="Conejo"class="iconoEstrella" src="/img/icons/conejo.png">  
            @elseif  ($animal->species == "Uron")
            <img title="Uron" class="iconoEstrella" src="/img/icons/uron.png">  
            @elseif  ($animal->species == "Cobaya")
            <img title="Cobaya" class="iconoEstrella" src="/img/icons/cobaya.png">  
            @elseif  ($animal->species == "Canina")
            <img title="Perro"class="iconoEstrella" src="/img/icons/perro.png">  
            @endif
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

    <script src="/js/scriptAnimales.js"></script>
    @endsection
