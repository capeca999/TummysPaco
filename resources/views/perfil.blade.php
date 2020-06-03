

@extends('layouts.master')
@section('titulo')
- Perfil
@endsection
@section('contenido')


<input type="hidden" id="hiddenvalue" value="{{Auth::user()->id}}">


<div class="container emp-profile">
<form id="formimagen" enctype="multipart/form-data" action="/usuario/perfil" method="POST">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <img src="/uploads/avatars/{{Auth::user()->avatar}}" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Cambiar Tu Avatar
                                <input  id="fotousuario" type="file" name="avatar" value=""/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="col-md-6">
             
                        <div class="profile-head">
                                    <h5 class="editarPerfil">
                                    {{Auth::user()->name}} {{Auth::user()->first_name}} {{Auth::user()->last_name}} 

@if( $data['awardseleccionado']=="new")

<img name="badgeiconusuario" src="/img/medallas/new.png" class="badgeiconusuario">
@else 
<img name="badgeiconusuario" src="{{$data['awardseleccionado']->icon}}" class="badgeiconusuario">
@endif

                                    </h5>
                                    <h6>
                                       Usuario De Tummys!
                                    </h6>
                                    <p class="proile-rating"> &nbsp</p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Insignias</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre</label>
                                            </div>
                                            <div id="name" name="Nombre" class="col-md-6 editarcampo">
                                                <p>{{Auth::user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Primer Nombre</label>
                                            </div>
                                            <div id="first_name"  name="Primer Apellido" class="col-md-6 editarcampo">
                                                <p>{{Auth::user()->first_name}}</p>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Segundo Nombre</label>
                                            </div>
                                            <div id="last_name" name="Segundo Apellido" class="col-md-6 editarcampo">
                                                <p>{{Auth::user()->last_name}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div id="email" name="Correo" class="col-md-6 editarcampo">
                                                <p>{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Teléfono</label>
                                            </div>
                                            <div  id="telephone_number" name="Numero De Teléfono" class="col-md-6 editarcampo">



                                            @if( Auth::user()->telephone_number=="")
                                            <p>Introduce tu número</p>

                                            @else
                                            <p>{{Auth::user()->telephone_number}}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fecha De Nacimiento</label>
                                            </div>
                                            <div  id="date_birth"  name="Fecha De Nacimiento" class="col-md-6 editarcampo" >



                                            @if( Auth::user()->date_birth=="0000-00-00")
                                            <p>Introduce tu fecha</p>

                                            @else
                                            <p>{{Auth::user()->date_birth}}</p>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>DNI</label>
                                            </div>
                                            <div id="nif"  name="DNI" class="col-md-6 editarcampo">



                                            <p>{{Auth::user()->nif}}</p>
                                           
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Provincia</label>
                                            </div>
                                            <div  id="province"  name="Provincia" class="col-md-6 editarcampo">



                                            @if( Auth::user()->province=="")
                                            <p>Introduce tu Provincia</p>

                                            @else
                                            <p>{{Auth::user()->province}}</p>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Localización</label>
                                            </div>
                                            <div id="location" name="Localización" class="col-md-6 editarcampo">



                                            @if( Auth::user()->location=="")
                                            <p>Introduce tu Localización</p>

                                            @else
                                            <p>{{Auth::user()->location}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado tu contraseña?') }}
                                    </a>
                                @endif
          
                            </div>
                        





                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">


@foreach($data['award'] as $awards)



<div class="container">
	<div class="row">
        <div class="span12">
    
                  <div class="thumbnail clearfix">
                  @if($awards->selected=="true")
                    <img src="{{$awards->icon}}" id="badgeimg" alt="{{$awards->name}}" class="pull-left span2 clearfix selectedbadge" style='margin-right:10px'>
                    <div class="caption" class="pull-left">
                      <a  class="btn btn-primary iconperfil  pull-right selectbadge selectedbadge" id="{{$awards->id}}">  Select </a>
                   @else
                   <img src="{{$awards->icon}}" id="badgeimg" alt="{{$awards->name}}" class="pull-left span2 clearfix unselected" style='margin-right:10px' >
                   <div class="caption" class="pull-left">
                      <a  class="btn btn-primary iconperfil  pull-right unselected selectbadge" id="{{$awards->id}}">  Select </a>
@endif
                      <h4>      
                      <a href="#" >{{$awards->name}}</a>
                      </h4>
                      <small><b>Descripción: </b>{{$awards->description}}</small>  
                    </div>
                  </div>
                </li>
                <br>
@endforeach
        </div>
	</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>
</div>
</div>
</div>
</div>



</div>


<div  id="historialpedidoslista" class="centrartabla">

<button class="btn btn-primary"  id="botonhistorial" data-toggle="modal" data-target="#modal1" type="button"> Historial Pedidos</button>
</div>

<div id="historialpedidos">


</div>


</div>
        
</div></div>
        <script src="/js/perfil-usuario.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
       
        @endsection