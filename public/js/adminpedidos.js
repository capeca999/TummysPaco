$(document).ready(function() {
    
    





    $(document).on('change','#cantidad',function(){




        $.ajax({
            type: 'GET',
             dataType: "json",
             url: '/api/pedidos/'+$(".active").find("a").text() + '/' + $( "#cantidad option:selected" ).text(),
         })
        
         .done(function(response){
            $("#tbodyprincipal").empty();


console.log(response);


for (let index = 0; index < response.length; index++) {
 var trprincipal = $( "<tr>" ).appendTo( $("#tbodyprincipal"));
var pedidotd =$("<td>" + response[index].id +"</td>").appendTo(trprincipal);
var avatartd =$("<td>").appendTo(trprincipal);
var hrefname =$("<a>" ).appendTo(avatartd);

var imgavatar =$("<img>").attr("src", "/uploads/avatars/"+response[index].avatar).attr("class", "imagenpregunta avatar").attr("alt", "Avatar").appendTo(hrefname);

$(hrefname).append(response[index].name + response[index].first_name);


var locationtd =$("<td>" +response[index].location+ "</td>").appendTo(trprincipal);
var dateorder =$("<td>" +response[index].date_order+ "</td>").appendTo(trprincipal);
var statustd =$("<td>" +response[index].status+ "</td>").appendTo(trprincipal);
var spanstatus =$("<span>" +"&SVGFEGaussianBlurElement;"+ "</span").attr("class", "status text-success").appendTo(statustd);
var preciototaltd =$("<td>" +response[index].total_price+ "</td>").appendTo(trprincipal);
var detalledtd =$("<td>").appendTo(trprincipal);
var ahrefdetalles =$("<a>").attr("href", "#").attr("class", "view").attr("data-toggle", "tooltip").appendTo(detalledtd);
var ahrefdetalles =$("<i>" +"&#xE5C8;"+ "</i>").attr("class", "material-icons").appendTo(ahrefdetalles);
}


         })
        .fail(function(response){ 
        
            console.log(response);
        
        });  






















   });








    
/*MODIFICAR PRODUCTO (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
$('button.btn-success ,button.btn-danger').click(function(event) {
var id=$(this).attr("value");
    var atributo = "Status";
    var valor= $(this).attr("name");
   animalId=$("#"+id).attr("name");
  var emailenviar = $(this).parent();
var idusuario= $(emailenviar).prev().prev().prev().prev().prev().prev().prev().text();
alert(idusuario);
    $.ajax({
        dataType:"json",
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/api/animalinfo/"+animalId,
        method: "GET",
        success:function(data) {
       
if(valor=="Accepted"){
    var mensaje="Felicidades " + $(emailenviar).prev().prev().prev().prev().prev().text()+ "! Tu solicitud de adopción de " + data[0].nickname + " Ha sido aceptada!, el siguiente paso es ir a nuestro refugio y cojer a tu mascota";


alert(idusuario);
alert(animalId);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/modificarAnimalAdoptar/"+idusuario+'/'+animalId,
        method: "GET",
    })                     .done(function(response){
        console.log(response);

        
        
        
                             })
                            
                            .fail(function(response){
                        console.log(response);
                                
                         
                            });


    
}
else{
    var mensaje="Lo sentimos " +$(emailenviar).prev().prev().prev().prev().prev().text() +  "Tu solicitud de adopción de " + data[0].nickname + " no ha sido aceptada, intentelo de nuevo o contactanos para mas información";
}

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },
    url: "/sendmail/"+mensaje+"/"+$(emailenviar).prev().prev().prev().prev().text(),
    method: "GET",
});


$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },
    url: "/eliminarPetition/"+$(emailenviar).prev().prev().prev().prev().prev().prev().prev().prev().text(),
    method: "GET",
});



            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
                },
                url: "/listar/modificarStatus/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            });
            },
            error : function(jqXHR,textStatus,errorThrown)    {  
              
            }
            





            
    });
  var parentBoton=$(this).parent();
$(parentBoton).prev().text(valor);

$(emailenviar).parent().remove();

if($("#top").length == 1) {

    $("#top").remove();
    }

    if($(this).attr("title")=="Cancelled"){
        var diverror = $("<div>Has " + $(this).attr("title")+" la petición</div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#divprincipal"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
    }
    else{

  
    diverror = $("<div>Has " + $(this).attr("title")+" la petición</div>" ).attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#divprincipal"));
     buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
     spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

}
            //var name = $(this).closest('tr').find('.contact_name').text();
});
});




