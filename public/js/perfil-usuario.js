$(function(){


//Route::post('/crearInsignia/', 'ApiController@postInsignia');





$("#botonhistorial").click(function(){


    if($("#listahistorial").length==0){

      
        $.ajax({
            type: "get",
            url:'/api/gethistorial/'+$("#hiddenvalue").val(),
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
                
for (let index3 = 0; index3 < data.length; index3++) {

    
if(data[index3].used==true){
}
else{
    



    var divprincipal = $("<div>").attr("id", "listahistorial").appendTo($("#historialpedidos"));
    var divcard2 = $("<div>").attr("class", "card2").appendTo(divprincipal);
    var divtitle2 = $("<div>"+"Estado del pedido" + "</div>").attr("class", "title2").appendTo(divcard2);
    var divinfo = $("<div>").attr("class", "info").appendTo(divcard2);
    
    
    var divrow = $("<div>").attr("class", "row").appendTo(divinfo);
    
    
    var divcol7 =$("<div>").attr("class", "col-7").appendTo(divrow);
    
    
    var spanfecha=$("<span> Fecha Pedido</span>").attr("id", "heading").appendTo(divcol7);
    
    var b2=$("<br>").appendTo(spanfecha);
    
    var detalles=$("<span>" + data[index3].date_order + "</span>").attr("id", "details").appendTo(divcol7);
    
    var divcol5=$("<div>").attr("class", "col-5 pull-right").appendTo(divrow);
    var spanheading=$("<span>Numero De Pedido</span>").attr("id", "heading").appendTo(divcol5);
    var b3=$("<br>").appendTo(spanheading);
    var detallesnumero=$("<span>"+data[index3].id_order+"</span>").attr("id", "details").appendTo(divcol5);
    
    
    var divpricing=$("<div>").attr("class", "pricing").appendTo(divcard2);
    
    var divrow2=$("<div>").attr("class", "row").appendTo(divpricing);
    var class9=$("<div>").attr("class", "col-9").appendTo(divrow2);
    var spanname=$("<span>"+data[index3].name+"</span>").attr("id", "name").appendTo(class9);
    
    var class3=$("<div>").attr("class", "col-3").appendTo(divrow2);
    
    var spanprice=$("<span>"+data[index3].price+'*'+data[index3].quantity+'='+data[index3].price*data[index3].quantity+"</span>").appendTo(class3);
    var indexmasuno=index3;
    indexmasuno=indexmasuno+1;
    
    while (data[index3].id_order==data[indexmasuno].id_order) {
        let divrow3=$("<div>").attr("class", "row").appendTo(divpricing);
    
    let clas9=$("<div>").attr("class", "col-9").appendTo(divrow3);
    
    
    let spaname=$("<span>"+data[indexmasuno].name+"</span>").attr("id", "name").appendTo(clas9);
    
    let clas3=$("<div>").attr("class", "col-3").appendTo(divrow3);
    let spanpricee=$("<span>"+data[indexmasuno].price+'*'+data[indexmasuno].quantity+'='+data[indexmasuno].price*data[indexmasuno].quantity+"</span>").appendTo(clas3);
    data[indexmasuno].used=true;
    data[indexmasuno].id_order=null;    



    }
    var divtotal=$("<div>").attr("class", "total").appendTo(divcard2);
    var divrow6 = $("<div>").attr("class", "row").appendTo(divtotal);
    var divrowtotal = $("<div>").attr("class", "col-9").appendTo(divrow6);
    var divrowtotal2 = $("<div>").attr("class", "col-3").appendTo(divrow6);
    var big=$("<big> Precio Total: "+data[index3].total_price+"€</big>").appendTo(divrowtotal2);
    var divtracking=$("<div>").attr("class", "tracking").appendTo(divcard2);
    var divtitle2=$("<div> Seguir Tu Pedido</div>").attr("class", "title2").appendTo(divtracking);
    
    var divtrack=$("<div>").attr("class", "progress-track").appendTo(divcard2);
    var ulbar=$("<ul>").attr("id", "progressbar2").appendTo(divtrack);
    
    
    if(data[index3].status=="Order Processed"){
        var liorderedprocessed=$("<li> Ordered Processed </li>").attr("id", "step1").attr("class", "step0 active").appendTo(ulbar);
        var lishipped =$("<li>Order Shipped</li>").attr("class", "step0 text-center").attr("id", "step2").appendTo(ulbar);
        var Enroute =$("<li>Order En Route</li>").attr("class", "step0 text-right").attr("id", "step2").appendTo(ulbar);
        var Arrived =$("<li>Delivered</li>").attr("class", "step0 text-right").attr("id", "step4").appendTo(ulbar);
    }
    
    
    
    
    else if(data[index3].status=="Order Shipped"){
        var liorderedprocessed=$("<li> Ordered Processed </li>").attr("id", "step1").attr("class", "step0 active").appendTo(ulbar);
        var lishipped =$("<li>Order Shipped</li>").attr("class", "step0 active text-center").attr("id", "step2").appendTo(ulbar);
        var Enroute =$("<li>Order En Route</li>").attr("class", "step0 text-right").attr("id", "step2").appendTo(ulbar);
        var Arrived =$("<li>Delivered</li>").attr("class", "step0 text-right").attr("id", "step4").appendTo(ulbar);
    }
    
    
    
    else if(data[index3].status=="Order En Route"){
        var liorderedprocessed=$("<li> Ordered Processed </li>").attr("id", "step1").attr("class", "step0 active").appendTo(ulbar);
        var lishipped =$("<li>Order Shipped</li>").attr("class", "step0 active text-center").attr("id", "step2").appendTo(ulbar);
        var Enroute =$("<li>Order En Route</li>").attr("class", "step0  active text-right").attr("id", "step2").appendTo(ulbar);
        var Arrived =$("<li>Delivered</li>").attr("class", "step0 text-right").attr("id", "step4").appendTo(ulbar);
    }
    
    else if(data[index3].status=="Order Arrived"){
        var liorderedprocessed=$("<li> Ordered Processed </li>").attr("id", "step1").attr("class", "step0 active").appendTo(ulbar);
        var lishipped =$("<li>Order Shipped</li>").attr("class", "step0 active text-center").attr("id", "step2").appendTo(ulbar);
        var Enroute =$("<li>Order En Route</li>").attr("class", "step0  active text-right").attr("id", "step2").appendTo(ulbar);
        var Arrived =$("<li>Delivered</li>").attr("class", "step0 active text-right").attr("id", "step4").appendTo(ulbar);
    }
    
    



}







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
        $("#historialpedidos").empty();
    }
    
    
    });
    












    $(document).on('change','#fotousuario' , function(){
        $('#formimagen').submit();
       }
    );



    //HISTORIAL crear el a apartado de historiales
  //  <?php dd($data); ?>


    //GENERA HISOTIRIALES a partir de lo que traer la consulta ajax
    function crearHistorial(historiales){

        $('#historiales').empty();

        for(var i = 0 ; i<historiales.length ; i++){

            var div_contenedor=$('<div>');
            $('#historiales').append(div_contenedor);
            var cont=0;

            for(var clave in historiales[i]){
                var historial= historiales[i][clave];
                var div_historial = $('<div>');
                div_historial.attr('id','historial'+i);
                var div1=$('<div>');
                //DIV 1-------------------------
                div1.addClass('d-flex');
                div1.html('Nombre &nbsp;&nbsp;<span id="nombre" class="nombre mr-auto">'+historiales[i]['name']+'</span>Orden de Pedido:&nbsp;&nbsp;<span class="id" id="order">'+historiales[i]['id_order']+'</span>');
                var div2=$('<div>');

                div2.html('Precio&nbsp;&nbsp;<span id="precio" class="precio">'+historiales[i]['price']+'€</span><br>Cantidad&nbsp;&nbsp;<span id=cantidad class="cantidad">'+historiales[i]['quantity']+'</span><br>Método de pago&nbsp;&nbsp;<span id="pago" class="metodopago">'+historiales[i]['payment_method']+'</span><br>');

                var div3=$('<div>');
                div3.addClass('d-flex');
                div3.html('  Precio Final&nbsp;&nbsp;<span id="precio" class="precio mr-auto">'+historiales[i]['total_price']+'€</span>Fecha de Compra&nbsp;&nbsp;<span id="fecha" class="compra">'+historiales[i]['date']+'</span><br>');
                
                cont++;
            }

            div_contenedor.append(div1);
            div_contenedor.append(div2);
            div_contenedor.append(div3);
            div_contenedor.append('<hr>');
        }

    }

/*

array(1) { [0]=> object(stdClass)#344 (7) 
    { ["id_order"]=> int(2) ["payment_methods"]=>
     string(11) "Credit Card" ["total_price"]=>
      int(20) ["price"]=> int(10) ["date_order"]=> 
      string(10) "2020-05-06" ["quantity"]=> int(1)
       ["name"]=> string(17) "Taza Tummys White" } }
ORDER 

*/


    //DOBLE CLICK en los SPAN PERFIL: Al hacer doble click sobre un span, vaciaremos el 'span' y crearemos un input
    $(document).on('dblclick', '.editarcampo',function(){
       
        var valor=$(this).text();
        var valor = $.trim(valor);
        $(this).empty();

        var input=$('<input>');
        input.attr('id','perfil-input');
if($(this).attr('id')=="email"){
    input.attr('type','email');
    input.val(valor);
    input.attr('placeholder',valor);

}
else if($(this).attr('id')=="telephone_number"){
    input.attr('type','tel');
    input.val(valor);
    input.attr('placeholder',valor);
    input.attr('pattern', "^[9|8|7|6]\d{8}$");


}
else if($(this).attr('id')=="date_birth"){
    input.attr('type','date');
    input.val(valor);
    input.attr('placeholder',valor);

}
else if($(this).attr('id')=="nif"){
    input.attr('type','text');
    input.val(valor);
    input.attr("pattern", "[0-9]{8}[A-Za-z]{1}")


}
        else{
            input.attr('type','text');
            input.attr('placeholder',valor);
        }

        $(this).append(input);
        input.focus();
    });
/*


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
                url: "/listar/modificarAnimal/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            });
            $(this).parent().html(valor);
        }
        else{
            $(this).parent().html($(this).attr('placeholder'));
        }
    }
});



*/

$(document).on("click", ".unselected",function () { 

    
    var id = $(this).attr("id");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/listar/selectBadge/"+id,
        method: "GET",
    })
    
    .done(function(response){
  

        if($("#top").length == 1) {

            $("#top").remove();
            }
            var diverror = $("<div> Tu insignia se ha cambiado  </div>").attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($(".container"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
    

$('img[name ="badgeiconusuario"]').attr("src", response[0].icon);

    })
    .fail(function(response){

    });
    $(".selectedbadge").removeClass("selectedbadge").addClass("unselected")
$(this).removeClass("unselected").addClass("selectedbadge");





});

    //BLUR en los INPUT PERFIL: Al hacer blur sobre un input se debe comporbar los datos introducidos por el ususario
    $(document).on('blur', '.editarcampo',function(){

        var atributo=$(this).attr('id');
        var valor=$(this).find("input").val();         
        var valor = $.trim(valor);
        var error=$(this).attr('name');

 
if($(this).find("input").val()==''){

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div> El atributo " + error + "  está vacio </div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($(".container"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);



    
    var p =$("<p>"+ $(this).find("input").attr('placeholder')+"</p>")
 $(p).appendTo($(this));
     $(this).find("input").remove();
}
else{
if(comprobacionModificacion(atributo,valor)){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/listar/modificarUsuarioPerfil/"+atributo+"/"+valor,
        method: "GET",
    })
    
    .done(function(response){


    })
    .fail(function(response){

    });
    

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div> " + error + " cambiado con exito</div>").attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($(".container"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);




    var p =$("<p>"+valor+"</p>")
    $(p).appendTo($(this));
    $(this).find("input").remove();


}

else{

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>Has tenido un error en el " + error + "</div>").attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($(".container"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

    var p =$("<p>"+ $(this).find("input").attr('placeholder')+"</p>")

     $(p).appendTo($(this));
    $(this).find("input").remove();

}

}

  
    });




    function comprobacionModificacion(atributo, valor) {

        var expresionRegular = ""
        var res = false;
    
        switch (atributo) {
            case "nif":
                expresionRegular = new RegExp("[0-9]{8}[A-Za-z]{1}");
                res = expresionRegular.test(valor);
                break;
    
    
            case "name":
                expresionRegular = new RegExp("[a-zA-Z áéíóúÁÉÍÓÚñÑ]");
                res = expresionRegular.test(valor);
                break;
    
             
    
    
            case "first_name":
                expresionRegular = new RegExp("[a-zA-Z áéíóúÁÉÍÓÚñÑ]");
                res = expresionRegular.test(valor);
         
                break;
    
    
            case "last_name":
                expresionRegular = new RegExp("[a-zA-Z áéíóúÁÉÍÓÚñÑ]");
                res = expresionRegular.test(valor);
                break;
    
            case "date_birth":
             
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1;
                var yyyy = today.getFullYear();
                if (mm < 10) {
                    mm = '0' + mm;
                }
                valor = valor.split("-");
                if (parseInt(valor[0]) < yyyy) {
                    res = true;
                }
                else if (parseInt(valor[0]) > yyyy){
                    res = false;
                }
    
                if (parseInt(valor[0]) == yyyy) {
                    if (parseInt(valor[1]) < mm) {
                     
                        res = true;
                    }
                    else if (parseInt(valor[1]) > mm){
                        res = false;
                    }
                    else if (parseInt(valor[1]) == mm){
                     
                        if (parseInt(valor[2]) < dd) {
                            alert("entrado al dia");
            
                            res = true;
                        }
                        else if (parseInt(valor[2]) > dd){
                            res = false;
                        }
                        else if (parseInt(valor[2])==dd){
                            res=true
                        }
    
    
                    }
    
                } 
                break;
    
            case "email":
                expresionRegular = new RegExp("[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}");
                res = expresionRegular.test(valor);
                break;
    
    
            case "province":
                expresionRegular = new RegExp("[A-Za-z]");
                res = expresionRegular.test(valor);
                break;
    
    
            case "location":
                
                expresionRegular = new RegExp("[^A-Za-z0-9]+");
                res = expresionRegular.test(valor);
           
                break;
    
                case "telephone_number":
    
                    expresionRegular = new RegExp("^[679]{1}[0-9]{8}$");
                    res = expresionRegular.test(valor);
        
                    break;
    
            default:
                res = false;
        }
    
    
        return res;
    }
    







    $('#usuario-perfil').on('click','#guardar-perfil',function(){
        console.log('MODIFICARLO - para insertar los datos en la BBDD');
    })

});