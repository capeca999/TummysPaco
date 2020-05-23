  
  @extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')
<div id="diventero">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid mt-100">







    <div class="d-flex flex-wrap justify-content-between">

  

        <div> <button type="button" id="newthread" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> Nueva Pregunta </button> </div>
    </div>
    <div class="card mb-3">
        <div class="card-header pl-0 pr-0">
            <div class="row no-gutters w-100 align-items-center">
                <div class="col ml-3">Preguntas</div>
                <div class="col-4 text-muted">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">Respuestas</div>
                        <div class="col-8">Autor</div>
                    </div>
                </div>
            </div>
        </div>
     
       <div id="preguntastodas">
        @foreach (  $data['preguntas'] as $pregunta)
  
        <hr class="m-0">
        <div class="card-body py-3">
            <div class="row no-gutters align-items-center">
                <div class="col">
                 <a href="/forum/thread/{{$pregunta->question_id}}" class="text-big" data-abc="true">{{ $pregunta->title }}</a>    

                  
                    <div class="text-muted small mt-1">
                    <a href="javascript:void(0)" class="text-muted" data-abc="true"></a>
                    </div>
                </div>
                <div class="d-none d-md-block col-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4"> {{$pregunta ->respuestas}}  </div>
                        <div class="media col-8 align-items-center">                                                       
                         <img src="/uploads/avatars/{{ $pregunta->avatar}}" alt="" class="imagenpregunta d-block ui-w-30 rounded-circle">
                         <img src="{{$pregunta->icon}}" class="badgeiconusuario">

                            <div class="media-body flex-truncate ml-2">                          
                                <div class="line-height-1 text-truncate"> Hace {{$pregunta->fechadiferencia}} Días</div>                           
                                 <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true"> {{ $pregunta->date }} {{$pregunta->first_name}} {{$pregunta->last_name}}</a>
                                
                            </div>
                        </div>
                </div>             
               </div>
            </div>
        </div>
        @endforeach

         
{{$data['cantidad']/5,0}}
</div>
    </div>
    <nav>
        <ul class="pagination mb-5">
            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
            

            @for ($i = 2; $i <= round($data['cantidad']/5,0); $i++)
            <li class="page-item "><a class="page-link" href="javascript:void(0)" data-abc="true"> {{$i}}  </a></li>

@if($i==round($data['cantidad']/5,0))

@if(is_float($data['cantidad']/5)==true)
<li class="page-item "><a class="page-link" href="javascript:void(0)" data-abc="true"> {{$i+1}}  </a></li>

@endif
@endif

    @endfor
            <li class="page-item disabled "><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
        </ul>
    </nav>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/preguntas.js"></script>
    @endsection
