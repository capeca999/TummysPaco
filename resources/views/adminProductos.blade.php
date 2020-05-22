
@extends('layouts.master')

@section('titulo')
    - Admin Usuarios
@endsection
@section('contenido')      
    <div id="diventero" class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
     
        <button class="btn btn-primary"  id="botonAñadir" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-plus" aria-hidden="true"></i>
 Añadir Producto</button>

 <button class="btn btn-primary"  id="ExportarExcel" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-excel-o" aria-hidden="true"></i>
 Exportar A Excel</button>


 <button class="btn btn-primary"  id="ExportarPDF" data-toggle="modal" data-target="#modal1" type="button"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 Exportar A PDF</button>


            <table id="tablaproductos" class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID</th>
                        <th id="trs-hd" class="col-lg-1">Stock</th>
                        <th id="trs-hd" class="col-lg-1">Price</th>
                        <th id="trs-hd" class="col-lg-1">Name</th>
                        <th id="trs-hd" class="col-lg-1">Description</th>
                        <th id="trs-hd" class="col-lg-1">Image</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody id="productosAdmin">
                
                    <tr class="warning no-result">
                        <td id="noresult" colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
          
      
              
                    @foreach($productos as $producto)
                    <tr id ="{{$producto->id}}">                
                       <td name="id">{{$producto->id}}</td>
                        <td name="stock">{{$producto->stock}}</td>
                        <td name="price">{{$producto->price}}</td>
                        <td name="name">{{$producto->name}}</td>
                        <td name="description">{{$producto->description}}</td>
                        <td name="image">

                        <img src="{{$producto->image}}" class="iconoProductoAdmin">

                        </td>                   
                     
                    </td>
                        <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminproductos.js"></script>

    @endsection