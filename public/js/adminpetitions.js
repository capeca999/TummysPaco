$(document).ready(function() {
    
    var cantidad = $("<td>").length
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
/*MODIFICAR PRODUCTO (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
$('button.btn-success ,button.btn-danger').click(function(event) {
var id=$(this).attr("value");
    var atributo = "Status";
    var valor= $(this).attr("name");
   animalId=$("#"+id).attr("name");

    $.ajax({
        dataType:"json",
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/api/animalinfo/"+animalId,
        method: "GET",
        success:function(data) {

if(valor=="Accepted"){
    var mensaje="Felicidades " + $("#idusuario").attr("value") + "! Tu solicitud de adopción de " + data[0].nickname + " Ha sido aceptada!, el siguiente paso es ir a nuestro refugio y cojer a tu mascota";

}
else{
    var mensaje="Lo sentimos " + $("#idusuario").attr("value") +  "Tu solicitud de adopción de " + data[0].nickname + " no ha sido aceptada, intentelo de nuevo o contactanos para mas información";
}

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },
    url: "/sendmail/"+mensaje+"/"+$("#emailusuario").attr("value"),
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
            error : function(jqXHR,textStatus,errorThrown)
            {        
            }           
    });
  var parentBoton=$(this).parent();
$(parentBoton).prev().text(valor);



if($("#top").length == 1) {

    $("#top").remove();
    }
    var diverror = $("<div>Has " + $(this).attr("title")+" la petición</div>" ).attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#divprincipal"));
    var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
    var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


            //var name = $(this).closest('tr').find('.contact_name').text();
});
});




