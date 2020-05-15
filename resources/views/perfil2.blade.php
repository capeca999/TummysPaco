

@extends('layouts.master')
@section('titulo')
- Perfil
@endsection
@section('contenido')




<div id="usuario-perfil">
    <div id="contenedor-perfil">
        <h1>Perfil de {{Auth::user()->name}} </h1>
        Nombre&nbsp;&nbsp;<span class="nombre" title="Doble click para cambiar">{{Auth::user()->name}}</span><br><br>
        Apellidos&nbsp;&nbsp;<span id="apellido1" title="Doble click para cambiar">{{Auth::user()->first_name}} </span>&nbsp;<span id="apellido2" title="Doble click para cambiar">{{Auth::user()->last_name}}</span> <br><br>
        Fecha Nacimiento&nbsp;&nbsp; <span id="nacimiento" title="Doble click para cambiar">{{Auth::user()->date_birth}}</span><br><br>
       Numero De Telefono&nbsp;&nbsp; <span id="telefono" title="Doble click para cambiar">{{Auth::user()->telephone_number}}</span><br><br>

        <hr>
        Email&nbsp;&nbsp;<span id="email" title="Doble click para cambiar">{{Auth::user()->email}}</span><br><br>
      


        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif


    </div>
    <div id="contenedor-historial">
        <h1>Historial de Pedidos</h1>

        <div id="historiales">

<pre>
{{var_dump($historiales)}}
</pre>
        @foreach($historiales as $historial)


        <div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">{{$historial->id_order}}</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Expected Arrival <span></span></p>
                <p>USPS <span class="font-weight-bold"></span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{$historial->name}}


@endforeach





        </div>
    </div>
</div>
<script src="/js/perfil-usuario.js"></script>

@endsection