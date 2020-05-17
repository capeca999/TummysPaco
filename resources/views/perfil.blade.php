

@extends('layouts.master')
@section('titulo')
- Perfil
@endsection
@section('contenido')


<div class="container emp-profile">
<form id="formimagen" enctype="multipart/form-data" action="/usuario/perfil" method="POST">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <img src="/uploads/avatars/{{Auth::user()->avatar}}" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
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
                                    <img  id="badgeiconusuario "src="{{$data['awardseleccionado']->icon}}" class="badgeiconusuario">
                                    </h5>
                                    <h6>
                                       Usuario De Tummys!
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
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
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
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
                                            <p>Introduce tu Provincia</p>

                                            @else
                                            <p>{{Auth::user()->location}}</p>
                                                @endif
                                            </div>
                                        </div>

          
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
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





        
        <script src="/js/perfil-usuario.js"></script>

       
        @endsection