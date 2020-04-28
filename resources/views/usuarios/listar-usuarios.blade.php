@extends('layouts.master')
@section('contenido')

@section('scripts')
<script src="/js/listar-usuarios.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

@section('titulo')
- Listar Usuarios
@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">


<div id="contenedor-listar">
    <form action="#" method="get">
        <div class="listar-usuarios">
            <fieldset>
                <legend for="nombre">Fecha de Compra</legend>
                <input type="date" class="id-listar" id="fecha" aria-describedby="id">
            </fieldset><br><br>
            <fieldset>
                <legend>Importe</legend>
                <input type="number" id="importe" class="id-listar" min="0">
            </fieldset><br><br>
        </div>
    </form>
    <div class="container-fluid">
        <div class="row">
            <table class="tabla-usuarios table table-responsive text-center">
                <thead class="cabecera-tabla">
                    <tr>
                        <th scope="col">NIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha Nacimiento</th>
                    </tr>
                </thead>
                <tbody id="tbody-usuarios" class="fila-alta">

                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div id="contenedor-historial">
        <h1>Historial de Pedidos</h1>
        <hr>
        <div id="historiales">

        </div>
        <div id="listar-user-error"></div>

    </div>
</div>
@endsection