
@extends('layouts.master')

@section('titulo')
    - Admin Usuarios
@endsection
@section('contenido')      
    <div id="diventero" class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
     
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID</th>
                        <th id="trs-hd" class="col-lg-1">Nif</th>
                        <th id="trs-hd" class="col-lg-1">Role</th>
                        <th id="trs-hd" class="col-lg-1">Name</th>
                        <th id="trs-hd" class="col-lg-1">First_Name</th>
                        <th id="trs-hd" class="col-lg-1">Last_Name</th>
                        <th id="trs-hd" class="col-lg-2">Image</th>
                        <th id="trs-hd" class="col-lg-1">Date_Birth</th>
                        <th id="trs-hd" class="col-lg-1">Email</th>
                        <th id="trs-hd" class="col-lg-1">Province</th>
                        <th id="trs-hd" class="col-lg-1">Location</th>
                        <th id="trs-hd" class="col-lg-1">Telephone_Number</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody id="usuariosAdmin">
                
                    <tr class="warning no-result">
                        <td id="noresult" colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
          
      
              
                    @foreach($usuarios as $usuario)
                    <tr id ="{{$usuario->id}}">
                 

                        <td name="id">{{$usuario->id}}</td>
                        <td name="nif">{{$usuario->nif}}</td>
                        <td name="role">{{$usuario->role}}</td>
                        <td name="name">{{$usuario->name}}</td>
                        <td name="first_name">{{$usuario->first_name}}</td>
                        <td name="last_name">{{$usuario->last_name}}</td>
                        <td name="image">                      
@if($usuario->avatar=="")
<img src="/uploads/avatars/avatar.png" class="iconoUsuariosAdmin">
@else
<img src="/uploads/avatars/{{$usuario->avatar}}" class="iconoUsuariosAdmin">
@endif
                    </td>
                        <td name="date_birth">{{$usuario->date_birth}}</td>
                        <td name="email">{{$usuario->email}}</td>
                        <td name="province">{{$usuario->province}}</td>
                        <td name="location">{{$usuario->location}}</td>
                        <td name="telephone_number">{{$usuario->telephone_number}}</td>

                        <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminusuarios.js"></script>

    @endsection