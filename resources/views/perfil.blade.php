

@extends('layouts.master')
@section('titulo')
- Perfil
@endsection
@section('contenido')




<div id="usuario-perfil">
    <div id="contenedor-perfil">
        <h1>Perfil de {{Auth::user()->name}} </h1>
        Nombre&nbsp;&nbsp;<span class="nombre" title="Doble click para cambiar">{{Auth::user()->name}}</span><br><br>
        Apellidos&nbsp;&nbsp;<span id="apellido1" title="Doble click para cambiar">{{Auth::user()->surname1}}</span>&nbsp;<span id="apellido2" title="Doble click para cambiar">{{Auth::user()->surname2}}</span> <br><br>
        Fecha Nacimiento&nbsp;&nbsp; <span id="nacimiento" title="Doble click para cambiar">{{Auth::user()->date_of_birth}}</span><br><br>
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
        @foreach($historiales as $historial)
{{$historial->name}}
@endforeach


        </div>
    </div>
</div>
<script src="/js/perfil-usuario.js"></script>

@endsection