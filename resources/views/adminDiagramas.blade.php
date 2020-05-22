
@extends('layouts.master')

@section('titulo')
    - Admin Animales
@endsection
@section('contenido')    

<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<section class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div id="bar-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="line-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="area-chart"></div>
      </div>
      
      <div class="col-md-4">
        <div id="donut-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="pie-chart"></div>
      </div>
    </div>
  </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/admingraphs.js"></script>
  
    @endsection