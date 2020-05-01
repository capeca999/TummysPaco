$(document).ready(function() {
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
   $( "#animalesAdmin" ).on( "dbclick", "td", function() {
  alert("hola");
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



    });







});




