  
  @extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="container-fluid mt-100">




        <h2 class="text-center">Creación de Pregunta</h2>
        <div class="form-group"><label for="text-input">Titulo</label><input class="form-control" type="text" id="titulo" name="text-input"></div>

        <div class="form-group"><label for="textarea-input">Descripción </label><textarea class="form-control" id="descripcion" name="textarea"></textarea></div>
        <div class="form-group"><button  id="submit" class="btn btn-primary" >Button</button></div>
 







    <div class="d-flex flex-wrap justify-content-between">

  

        <div> <button type="button" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> New thread </button> </div>
        <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div>
    </div>
    <div class="card mb-3">
        <div class="card-header pl-0 pr-0">
            <div class="row no-gutters w-100 align-items-center">
                <div class="col ml-3">Topics</div>
                <div class="col-4 text-muted">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">Replies</div>
                        <div class="col-8">Last update</div>
                    </div>
                </div>
            </div>
        </div>
     
       
        @foreach ((array)$preguntas   as  $pregunta)
     
        <hr class="m-0">
        <div class="card-body py-3">
            <div class="row no-gutters align-items-center">
                <div class="col"> <a href="/forum/thread/{{$pregunta['question_id']}}" class="text-big" data-abc="true">{{ $pregunta['title'] }}</a> <span class="badge badge-success align-text-bottom ml-1">Solved</span>
                    <div class="text-muted small mt-1">{{ $pregunta['date'] }} &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true"> {{$pregunta['first_name']}} {{$pregunta['last_name']}}</a></div>
                </div>
                <div class="d-none d-md-block col-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">43</div>
                        <div class="media col-8 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                            <div class="media-body flex-truncate ml-2">
                                <div class="line-height-1 text-truncate">1 day ago</div> <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by Steve smith</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <nav>
        <ul class="pagination mb-5">
            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
        </ul>
    </nav>
</div>

    <script src="/js/preguntas.js"></script>
    @endsection
