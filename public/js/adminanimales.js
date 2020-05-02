$(document).ready(function() {


    var cantidad = $("<td>").length

alert(cantidad);
    alert("hola");
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
   $(document).on( "dblclick", "td", function() {
    if($(this).attr('id') != 'noresult' && $(this).attr('name') != "id"){
        if($(this).text() != ''){
            var contenido=$(this).html();
            $(this).html('');
            var input =$('<input>');
            input.attr('type','text');
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
        if(!comprobacionModificacion(atributo,valor)){
            alert("hola");
            alert(id);
            alert("atributo " + atributo);
            alert("valor " + valor);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
                },
                url: "/listar/modificar/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            });

        }


        $(this).parent().html(valor);
    }







});
//id race species gender date_of_birth description nickname place_found size date_found condition
/*******************    QUEDAN LAS COMPROBACIONES    ********************/
function comprobacionModificacion(atributo, valor) {
    var expresionRegular = ""
    var res = false;
    switch (atributo) {
        case "race":
            expresionRegular = new RegExp("[A-Za-z]");
            res = expresionRegular.test(valor);
            break;

        case "gender":
            if (valor != "Macho" && valor != "Hembra") {
                res = false;
            } else res = true;
            break;
        case "Apple":
            text = "How you like them apples?";
            break;
        default:
            text = "I have never heard of that fruit...";
    }


    var error = false;

    return error;
}

});




