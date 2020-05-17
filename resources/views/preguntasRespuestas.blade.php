  
  @extends('layouts.master')
@section('titulo')
   - Animales
@endsection
@section('contenido')
  













  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <div class="input-group"><span class="input-group-addon"> <i class="fa fa-search"></i></span><input class="form-control" type="search" name="search"></div>
                    </div>
                </form>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab"  id="today">Today <span class="badge badge-pill badge-primary">42</span></a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"  id="lastest" >Lastest <span class="badge badge-pill badge-primary">42</span></a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"  id="popular" >Popular <span class="badge badge-pill badge-primary">42</span></a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"  id="all" >All <span class="badge badge-pill badge-primary">42</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                            <div class="thread-list-head">
                                <nav class="thread-pages">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                            <ul class="thread-list">
            
                            @foreach ((array)$preguntas   as  $pregunta)
                        
                            <li class="thread"><span class="time">{{ $pregunta['date'] }}</span><span class="title">{{ $pregunta['title'] }} </span><span class="icon"> <a class="subscribe" href="javascript:void(0)"><i class="fa fa-star-o"></i></a><a class="flag" href="javascript:void(0)"><i class="fa fa-flag"></i></a></span></li>
                        
                              @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab-2"></div>
                        <div class="tab-pane" role="tabpanel" id="tab-3"></div>
                        <div class="tab-pane" role="tabpanel" id="tab-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/preguntas.js"></script>
    @endsection
