
@extends('layouts.master')

@section('titulo')
    - Admin Petitions
@endsection
@section('contenido')    
    <div id="divprincipal" class="col-md-12 search-table-col">
    <button class="btn btn-primary"  id="ExportarExcel" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-excel-o" aria-hidden="true"></i>
 Exportar A Excel</button>


 <button class="btn btn-primary"  id="ExportarPDF" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 Exportar A PDF</button>

        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
     
            <table id="tablapetitions" class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID.</th>
                        <th id="trs-hd" class="col-lg-1">Id_user</th>
                        <th id="trs-hd" class="col-lg-1">Id_animal</th>
                        <th id="trs-hd" class="col-lg-1">Name_Petition</th>
                        <th id="trs-hd" class="col-lg-1">Email_Petition</th>
                        <th id="trs-hd" class="col-lg-1">Telephone_Number</th>
                        <th id="trs-hd" class="col-lg-1">Commentary</th>
                        <th id="trs-hd" class="col-lg-1">Status</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody id="animalesAdmin">
                
                    <tr class="warning no-result">
                        <td id="noresult" colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                
                  
              <input id="idusuario" type="hidden"  value="{{Auth::user()->name}}">
              <input id="emailusuario" type="hidden"  value="{{Auth::user()->email}}">

                    @foreach($petitions as $petition)
                    <tr>
                 

                        <td name="id">{{$petition->id}}</td>
                        <td name="id_user">{{$petition->id_user}}</td>
                        <td name="id_animal">{{$petition->id_animal}}</td>
                        <td name="petition">{{$petition->name_petition}}</td>
                        <td name="email_petition">{{$petition->email_petition}}</td>
                        <td name="telephone_number">{{$petition->telephone_number}}</td>
                        <td name="commentary">{{$petition->commentary}}</td>
                        <td name="Status">{{$petition->Status}}</td>
                        <td id="{{$petition->id}}" name="{{$petition->id_animal}}">
                                                   <button class="btn btn-success"  title="Aceptado" value="{{$petition->id}}" name="Accepted" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button>
                                                   <button class="btn btn-danger"  title="Cancelado"  value="{{$petition->id}}"   name="Cancelled" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminpetitions.js"></script>
  
    @endsection