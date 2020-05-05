//Cargamos la página completamente antes de empezar
$(function(){

var li =$("<li>").attr("class", "list-group-item d-flex justify-content-between lh-condensed").appendTo($("#productosComprando"));
var div =$("<div>");
var titulo =$("<h6>").attr("class", "my-0")

    /*

          @foreach($_GET as $key => $value)
          
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$value}}</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>


@endforeach

    */

/*
  var diverror = $("<div>Has tenido un error en el " + atributo + "</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
  var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
  var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
*/
var compras =JSON.parse(window.localStorage.getItem('checkout')) ;
var preciototal=0;


for(property in compras){
  console.log(compras.length);

if(compras[property]!="" && compras[property]!=undefined && compras[property]!=null && compras[property]!=0 && compras[property]!="0"){
 parseInt(property)
$.ajax({
  dataType:"json",
  url: '/api/productos/'+parseInt(property),

})
.done(function(response){
  var li =$("<li>").attr("class", "list-group-item d-flex justify-content-between lh-condensed").appendTo($("#productosComprando"));
  var div =$("<div>").appendTo(li);
  var titulo =$("<h6>"+response[0].name+ "</h6>").attr("class", "my-0").appendTo(div);
  var descripcion = $("<small>"+response[0].description+"</small>").attr("class", "text-muted").appendTo(div);
  var spanPrecio = $("<span>"+response[0].price+"€"+"</span>").attr("class", "text-muted").appendTo(li);
  
preciototal=preciototal+parseInt(response[0].price);
if($("#liprecioid").length==0){

  var liprecio = $("<li>").attr("class", "list-group-item d-flex justify-content-between").attr("id", "liprecioid").appendTo($("#productosComprando"));
var spanprecio = $("<span>Total (euros)</span>").appendTo(liprecio);
var preciostrong = $("<strong>" + preciototal  + "</strong>").attr("id", "preciototalnumero").appendTo(liprecio);
 
}else{
  $("#liprecioid").remove();
  var liprecio = $("<li>").attr("class", "list-group-item d-flex justify-content-between").attr("id", "liprecioid").appendTo($("#productosComprando"));
  var spanprecio = $("<span>Total (euros)</span>").appendTo(liprecio);
  var preciostrong = $("<strong>" + preciototal  + "</strong>").attr("id", "preciototalnumero").appendTo(liprecio);
}
})
.fail(function(response){
  console.log(response);
});
}
}

$("#submitid").click(function (e) { 



  if($("#promocodeinput").val().length>0){
//System.out.println(loginToken.substring(1, loginToken.length()-1));
    $.ajax({

      dataType:"json",
      url:  '/api/productosCupon/'+$("#promocodeinput").val()
    })
    .done(function(response){
      if($("#lidescuento").length==1){
     let cantidaddescuento= $("#cantidaddescuento").text();
    cantidaddescuento=cantidaddescuento.substr(2);
    cantidaddescuento=cantidaddescuento.substr(0, cantidaddescuento.length -2);
        $("#preciototalnumero").text(parseInt($("#preciototalnumero").text())+parseInt(cantidaddescuento));
$("#lidescuento").remove();
let lidescuento=$("<li>").attr("class", "list-group-item d-flex justify-content-between bg-light").attr("id", "lidescuento").appendTo($("#productosComprando"));
let textsucces=$("<div>").attr("class", "text-success").appendTo(lidescuento);
let codigo= $("<h6>Codigo Promocional</h6>").attr("class", "my-0").appendTo(textsucces);
let codigopromocional =$("<small>"+response[0].codigo + "<small>").appendTo(textsucces);
let spandescuento = $("<span> -"+ response[0].descuento+" € </span>").attr("class", "text-success").attr("id", "cantidaddescuento").appendTo(textsucces);
$("#preciototalnumero").text(parseInt($("#preciototalnumero").text())-parseInt(response[0].descuento));
}
      else{
        let lidescuento=$("<li>").attr("class", "list-group-item d-flex justify-content-between bg-light").attr("id", "lidescuento").appendTo($("#productosComprando"));
        let textsucces=$("<div>").attr("class", "text-success").appendTo(lidescuento);
        let codigo= $("<h6>Codigo Promocional</h6>").attr("class", "my-0").appendTo(textsucces);
        let codigopromocional =$("<small>"+response[0].codigo + "<small>").appendTo(textsucces);
        let spandescuento = $("<span> -"+ response[0].descuento+"€ </span>").attr("class", "text-success").attr("id", "cantidaddescuento").appendTo(textsucces);
        $("#preciototalnumero").text(parseInt($("#preciototalnumero").text())-parseInt(response[0].descuento));

      }




    })
    .fail(function(response){
      console.log(response);
    });

  }
  
});


/*



*/




   console.log( JSON.parse(window.localStorage.getItem('checkout')));
});