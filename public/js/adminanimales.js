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
$(document).on('blur',"td",function(){

    var atributo=$(this).attr('name');
    var id=$(this).attr('id');

    if($(this).val() == ''){
        $(this).parent().html($(this).attr('placeholder'));
    }else{
        if(!comprobacionModificacion(atributo,$(this).val())){
            $.ajax({
                url: "/animal/listar/modificar/"+id+"/"+atributo+"/"+$(this).val(),
                method: "GET",
            });

        }


        $(this).parent().html($(this).val());
    }







});

/*******************    QUEDAN LAS COMPROBACIONES    ********************/
function comprobacionModificacion(atributo,valor){
    var error=false;
  
    return error;
}


});




