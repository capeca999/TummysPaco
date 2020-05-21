
@extends('layouts.master')

@section('titulo')
    - Admin Animales
@endsection
@section('contenido')    

<div id="contenedorprincipalpagina">


    <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">

        <button class="btn btn-primary"  id="botonAñadir" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-plus" aria-hidden="true"></i>
 Añadir Animal</button>

            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID.</th>
                        <th id="trs-hd" class="col-lg-1">Race</th>
                        <th id="trs-hd" class="col-lg-1">Species</th>
                        <th id="trs-hd" class="col-lg-1">Gender</th>
                        <th id="trs-hd" class="col-lg-1">Date_of_birth</th>
                        <th id="trs-hd" class="col-lg-1">Description</th>
                        <th id="trs-hd" class="col-lg-1">Health</th>
                        <th id="trs-hd" class="col-lg-1">Nickname</th>
                        <th id="trs-hd" class="col-lg-1">Place found</th>
                        <th id="trs-hd" class="col-lg-1">Size</th>
                        <th id="trs-hd" class="col-lg-1">Date Found</th>
                        <th id="trs-hd" class="col-lg-1">Condition</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody id="animalesAdmin">
                
                    <tr class="warning no-result">
                        <td id="noresult" colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
          
                  
              
                    @foreach($animales as $animal)
                    <tr id ="{{$animal->id}}">        
                        <td name="id">{{$animal->id}}</td>
                        <td name="race">{{$animal->race}}</td>
                        <td name="species">{{$animal->species}}</td>
                        <td name="gender">{{$animal->gender}}</td>
                        <td name="date_of_birth">{{$animal->date_of_birth}}</td>
                        <td name="description">{{$animal->description}}</td>
                        <td name="health">{{$animal->health}}</td>
                        <td name="nickname">{{$animal->nickname}}</td>
                        <td name="place_found">{{$animal->place_found}}</td>
                        <td name="size">{{$animal->size}}</td>
                        <td name="date_found">{{$animal->date_found}}</td>
                        <td name="condition">{{$animal->condition}}</td>
                        <td>
                            <button class="btn btn-success" style="margin-left: 5px;" type="submit">
                            <i class="fa fa-check" style="font-size: 15px;"></i>
                        </button>
                        
                        <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                        <i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminanimales.js"></script>
  
    @endsection