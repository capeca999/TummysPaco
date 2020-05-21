$(document).ready(function() {

    var valor="";
    var cantidad = $("<td>").length
var valorinput="";
    $(".search").keyup(function() {
        var t = $(".search").val(),
            e = ($(".results tbody").children("tr"), t.replace(/ /g, "'):containsi('"));
        $.extend($.expr[":"], {
            containsi: function(t, e, n, r) {
                return (t.textContent || t.innerText || "").toLowerCase().indexOf((n[3] || "").toLowerCase()) >= 0
            }
        }), $(".results tbody tr").not(":containsi('" + e + "')").each(function(t) {
            $(this).attr("visible", "false")
        }), $(".results tbody tr:containsi('" + e + "')").each(function(t) {
            $(this).attr("visible", "true")
        });
        var n = $('.results tbody tr[visible="true"]').length;
        $(".counter").text(n + " item"), "0" == n ? $(".no-result").show() : $(".no-result").hide()
    })



    function añadiralert(atributo){


        if($("#top").length == 1) {

            $("#top").remove();
            }
        
        
                var diverror = $("<div> Has cometido un error en el campo " + atributo + " </div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
                var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


    }



   /*MODIFICAR PRODUCTO (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
   $(document).on( "dblclick", "td", function() {
    var atributo=$(this).attr('name');
    var contenido=$(this).html();

    if($(this).attr('id') != 'noresult' && $(this).attr('name') != "id"){

        if($(this).text() != ''){
             contenido=$(this).html();
            $(this).html('');

if($(this).attr('name')=="description"){
    var input =$('<textarea>');
    input.attr('value',contenido);

}
else{
    var input =$('<input>');
    input.attr('value',contenido);
    input.attr('type','text');


}


            input.attr('id','dato-anyadir');
            input.attr('placeholder',contenido);
            $(this).append(input);
            input.select();
         
        }

    }

    });


  

   /*Añadir Animal (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
   $(document).on( "click", "#botonAñadir", function() {

if(  $("#productosañadirtr").length==1 ){

    if($("#top").length == 1) {

        $("#top").remove();
        }
    
    
            var diverror = $("<div>" + "Ya has pulsado el boton"  + "</div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

}
else{
var animaltr=$("<tr>").attr("id", "productosañadirtr").insertBefore($("#productosAdmin"));
var animalidtd =$("<td>").attr("name", "id").appendTo(animaltr);
var animalracetd =$("<td>").attr("name", "stock").appendTo(animaltr);
var inputtext1 =$("<input>").attr("type", "text").attr("id", "stock").appendTo(animalracetd);
var speciestd =$("<td>").attr("name", "price").appendTo(animaltr);
var inputtext2 =$("<input>").attr("type", "number").attr("id", "price").appendTo(speciestd);
var gendertd =$("<td>").attr("name", "name").appendTo(animaltr);
var inputselect1 =$("<input>").attr("id", "name").attr("type", "text").appendTo(gendertd);
var descriptiontd =$("<td>").attr("name", "description").appendTo(animaltr);
var inputtext4 =$("<textarea>").attr("rows", "4").attr("cols", "50").attr("id", "description").appendTo(descriptiontd);
var imagentd =$("<td>").attr("name", "imagen").appendTo(animaltr);
var inputfile =$("<input>").attr("type", "file").attr("id", "fileInput").appendTo(imagentd);





  $("#fileInput").on("change paste keyup", function() {
valor=$(this).val();
valor = this.value.replace(/^.*\\/, "");
valorinput = "/img/products/"+valor;

 
 });

var botoned =$("<td>").appendTo(animaltr);
var botonsuccess=$("<button>").attr("id", "anyadirProducto").attr("class", "btn btn-success").attr("style", "margin-left: 5px;").attr("type", "submit").appendTo(botoned);
var icheck =$("<i>").attr("class", " fa fa-check").attr("style", "font-size: 15px;").appendTo(botonsuccess);
var botonserror=$("<button>").attr("id", "borrartr").attr("class", "btn btn-danger").attr("style", "margin-left: 5px;").attr("type", "submit").appendTo(botoned);
var icheck =$("<i>").attr("class", "fa fa-trash").attr("style", "font-size: 15px;").appendTo(botonserror);

}



    });

$(document).on("click", "#borrartr", function(){

    $("#productosañadirtr").empty();
    $("#productosañadirtr").remove();

});





    $(document).on( "click", "#anyadirProducto", function() {
       



expresionRegular = new RegExp("^[0-9]+$");
res = expresionRegular.test($("#price").val());
if(res==false){
    añadiralert("Price");
}
else{


    expresionRegular = new RegExp("^[0-9]+$");
    res = expresionRegular.test($("#stock").val());

    if(res==false){
        añadiralert("Stock");
    }

    else{
     
        expresionRegular = new RegExp("^[A-Za-z ]+$");
        res = expresionRegular.test($("#name").val());
    
        if(res==false){
            añadiralert("Name");
        }
    

else{
    expresionRegular = new RegExp("^[A-Za-z ]+$");
    res = expresionRegular.test($("#description").val());

    if(res==false){
        añadiralert("Descripcion");
    }



else{




if(valorinput==""){

    añadiralert("Imagen");

}

else{

                    $.ajax({
                        type: 'post',
                         dataType: "json",
                         url: '/api/crearProducto/',
                     
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                         data:{"_token": $('#token').val(), 
                         stock:$("#stock").val(),
                         price:$("#price").val(),
                         name:$("#name").val(),
                          description:$("#description").val(), valorinput: valorinput},
                     })
                    
                     .done(function(response){
console.log(response);
$("#productosañadirtr").empty();
$("#productosañadirtr").remove();



                     })
                    
                    .fail(function(response){
                console.log(response);
                        
                    if($("#top").length == 1) {
                
                        $("#top").remove();
                        }
                        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
                        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);               
                    });
                }
                }

}}

                }

    });

    










/*MODIFICAR PRODUCTO (Modificar datos) - Al perder el foco del input creado anteriormente, según que contenga se guardara a la BBDD o no*/
$(document).on('blur','#dato-anyadir',function(){

    var atributo=$(this).parent().attr('name');
    var id=$(this).parent().parent().attr('id');
    var valor= $(this).val();
    if($(this).val() == ''){
        $(this).parent().html($(this).attr('placeholder'));
    }else{
        if(comprobacionModificacion(atributo,valor)){
        
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
                },
                url: "/listar/modificarProducto/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            })



      
            .done(function(response){
                console.log(response);
     
                
                
                
                                     })
                                    
                                    .fail(function(response){
                                console.log(response);
                                
                                    });



            
            $(this).parent().html(valor);
        }
      
        else{
            $(this).parent().html($(this).attr('placeholder'));
        }


       
    }





//^[0-9]+$

});
function comprobacionModificacion(atributo, valor) {

    var expresionRegular = ""
    var res = false;
    
    switch (atributo) {
        case "stock":
            expresionRegular = new RegExp("^[0-9]+$");
            res = expresionRegular.test(valor);
            break;
    
        case "price":
            expresionRegular = new RegExp("^[0-9]+$");
            res = expresionRegular.test(valor);
            break;
    

    
        case "name":
            
            expresionRegular = new RegExp("^[A-Za-z ]+$");
            res = expresionRegular.test(valor);
            break;


            case "image":
            
          res=true;
                break;

    
        case "description":
            expresionRegular = new RegExp("^[A-Za-z ]+$");
            res = expresionRegular.test(valor);
            break;
    
    
    
    
        default:
            res = false;
    }

 
    return res;
}

});




