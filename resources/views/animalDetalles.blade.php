@extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')

<?php
$ruta_gender="";
if($animales[0]->gender=='Macho'){
$ruta_gender="/img/animals/Macho.png";
}
else $ruta_gender="/img/animals/Hembra.png";


$dateOfBirth = $animales[0]->date_of_birth;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));

?>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">    <div>


	<div id="todoContenido" class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                        


						  <div class="tab-pane active" id="pic-1"><img src="{{ $animales[0]->url }}" /></div>
						  <div class="tab-pane" id="pic-2"><img src="{{ $animales[1]->url }}" /></div>
						  <div class="tab-pane" id="pic-3"><img src="{{ $animales[2]->url }}" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>



						
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ $animales[0]->url }}" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{ $animales[1]->url }}" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{ $animales[2]->url }}" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul>
						<input type="hidden"  id="hiddenid" value="{{$animales[0]->id}}">

					</div>
					<div class="details col-md-6">
						<h1 class="product-title"> <img class="iconoEstrellaDetalles" src="/img/icons/star.png"> {{ $animales[0]->nickname }} </h1>
						<div class="rating">
							<div class="stars">
                 <b>  Fecha De Nacimiento: </b> {{$animales[0]->date_of_birth}}   &nbsp  <b>Edad:</b>   {{ $diff->format('%y')}} <b>Años </b> &nbsp <br>
                <b>   Sexo: </b> <img class="gender" src="{{$ruta_gender}}"/> {{$animales[0]->gender}}
							</div>
							<span class="review-no"> <b>Raza: </b> {{$animales[0]->race}} &nbsp  <b> Especie: </b> {{$animales[0]->species}} </span>
                         
						</div>
						<p class="product-description"> {{$animales[0]->description}}  </p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						@if(Auth::user()!=null)
						<div class="action">
							<button id="adoptar" name="{{$animales[0]->id}}" class="add-to-cart btn btn-default" type="button">Adoptar Gordin</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
@endif


@if(Auth::user()==null)
<div class="action">
							<button id="adoptarIniciar" class="add-to-cart btn btn-default" type="button">Inicia Sesión Para Adoptar</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/js/animaldetalles.js"></script>

	@endsection