@extends('layouts.master')
@section('titulo')
   - Página Principal
@endsection
@section('contenido')

<link rel="icon" href="{{ URL::asset('/css/icon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-primera carousel-hero">
                        <h1 class="hero-title">Animales con ansias de conocerte</h1>
                        <p class="hero-subtitle">Estos son los animales mas bonitos que conoceras</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-segunda carousel-hero">
                        <h1 class="hero-title">Porque comprar cuando puedes adoptar?</h1>
                        <p class="hero-subtitle">Dales un hogar a estos gordines</p>

                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="jumbotron pulse animated hero-tercera carousel-hero">
                        <h1 class="hero-title">Muchos animales!</h1>
                        <p class="hero-subtitle">Tenemos muchos animales que buscan hogar!</p>

                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i
                            class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a
                        class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i
                            class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section>

    <div class="container">

    <form action="/animales/Todos">
    <input type="submit" class="verTodos" value="todos los animales" />
</form>

        <div class="row product-list dev">

            @foreach($animales as $animal)
               <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">
                <div class="product-container" onclick="clickProducto({{$animal->id}})">
                    <div class="row">
                        <div class="col-md-12"><a class="product-image"><img class="imagenes_animales" src="{{$animal->url}}"></a></div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <h2> <a href="/animal/{{$animal->id}}">{{$animal->nickname}}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="product-description">{{$animal->description}}</p>
                            <div class="row">
                                <div class="col-6"><a href="/animal/{{$animal->id}}"> <button class="btn btn-light" type="button">Mas Sobre {{$animal->nickname}}</button></div>
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
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
 
@endsection