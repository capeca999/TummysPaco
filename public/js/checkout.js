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




for(property in compras){
 

if(compras[property]!="" && compras[property]!=undefined && compras[property]!=null && compras[property]!=0 && compras[property]!="0"){
  alert(property);
   
  var li =$("<li>").attr("class", "list-group-item d-flex justify-content-between lh-condensed").appendTo($("#productosComprando"));
  var div =$("<div>");
  var titulo =$("<h6>"+property + "</h6>").attr("class", "my-0");
  var spanPrecio = $("<span>"+).attr("class", "text-muted")
}
}


   console.log( JSON.parse(window.localStorage.getItem('checkout')));
});