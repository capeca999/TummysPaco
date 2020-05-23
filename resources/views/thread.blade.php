  
  @extends('layouts.master')
@section('titulo')
   - Animales
@endsection

@section('contenido')
<div id="diventero">
<meta name="csrf-token" content="{{ csrf_token() }}" />




<div class=" borderpregunta container-fluid mt-100">
     <div class="row">
    @foreach($data['pregunta'] as $preguntas)

    <input type="hidden" id="hiddenquestion"  value="{{$preguntas->question_id}}" readonly="readonly">

         <div class="col-md-12">
             <div class="card mb-4">
             <div class="text-black big middlepregunta"> {{$preguntas->title}} </div>

                 <div class="card-header">
             
                     <div class="media flex-wrap w-100 align-items-center">
                      <img src="/uploads/avatars/{{$preguntas->avatar}}" class=" imagenpregunta d-block ui-w-40 rounded-circle" alt="">
                         <div class="media-body ml-3"> <img src="{{$preguntas->icon}}" title="{{$preguntas->description}}" class="badgeiconusuario" alt="{{$preguntas->description}}">
                         
                         
                         <a href="javascript:void(0)" data-abc="true">{{$preguntas->first_name}} </a>
                         
                             <div class="text-muted small">{{$preguntas->date}}</div>
                   
                         </div>


                         <div class="text-muted small ml-3">
                             <div>Fecha Respuesta: <strong>{{$preguntas->created_at}}</strong></div>
                         </div>
                     </div>
                 </div>


                 <div class="card-body">
                     <p> {{$preguntas->question_description}}
                     </p>

                 </div>
                 <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                     <div class="px-4 pt-3"> 
                     @if($preguntas->liked==true)
                     <a  href="javascript:void(0)" class=" likes text-muted d-inline-flex align-items-center align-middle heart" data-abc="true"> 

                     @else
                     <a  href="javascript:void(0)" class=" likes text-muted d-inline-flex align-items-center align-middle " data-abc="true"> 

    @endif     
                     <i class="fa fa-heart " aria-hidden="true">
                     </i>
    </a>    
                     &nbsp;                     
                     <span class="align-middle likesnumero"> {{$preguntas->likes}}  </span>
                     
                     <span class="text-muted d-inline-flex align-items-center align-middle ml-4">
                          <i class="fa fa-eye text-muted fsize-3"></i>
                          &nbsp; <span class="align-middle">{{$preguntas->views}}</span> </span> </div>
                     <div class="px-4 pt-3"> <button type="button" id="replybutton" class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Responder Pregunta</button> </div>
                 </div>

              

             </div>
         </div>
        @endforeach
</div>
        </div>

        @foreach($data['hilo'] as $hilos)





<div class="col-md-12" >
    <div class="card mb-4">
    <div class="text-black big middlerespuesta"> {{$hilos->title}} </div>

        <div class="card-header">
            <div class="media flex-wrap w-100 align-items-center"> <img src="/uploads/avatars/{{$preguntas->avatar}}" class=" imagenpregunta d-block ui-w-40 rounded-circle" alt="">
                <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{{$hilos->first_name}}</a>
                <img src="{{$hilos->icon}}" title="{{$hilos->description}}" class="badgeiconusuario" alt="{{$hilos->description}}">
                    <div class="text-muted small">{{$hilos->fecha}}</div>
                </div>
                <div class="text-muted small ml-3">
                    <div>Fecha Respuesta: <strong>{{$hilos->created_at}}</strong></div>
                </div>
            </div>
        </div>


        <div class="card-body">
            <p> {{$hilos->answer_description}}
            </p>

        </div>
        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
            <div class="px-4 pt-3">
                

            @if($hilos->liked==false)
            <a href="javascript:void(0)"  id="{{$hilos->answer_id}}" class="likes  answerquestion text-muted d-inline-flex align-items-center align-middle " data-abc="true">
            @else

            <a href="javascript:void(0)"  id="{{$hilos->answer_id}}" class="likes  answerquestion text-muted d-inline-flex align-items-center align-middle heart" data-abc="true">


@endif


       
            
                 <i class="fa fa-heart" aria-hidden="true"></i>
                 </a>
                 &nbsp; 
                 <span class="align-middle ">  {{$hilos->likes}}  </span>
                
              
                      
        </div>

     

    </div>
</div>
@endforeach



     </div>
 </div>

    <script src="/js/preguntas.js"></script>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    @endsection
