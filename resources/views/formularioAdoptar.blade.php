@extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">    <div>
        <div id="todoContenido" class="container-fluid">
            <h1>Formulario De Adopción</h1>
            <hr>
            <form id="contactForm" action="javascript:void(0);" method="get"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control" type="hidden"
                    name="to" value="email@awebsite.com">
                <div class="form-row">
                    <div class="col-md-6">
                        <div id="successfail"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-6" id="message">
                        <h2 class="h4"><i class="fa fa-envelope"></i> Contáctanos<small><small class="required-input">&nbsp;(*Requerido)</small></small>
                        </h2>
                        <div class="form-group"><label for="from-name">Nombre</label><span class="required-input">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" id="from-name" name="name" required="" value="{{Auth::user()->name}}"></div>
                        </div>
                        <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" id="from-email" name="email" required="" value="{{Auth::user()->email}}"placeholder="Dirección Email"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                <div class="form-group"><label for="from-phone">Teléfono</label><span class="required-input">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" id="from-phone" name="phone" required="" value="{{Auth::user()->telephone_number}}" placeholder="Numero De Teléfono "></div>
                                </div>
                            </div>
                        <input type="hidden" id="hidden" value="{{$animales[0]->id}}">
                        </div>
                        <div class="form-group"><label for="from-comments">Porque quieres adoptar a <b> {{$animales[0]->nickname}} </b></label><textarea class="form-control" id="from-comments" name="comments" placeholder="Porque es super bonito y guapo" rows="5"></textarea></div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col"><button class="btn btn-primary btn-block" type="reset"><i class="fa fa-undo"></i> Resetear</button></div>
                                <div class="col"><button class="btn btn-primary btn-block" id="buttonSubmit" type="submit">Enviar Petición <i class="fa fa-chevron-circle-right"></i></button></div>
                            </div>
                        </div>

                        <hr class="d-flex d-md-none">
                    </div>
                    <div class="col-12 col-md-6">
                        <h2 class="h4"><i class="fa fa-paw"></i>  Gracias por adoptar a <b> {{$animales[0]->nickname}} </b></h2>
                        <div class="form-row">
                            <div class="col-12">
                                <div id="map" class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292"
                                        target="_blank"> <img class=" imagenformulario "  src="{{$animales[0]->url}}"></a></div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4">Nuestra Información<i class="fa fa-user"></i> </h2>
                                <div><span><strong></strong></span></div>
                                <div><span>tummysrefugio@gmail.com</span></div>
                                <div><span>www.tummys.com</span></div>
                                <hr class="d-sm-none d-md-block d-lg-none">
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="fa fa-paw"></i>Nuestra Dirección</h2>
                                <div><span>Polígono Industrail Fuente del Jarro</span></div>
                                <div><span>Calle Cdad. de Elda, 2 , 46988 Paterna, Valencia</span></div>
                                <hr class="d-sm-none">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Información Contacto</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <form id="contactForm" action="javascript:void(0);" method="get"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control"
                                type="hidden" name="to" value="email@awebsite.com">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div id="successfail"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6" id="message">
                                    <h2 class="h4"><i class="fa fa-envelope"></i> Contactanos <small><small class="required-input">&nbsp;(*Requerido)</small></small>
                                    </h2>
                                    <div class="form-group"><label for="from-name">Nombre</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" id="from-name" name="name" required="" placeholder="Full Name"></div>
                                    </div>
                                    <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" id="from-email" name="email" required="" placeholder="Dirección Email"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group"><label for="from-phone">Telélefono</label><span class="required-input">*</span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" id="from-phone" name="phone" required="" placeholder="Primary Phone"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group"><label for="from-calltime">Mejor Momento Para Llamar</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-control" id="from-calltime" name="call time"><optgroup label="Best Time to Call"><option value="Morning" selected="">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></optgroup></select></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="from-comments">Comments</label><textarea class="form-control" id="from-comments" name="comments" placeholder="Enter Comments" rows="5"></textarea></div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col"><button class="btn btn-primary btn-block" type="reset"><i class="fa fa-undo"></i> Resetear</button></div>
                                            <div class="col"><button class="btn btn-primary btn-block"  type="submit">Enviar Petición <i class="fa fa-chevron-circle-right"></i></button></div>
                                        </div>
                                    </div>
                                    <hr class="d-flex d-md-none">
                                </div>
                                <div class="col-12 col-md-6">
                                    <h2 class="h4"><i class="fa fa-location-arrow"></i> Gracias por adoptar a {{$animales[0]->nickname}}</h2>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292"
                                                    target="_blank"> <img class="img-fluid" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=2&amp;size=600x210&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C582+1801+W+International+Speedway+Blvd+Daytona+Beach+FL+32114&amp;zoom=12" alt="Google Map of Daytona International Speedway"></a></div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                            <div><span><strong>Name</strong></span></div>
                                            <div><span>email@awebsite.com</span></div>
                                            <div><span>www.awebsite.com</span></div>
                                            <hr class="d-sm-none d-md-block d-lg-none">
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                            <div><span><strong>Office Name</strong></span></div>
                                            <div><span>55 Icannot Dr</span></div>
                                            <div><span>Daytone Beach, FL 85150</span></div>
                                            <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">O:</abbr> </div>
                                            <hr class="d-sm-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/formularioAdoptar.js"></script>
    @endsection
