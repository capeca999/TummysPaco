
@extends('layouts.master')

@section('titulo')
    - Admin Petitions
@endsection
@section('contenido')    
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<iframe id="txtArea1" style="display:none"></iframe>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2>Detalles <b>Pedidos</b></h2>
					</div>
					<div class="col-sm-8">						
						<a href="#" id="btnExport" class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
 <span>Exportar a Excel</span></a>
					</div>
                </div>
            </div>
			<div class="table-filter">
				<div class="row">
                    <div class="col-sm-3">
						<div class="show-entries">
							<span>Show</span>
							<select id="cantidad" class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
                                <option>20</option>
                                <option>Todos</option>
							</select>
							<span>Entradas</span>
						</div>
					</div>
                    <div class="col-sm-9">
						<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
						<div class="filter-group">
							<label>Nombre</label>
							<input type="text"  id="searchbyname" class="form-control">
						</div>
				
						<div class="filter-group">
							<label>Status</label>
							<select id="statuspedido" class="form-control">
								<option>Todos</option>
								<option>Order Processed</option>
								<option>Order Shipped</option>
								<option>Order En Route</option>
								<option>Order Arrived</option>
							</select>
						</div>
						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
			</div>
            <table id="tablapedidos" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Usuario</th>
						<th>Localizacion</th>
						<th>Fecha Pedido</th>						
                        <th>Estado</th>						
						<th>Precio Total</th>
						<th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tbodyprincipal">

@foreach($data['pedidos'] as $pedido)
<tr>
                        <td>{{$pedido->id}}</td>
                        <td><a href="#"><img src="/uploads/avatars/{{$pedido->avatar}}" 
                        class=" imagenpregunta  avatar" alt="Avatar">
                        {{$pedido->name}}{{$pedido->first_name}}</a></td>

						<td>{{$pedido->location}}</td>
                        <td>{{$pedido->date_order}}</td>       



@if($pedido->status=="Order Processed")


<td class="negrostatus">
                            <span class="status text-success"> </span>
                            
							{{$pedido->status}}
                            
                            </td>

@elseif($pedido->status=="Order Shipped")


<td class="amarillostatus">
                            <span class="status text-success"> </span>
                            
							{{$pedido->status}}
                            
                            </td>


							@elseif($pedido->status=="Order En Route")


<td class="naranjastatus">
                            <span class="status text-success"> </span>
                            
							{{$pedido->status}}
                            
                            </td>



							@elseif($pedido->status=="Order Arrived")


<td class="verdestatus">
                            <span class="status text-success"> </span>
                            
							{{$pedido->status}}
                            
                            </td>

@endif






						<td>{{$pedido->total_price}} euros</td>
						<td>
                            
			
                        <a href="#" id="{{$pedido->identificadororder}}" value="avanzar" class="view" title="View Details" data-toggle="tooltip">
                            <i class="  fa fa-arrow-right  material-icons"> </i>
                    </a>

			



                </td>
                    </tr>
@endforeach

                </tbody>
            </table>

			<div class="clearfix">
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active "><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">6</a></li>
					<li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>   

    <script src="/js/jquery.table2excel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminpedidos.js"></script>
  
    @endsection