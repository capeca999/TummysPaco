
@extends('layouts.master')

@section('titulo')
    - Admin Animales
@endsection
@section('contenido')    
<div id="contenedorprincipalpagina">

<input id="animalhidden" type="hidden">

    <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">

  

 <button class="btn btn-primary"  id="ExportarExcel" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-excel-o" aria-hidden="true"></i>
 Exportar A Excel</button>


 <button class="btn btn-primary"  id="ExportarPDF" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 Exportar A PDF</button>


            <table id="tablaanimales"  class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID.</th>
                        <th id="trs-hd" class="col-lg-1">Race</th>
                        <th id="trs-hd" class="col-lg-1">Species</th>
                        <th id="trs-hd" class="col-lg-1">Gender</th>
                        <th id="trs-hd" class="col-lg-1">Date_of_birth</th>
                        <th id="trs-hd" class="col-lg-1">Health</th>
                        <th id="trs-hd" class="col-lg-1">Nickname</th>
                        <th id="trs-hd" class="col-lg-1">Size</th>
                        <th id="trs-hd" class="col-lg-1">Condition</th>
                        <th id="trs-hd" class="col-lg-1">Image</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody id="animalesAdmin">
                
                    <tr class="warning no-result">
                        <td id="noresult" colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
          
                  
              
                    @foreach($data['animales'] as $animal)
                    <tr id ="{{$animal->id}}">        
                        <td name="id">{{$animal->id}}</td>
                        <td name="race">{{$animal->race}}</td>
                        <td name="species">{{$animal->species}}</td>
                        <td name="gender">{{$animal->gender}}</td>
                        <td name="date_of_birth">{{$animal->date_of_birth}}</td>
                        <td name="health">{{$animal->health}}</td>
                        <td name="nickname">{{$animal->nickname}}</td>
                        <td name="size">{{$animal->size}}</td>
                        <td name="condition">{{$animal->condition}}</td>
                        <td name="condition"><img  class=" iconoProductoAdmin" src="{{$animal->url}}"></td>
      
                        <td>
                        <button type="button" value="{{$animal->id}}" class="vacunabotonadir btn btn-primary mybtn " data-toggle="modal" data-target="#vacunasmodal">

                            <i class="fa fa-user-md" style="font-size: 15px;"></i>
                        </button>
                        
                        <button class=" pesosbotonanadir btn btn-success"   value="{{$animal->id}}"   data-toggle="modal" data-target="#pesosmodal" style="margin-left: 5px;" type="submit">
                        <i class="fa fa-cubes" style="font-size: 15px;"></i></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
</div>





<div class="container">
  <div class="supreme-container">
  <!-- Button to Open the Modal -->
 
 
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="vacunasmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <center>  <span class="modal-title">Formulario Vacuna</span></center>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<p class="text-intro">Introduce la fecha de vacunación y el nombre de la vacuna.</p>
		<div class="form-div">
  <div class="form-group">
    <input type="date" class="form-control" id="datevacuna" >
  </div>
 
  <div class="form-check">
<select id="nombre_vacuna" class="form-control"  name="nombre_vacuna" >
@foreach($data['vacunas'] as $vacuna)
  <option value="{{$vacuna->id}}">{{$vacuna->name}}</option>
</select>
@endforeach


  </div>
  <button  id="submitvacuna" class="btn btn-warning btn-block mybtn">Crear Vacunación</button>
  
		</div>
        </div>
        
       
      </div>
    </div>
  </div>
  
</div>



<div class="container">
  <div class="supreme-container">
  <!-- Button to Open the Modal -->
 
 
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="pesosmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <center>  <span class="modal-title">Formulario Peso</span></center>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<p class="text-intro">Introduce la fecha de Peso, el peso .</p>
		<div class="form-div">
  <div class="form-group">
    <input type="date" class="form-control" id="datepeso" >
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control" id="cantidadpeso" placeholder="1kg">
  </div>
  <div class="form-check">

  </div>
  <button  id="submitpeso"  class="btn btn-warning btn-block mybtn">Crear Peso</button>
  
		</div>
        </div>
        
       
      </div>
    </div>
  </div>
  
</div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminpesosvacunas.js"></script>
  
    @endsection