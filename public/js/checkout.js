$(function() {
   
  var li = $("<li>").attr("class", "list-group-item d-flex justify-content-between lh-condensed").appendTo($("#productosComprando"));
  var div = $("<div>");
  var titulo = $("<h6>").attr("class", "my-0")

  var compras = JSON.parse(window.localStorage.getItem('checkout'));
  var preciototal = 0;
  var cantidades = [];
var codigoDescuento="";
var idproduct=[];
var idprice=[];
var idquantity=[];
  for (property in compras) {


      if (compras[property] != "" && compras[property] != undefined && compras[property] != null && compras[property] != 0 && compras[property] != "0") {

      
          parseInt(property);

          cantidades.push(compras[property])

          $.ajax({
                  dataType: "json",
                  url: '/api/productos/' + parseInt(property),

              })
              .done(function(response) {


                setarrays(response[0].id, response[0].price, cantidades[0]);
                  var li = $("<li>").attr("class", "list-group-item d-flex justify-content-between lh-condensed").appendTo($("#productosComprando"));
                  var div = $("<div>").appendTo(li);
                  var titulo = $("<h6>" + response[0].name + " x" + cantidades[0] + "</h6>").attr("class", "my-0").appendTo(div);
                  var descripcion = $("<small>" + response[0].description + "</small>").attr("class", "text-muted").appendTo(div);
                  
                  var spanPrecio = $("<span>" + response[0].price * cantidades[0] + "€" + "</span>").attr("class", "text-muted").appendTo(li);
                 
                  $("#cantidadProductos").text(parseInt($("#cantidadProductos").text() + 1));
                 
                  preciototal = preciototal + parseInt(response[0].price * cantidades[0]);
                  cantidades.shift();
                  if ($("#liprecioid").length == 0) {

                      var liprecio = $("<li>").attr("class", "list-group-item d-flex justify-content-between").attr("id", "liprecioid").appendTo($("#productosComprando"));
                      var spanprecio = $("<span>Total (euros)</span>").appendTo(liprecio);
                      var preciostrong = $("<strong>" + preciototal + "</strong>").attr("id", "preciototalnumero").appendTo(liprecio);

                  } else {
                      $("#liprecioid").remove();
                      var liprecio = $("<li>").attr("class", "list-group-item d-flex justify-content-between").attr("id", "liprecioid").appendTo($("#productosComprando"));
                      var spanprecio = $("<span>Total (euros)</span>").appendTo(liprecio);
                      var preciostrong = $("<strong>" + preciototal + "</strong>").attr("id", "preciototalnumero").appendTo(liprecio);
                  }
              })
              .fail(function(response) {
              });
      }
  }

  function setarrays(id, precio, cantidad){
    idproduct.push(id);
    idprice.push(precio);
    idquantity.push(cantidad);
    }
    

    $('input[type=radio][name=direccion]').change(function() {


        


        $.ajax({

            dataType: "json",
            url: '/api/getDireccion/' + $(this).attr("id")
        })
        .done(function(response) {
 



$("#street").val(response[0].street);
$("#streetnumber").val(response[0].number);
$("#location").val(response[0].location);
$("#country").val(response[0].country);
$("#province").val(response[0].province);
$("#way").val(response[0].way);
$("#postal_code").val(response[0].postal_code);




        })
        .fail(function(response) {
            console.log(response);

        });



    });

  $("#submitid").click(function(e) {


      if ($("#promocodeinput").val().length > 0) {
          //System.out.println(loginToken.substring(1, loginToken.length()-1));
          $.ajax({

                  dataType: "json",
                  url: '/api/productosCupon/' + $("#promocodeinput").val()
              })
              .done(function(response) {
                codigoDescuento=response[0].id;
                cantidadDescuento=response[0].descuento;
setvariables(codigoDescuento, cantidadDescuento, codigoDescuento);

                  if (response.length != 0) {
                    
                      if ($("#lidescuento").length == 1) {
                     
                          let cantidaddescuento = $("#cantidaddescuento").text();
                          cantidaddescuento = cantidaddescuento.substr(2);
                          cantidaddescuento = cantidaddescuento.substr(0, cantidaddescuento.length - 2);
                          $("#preciototalnumero").text(parseInt($("#preciototalnumero").text()) + parseInt(cantidaddescuento));
                          $("#lidescuento").remove();
                          let lidescuento = $("<li>").attr("class", "list-group-item d-flex justify-content-between bg-light").attr("id", "lidescuento").appendTo($("#productosComprando"));
                          let textsucces = $("<div>").attr("class", "text-success").appendTo(lidescuento);
                          let codigo = $("<h6>Codigo Promocional</h6>").attr("class", "my-0").appendTo(textsucces);
                          let codigopromocional = $("<small>" + response[0].codigo + "<small>").appendTo(textsucces);
                          let spandescuento = $("<span> -" + response[0].descuento + " € </span>").attr("class", "text-success").attr("id", "cantidaddescuento").appendTo(textsucces);
                          $("#preciototalnumero").text(parseInt($("#preciototalnumero").text()) - parseInt(response[0].descuento));
                      } else {
                          let lidescuento = $("<li>").attr("class", "list-group-item d-flex justify-content-between bg-light").attr("id", "lidescuento").appendTo($("#productosComprando"));
                          let textsucces = $("<div>").attr("class", "text-success").appendTo(lidescuento);
                          let codigo = $("<h6>Codigo Promocional</h6>").attr("class", "my-0").appendTo(textsucces);
                          let codigopromocional = $("<small>" + response[0].codigo + "<small>").appendTo(textsucces);
                          let spandescuento = $("<span> -" + response[0].descuento + "€ </span>").attr("class", "text-success").attr("id", "cantidaddescuento").appendTo(textsucces);
                          $("#preciototalnumero").text(parseInt($("#preciototalnumero").text()) - parseInt(response[0].descuento));
                      }
                  }
              })
              .fail(function(response) {
              });
      }
  });
$("#submitbutton").click(function(event){
    var fin=true;


event.preventDefault();
var exp= new RegExp("^[a-zA-Z0-9_.-]{3,}");

var res = exp.test($("#street").val());
if(res==false){
fin=false;
$("#streeterror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {
  
    $("#streeterror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}
 exp= new RegExp("^[a-zA-Z0-9_. -]{3,}");
 res = exp.test($("#streetnumber").val());
if(res==false){
    fin=false;
$("#streetnumbererror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {
 
    $("#streetnumbererror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");
}
exp= new RegExp("^[a-zA-Z]{2,}$");
res = exp.test($("#location").val());
if(res==false){
    fin=false;
$("#locationerror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {
 
   $("#locationerror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}


if($("#country option:selected").text()=="Choose..."){
    res==false;
    fin=false;
}
else{
    res=true;
}

if(res==false){
    fin=false;
$("#countryerror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {
  
   $("#countryerror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}


if($("#province option:selected").text()=="Choose..."){
    res==false;
}
else{
    res==true;
}


if(res==false){
    fin=false;
$("#provinceerror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {

   $("#provinceerror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}

if($("#way option:selected").text()=="Elegir..."  || $("#way option:selected").text()=="Avenida" || $("#way option:selected").text()=="Bulevar" || $("#way option:selected").text()=="calle" || $("#way option:selected").text()=="Plaza"){
    res==false;
}
else{
    res==true;
}
if(res==false){
    fin=false;
$("#wayerror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {

   $("#wayerror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}
exp= new RegExp("^[0-9]{5}$");
res = exp.test($("#postal_code").val());
if(res==false){
    fin=false;
$("#postal_codeerror").removeClass("invalid-feedback").addClass("invalid-feedback d-block");
}
else {
   $("#postal_codeerror").removeClass("invalid-feedback d-block").addClass("invalid-feedback");

}





if (fin==true){
    $("#top").remove();
var total_price=$("#preciototalnumero").text();
var checked = $('#checkboxsave:checkbox:checked').length > 0;
var uspsnumber = Math.floor((Math.random()*99999999999)+1);
var paymentmethod=$('input[name=paymentMethod]:checked').val();
if(  typeof codigoDescuentoCantidad==="undefined"){
    codigoDescuentoCantidad="";
}
$.ajax({
   type: 'post',
    dataType: "json",
    url: '/api/crearPedido/',

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{"_token": $('#token').val(), idusuario:$("#hiddenid").val(),coupon_id:coupon_id,total_price:total_price,payment_method:paymentmethod,checked:checked,uspsnumber:uspsnumber,street:$("#street").val(), number:$("#streetnumber").val(),postal_code:$("#postal_code").val(),location:$("#location").val(),province:$("#province option:selected").text(),country:$("#country option:selected").text(),way:$("#way option:selected").text(), codigoDescuentoCantidad:codigoDescuentoCantidad},
})
.done(function(response) {


for (var cont = 0; cont < idproduct.length; cont++) {
  
    $.ajax({
        type: 'post',
         dataType: "json",
         url: '/api/crearLinea/',
     
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{"_token": $('#token').val(), id_order:response.id,id_product:idproduct[cont],price:idprice[cont],quantity:idquantity[cont]},
     })
    
     .done(function(response){
     })
    
    .fail(function(response){
    

        if($("#top").length == 1) {

            $("#top").remove();
            }
            var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


    });
    
    
}



if ($('#save-info').is(':checked')) {
    $.ajax({
        type: 'post',
         dataType: "json",
         url: '/api/crearDireccion/',
     
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{"_token": $('#token').val(), street:$("#street").val(),number:$("#streetnumber").val(),postal_code:$("#postal_code").val(),location:$("#location").val(),province:$("#province option:selected").text(),country:$("#country option:selected").text(),way:$("#way option:selected").text(),idusuario:$("#hiddenid").val()},
     })
    
     .done(function(response){
     })
    
    .fail(function(response){

        
    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);




    });
    
}

$.ajax({
    type: 'post',
     dataType: "json",
     url: '/api/crearInsignia/',
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{"_token": $('#token').val(), iduser:$("#hiddenid").val(),idbadge:1},
 })

 .done(function(response){
 })

.fail(function(response){
});
//    var mensaje="Felicidades " + $("#idusuario").attr("value") + "! Tu solicitud de adopción de " + data[0].nickname + " Ha sido aceptada!, el siguiente paso es ir a nuestro refugio y cojer a tu mascota";
var mensaje="¡Felicidades por tu compra! ¡Se le notificara cuando su producto esté llegando! ¡Ademas, su perfil ha ganado una insignia por esta compra! Muchísimas Gracias";

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },

    url: "/sendmailProducto/"+mensaje+"/"+"capeca999@gmail.com",
    method: "GET",
})
.done(function(response){
 
     })
    
    .fail(function(response){
     
    });


    window.setTimeout(function(){
        localStorage.clear();
        alert("Gracias por tu compra!")
        // Move to a new location or you can do something else
        window.location.href = "/";

    }, 5000);

        // Your application has indicated there's an error
   
    
  
//Esto es el done
})




.fail(function(response) {

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
});






}
else{

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
      }








  
});


var cantidadDescuento;
var codigoDescuentoNumero;
var coupon_id;
function setvariables(codigoDescuento, cantidadDescuento, idcupon){
coupon_id=idcupon;
codigoDescuentoCantidad=cantidadDescuento;  
codigoDescuento=codigoDescuento;
}




});