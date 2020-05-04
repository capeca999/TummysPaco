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

    $(document).on("click", "input:file",function () {
        $(this).focus();
      
        var filename = $('iinput:file').val().replace(/C:\\fakepath\\/i, '');
        alert(filename);

    });


   /*MODIFICAR PRODUCTO (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
   $(document).on( "dblclick", "td", function() {
    var atributo=$(this).attr('name');
    var contenido=$(this).html();
    if($(this).attr('id') != 'noresult' && $(this).attr('name') != "id"){
        if($(this).text() != ''){
             contenido=$(this).html();
            $(this).html('');
            var input =$('<input>');
if ($(this).attr('name')=="date_birth"){
    input.attr('type','date');
    input.attr('value',contenido);
}

else if ($(this).attr('name')=="image"){
    input.attr('type','file');
    input.attr('value',contenido);
}
else{
    input.attr('type','text');
}
            input.attr('id','dato-anyadir');
            input.attr('placeholder',contenido);
            $(this).append(input);
            input.select();
        }
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
                url: "/listar/modificarUsuario/"+id+"/"+atributo+"/"+valor,
                method: "GET",
                
                error:function(data){
                    alert("error occured"); //===Show Error Message====
                }
            });
      
            $(this).parent().html(valor);
        }
        else{
//    <div id="contenedorPrincipal">       
$(this).parent().html($(this).attr('placeholder'));


if($("#top").length == 1) {

  $("#top").remove();
  }
  var diverror = $("<div>Has tenido un error en el " + atributo + "</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
  var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
  var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
}
    }
});
function comprobacionModificacion(atributo, valor) {

    var expresionRegular = ""
    var res = false;

    switch (atributo) {
        case "nif":
            expresionRegular = new RegExp("[0-9]{8}");
            res = expresionRegular.test(valor);
            break;

        case "role":
            if (valor != "Usuario" && valor != "Administrador") {
                res = false;
            } else res = true;
            break;


        case "name":
            expresionRegular = new RegExp("[A-Za-z]");
            res = expresionRegular.test(valor);
            break;


        case "first_name":
            expresionRegular = new RegExp("[A-Za-z]");
            res = expresionRegular.test(valor);
            break;


        case "last_name":
            expresionRegular = new RegExp("[A-Za-z]");
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
            expresionRegular = new RegExp("(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}");
            res = expresionRegular.test(valor);
            break;
        default:
            res = false;
    }


    return res;
}

});




