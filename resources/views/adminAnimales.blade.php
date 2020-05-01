
@extends('layouts.master')

@section('titulo')
    - Admin Animales
@endsection
@section('contenido')      
    <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
     
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">ID.</th>
                        <th id="trs-hd" class="col-lg-1">Race</th>
                        <th id="trs-hd" class="col-lg-1">Species</th>
                        <th id="trs-hd" class="col-lg-1">Gender</th>
                        <th id="trs-hd" class="col-lg-1">Date_of_birth</th>
                        <th id="trs-hd" class="col-lg-1">Description</th>
                        <th id="trs-hd" class="col-lg-1">Health</th>
                        <th id="trs-hd" class="col-lg-1">Nickname</th>
                        <th id="trs-hd" class="col-lg-1">Place found</th>
                        <th id="trs-hd" class="col-lg-1">Size</th>
                        <th id="trs-hd" class="col-lg-1">Date Found</th>
                        <th id="trs-hd" class="col-lg-1">Condition</th>
                        <th id="trs-hd" class="col-lg-1"></th>
                    </tr>
                </thead>
           
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
          
                    <div id="animalesAdmin">
                    </div>
                    @foreach($animales as $animal)
                    <tr>
                 

                        <td>{{$animal->id}}</td>
                        <td>{{$animal->race}}</td>
                        <td>{{$animal->species}}</td>
                        <td>{{$animal->gender}}</td>
                        <td>{{$animal->date_of_birth}}</td>
                        <td>{{$animal->description}}</td>
                        <td>{{$animal->health}}</td>
                        <td>{{$animal->nickname}}</td>
                        <td>{{$animal->place_found}}</td>
                        <td>{{$animal->size}}</td>
                        <td>{{$animal->date_found}}</td>
                        <td>{{$animal->condition}}</td>
                        <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                </tbody>
            </table>
        
        </div>
    </div>
    <script src="/js/adminanimales.js"></script>

    @endsection