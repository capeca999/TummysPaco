@extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')
<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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

<input type="hidden" id="idanimal" value="{{$animales[0]->id}}">    <div>



	<div id="todoContenido" class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
					<div class="tab-pane active" id="pic-0"><img src="{{ $animales[0]->url }}" /></div>
				@for($i =1; $i< count($animales); $i++)
					<div class="tab-pane" id="pic-{{$i}}"><img src="{{ $animales[$i]->url }}" /></div>
				@endfor


						</div>



						
						<ul class="preview-thumbnail nav nav-tabs">
						<li class="active"><a data-target="#pic-0" data-toggle="tab"><img src="{{ $animales[0]->url }}" /></a></li>

						@for($i =1; $i < count($animales); $i++)
						<li><a data-target="#pic-{{$i}}" data-toggle="tab"><img src="{{ $animales[$i]->url }}" /></a></li>

						@endfor
						</ul>
						<input type="hidden"  id="hiddenid" value="{{$animales[0]->id}}">

					</div>
					<div class="details col-md-6">

					@if( empty($animales[0]->condition))
					<h1 class="product-title"> <img  title="{{$animales[0]->species}}" class="iconoEstrellaDetalles" src="/img/icons/{{$animales[0]->species}}.png">     {{ $animales[0]->nickname }} </h1>
					@else
				<h1 class="product-title"> <img  title="Caso Especial" class="iconoEstrellaDetalles" src="/img/icons/star.png">     {{ $animales[0]->nickname }} </h1>
				@endif
						<div class="rating">
							<div class="stars">
                 <b>  Fecha De Nacimiento: </b> {{$animales[0]->date_of_birth}}   &nbsp  <b>Edad:</b>   {{ $diff->format('%y')}} <b>Años </b> &nbsp <br>
                <b>   Sexo: </b> <img class="gender" src="{{$ruta_gender}}"/> {{$animales[0]->gender}}  <b> Tamaño: </b> {{$animales[0]->size}}
							</div>
							<span class="review-no"> <b>Raza: </b> {{$animales[0]->race}} &nbsp  <b> Especie: </b> {{$animales[0]->species}} </span>
                         
						</div>
						<p class="product-description"> {{$animales[0]->description}}  </p>
						
						@if(Auth::user()!=null)
						<div class="action">
							<button id="adoptar" name="{{$animales[0]->id}}" class="add-to-cart btn btn-default" type="button">Adoptar Gordin</button>						
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
							<button class="like btn btn-default graficapesos" id="graficapesos" type="button"> Ver gráfica de pesos<span class="fa fa-area-chart"></span></button>
							<button class="like btn btn-default tablavacunas" id="tablavacunas" type="button"> Ver tabla de vacunas<span class="fa fa-user-md"></span></button>

						</div>

				@endif

				@if(Auth::user()==null)
					<div class="action">
							<button id="adoptarIniciar" class="add-to-cart btn btn-default" type="button">Inicia Sesión Para Adoptar</button>
							<button class="like btn btn-default graficapesos" id="graficapesos" type="button"> Ver gráfica de pesos<span class="fa fa-area-chart"></span></button>
							<button class="like btn btn-default tablavacunas" id="tablavacunas" type="button"> Ver tabla de vacunas<span class="fa fa-user-md"></span></button>

						</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>





<div id="todografica">



</div>

<div id="tablavacunaslista">




</div>

</div>


	<script src="/js/animaldetalles.js"></script>

	@endsection