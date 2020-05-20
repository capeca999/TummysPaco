$(document).ready(function() {



$("#area-chart").attr("display", "none");

 
$("#graficapesos").click(function(){
var data;
if($("#grafica").length==0){
    $.ajax({
        type: "get",
        url:'/api/getPesos/'+$("#idanimal").val(),
        success:function(data) {
    
            if(data.length==0){

                if($("#top").length == 1) {

                    $("#top").remove();
                    }
                    var diverror = $("<div>No se ha creado aun estadisticas de peso </div>").attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                    var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                    var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror); 
            }
            else{
            
//No se ha creado aun estadisticas de peso
var divgrafica = $("<div>").attr("id", "grafica").attr("class", "container").appendTo("#todografica");
var divcard=$("<div>").attr("class", "card").appendTo(divgrafica);
var divcol12=$("<div>").appendTo(divcard);
var divchart=$("<div>").attr("id", "area-chart").appendTo(divcol12);
var divfluid=$("<div>").attr("class","container-fliud").appendTo(divgrafica);
var divwrapper=$("<div>").attr("class","wrapper row").appendTo(divfluid);
var preview=$("<div>").attr("class", "preview col-md-6").appendTo(divwrapper);
var tabcontent=$("<div>").attr("class", "preview-pic tab-content").appendTo(preview);
var section=$("<section>").attr("class", "container-fluid").appendTo(tabcontent);






window.areaChart = Morris.Area({
    element: 'area-chart',
    data: data,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['PesoKg'],
    lineColors: ['#1e88e5'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });

            }





            },
        error:function(data){
            if($("#top").length == 1) {

                $("#top").remove();
                }
                var diverror = $("<div>Has realizado la petición con anterioridad</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);



            console.log(data); //===Show Error Message====
        }
    });

}

  
else{
    $("#todografica").empty();
}

  







});






$("#tablavacunas").click(function(){

    if($("#containervacunas").length==0){
      
        $.ajax({
            type: "get",
            url:'/api/getvacunas/'+$("#idanimal").val(),
            success:function(data) {
 
     
                if(data.length==0){
    
                    if($("#top").length == 1) {
    
                        $("#top").remove();
                        }
                        var diverror = $("<div>No se ha creado aun estadisticas de vacunas </div>").attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror); 
                }
                else{
                



var divgrafica = $("<div>").attr("id", "vacunas").attr("class", "container").appendTo("#tablavacunaslista");
var divcard=$("<div>").attr("class", "card").appendTo(divgrafica);
var divcol12=$("<div>").appendTo(divcard);
var divchart=$("<div>").attr("id", "area-chart").appendTo(divcol12);
var divfluid=$("<div>").attr("class"," centrartabla container-fliud").appendTo(divgrafica);
var divwrapper=$("<div>").attr("class"," centrartabla wrapper row").appendTo(divfluid);
var preview=$("<div>").attr("class", " centrartabla preview col-md-6").appendTo(divwrapper);
var tabcontent=$("<div>").attr("class", " centrartabla preview-pic tab-content").appendTo(preview);
var section=$("<section>").attr("class", " centrartabla container-fluid").appendTo(tabcontent);



var divcontainervacunas= $("<div>").attr("class", "centrartabla").attr("id", "containervacunas").appendTo(divcol12);
var divrow1 =$("<div>").attr("class", " centrartablarow").appendTo(divcontainervacunas);
var divcolmd12=$("<div>").attr("class", " centrartabla col-md-12").appendTo(divrow1);
var divnomore=$("<div>").attr("id", " no-more-tables").appendTo(divrow1);
var tabla=$("<table>").attr("class", " centrartabla col-md-12 table-bordered table-striped table-condensed cf").appendTo(divnomore);
var thead = $("<thead>").attr("class", " centrartabla cf").appendTo(tabla);
var tr1=$("<tr>").appendTo(thead);
var th1=$("<th>Nombre Vacuna</th>").appendTo(tr1);
var th2=$("<th>Fecha Vacunación</th>").appendTo(tr1);
var tbody2=$("<tbody>").appendTo(tabla);







for (let index = 0; index < data.length; index++) {

    let tr2=$("<tr>").appendTo(tbody2);
    let td=$("<td>"+data[index].name+"</td>").attr("data-title","Nombre Vacuna").appendTo(tr2);
    let td2=$("<td>"+data[index].date+"</td>").attr("data-title","Fecha Vacunación").appendTo(tr2);

}




    
    
    
  
                }
    
    
    
    
    
                },
            error:function(data){
                if($("#top").length == 1) {
    
                    $("#top").remove();
                    }
                    var diverror = $("<div>Has realizado la petición con anterioridad</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                    var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                    var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
    
    
    
                console.log(data); //===Show Error Message====
            }
        });
    
    }
    else{
        $("#tablavacunaslista").empty();
    }
    
      
    
    
    
    
    
    
    
    
    });
    





















    $("#adoptar").click(function() {
        var idanimal = $("#hiddenid").attr("value");
        $.ajax({
            type: "post",
            url:'/comprobarPeticion',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{"_token": $('#token').val(), idanimal:idanimal},
            success:function(data) {
                window.location.href = "/animales/formularioAdoptar/"+$("#adoptar").attr("name");
                },
            error:function(data){
                if($("#top").length == 1) {

                    $("#top").remove();
                    }
                    var diverror = $("<div>Has realizado la petición con anterioridad</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                    var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                    var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);



                console.log(data); //===Show Error Message====
            }
        });
    })


/*


    $petitions = DB::table('petitions')
    ->where('id_animal' ,'=', $_POST['idanimal'])
    ->where('id_user' ,'=',  Auth::user()->id)
    ->limit(1)
    ->get();

    $peticion = count($petitions);

    if($peticion>0){
        return response()->json(['success'=>'Has realizado la petición']);

    }




*/


});




