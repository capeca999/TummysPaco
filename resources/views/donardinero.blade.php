@extends('layouts.master')

@section('titulo')
    - Página Donación
@endsection
@section('contenido')




    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<input type="hidden" id="idusuarioinput" value="{{ Auth::user()->id }}">

<div id="contenedorprincipal" class="container">


<div class="row">
	<aside class="col-sm-6">
<p> &nbsp </p>

<article class="card">
<div class="card-body p-5">


<form role="form">
<div class="form-group">
<label for="username">Razón de donación</label>
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="fa fa-heart"></i></span>
	</div>
	<select  class="form-control" name="razon" id="razon" placeholder="" required="">
  
  <option value="Ofrenda de amor">Ofrenda de amor</option><option value="Me gustan los animales">Me gustan los animales</option><option value="Me gusta ayudar">Me gusta ayudar</option>
</select>

</div> <!-- input-group.// -->
</div> <!-- form-group.// -->

<div class="form-group">
<label for="cardNumber">¿Quieres que sea anonimo?</label>
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
	</div>
	<select  class="form-control" name="anonimo" id="anonimo" placeholder="">

  <option value="no">No</option><option value="si">Si</option>
</select>


   
   

</div> <!-- input-group.// -->
</div> <!-- form-group.// -->

<div class="row">
    <div class="col-sm-8">
   
          
         
    <div class="col-sm-16">
        <div class="form-group">
            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">Cantidad de dinero que quieres donar </label>
            <input class="form-control"  id="dinerodonar" required="" type="number" min="0">
        </div> <!-- form-group.// -->
    </div>
</div> <!-- row.// -->
</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
	<aside class="col-sm-6">
<p> &nbsp</p>

<article class="card">
<div class="card-body p-5">

<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" value="Credit card" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-credit-card"></i> Tarjeta de Credito</a></li>
	<li class="nav-item">
		<a class="nav-link" value="Paypal" data-toggle="pill" href="#nav-tab-paypal">
		<i class="fab fa-paypal"></i>  Paypal</a></li>
	<li class="nav-item">
		<a class="nav-link" value="Debit card" data-toggle="pill" href="#nav-tab-bank">
		<i class="fa fa-university"></i>  Tarjeta De Debito</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="nav-tab-card">

	<form role="form">
	<div class="form-group">
		<label for="username">Nombre Y Apellidos</label>
		<input type="text" id="nombreapellidos" class="form-control" name="username" placeholder="" required="">
	</div> <!-- form-group.// -->

	<div class="form-group">
		<label for="cardNumber">Numero De La Tarjeta </label>
		<div class="input-group">
			<input type="text" id="numerotarjeta" class="form-control" name="cardNumber" placeholder="">
			<div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
					<i class="fab fa-cc-mastercard"></i> 
				</span>
			</div>
		</div>
	</div> <!-- form-group.// -->

	<div class="row">


    
    


	    <div class="col-sm-12">
	        <div class="form-group">
	            <label><span class="hidden-xs">Fecha De Caducidad</span> </label>
	        	<div class="input-group">
	        		<input type="number" id="mes" min="0" max="12" class="form-control" placeholder="MM" name="">
		            <input type="number" id="anyo" min="0" class="form-control" placeholder="YY" name="">
	        	</div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <div class="form-group">
	            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
	            <input type="number" id="ccv" min="0" class="form-control" required="">
	        </div> <!-- form-group.// -->
	    </div>
	</div> <!-- row.// -->
	<button class="subscribe btn btn-primary btn-block"  id="donarboton" type="button"> Donar  </button>
	</form>
</div> <!-- tab-pane.// -->


</div> <!-- tab-pane.// -->
</div> <!-- tab-content .// -->

</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/js/donacion.js"></script>


    @endsection