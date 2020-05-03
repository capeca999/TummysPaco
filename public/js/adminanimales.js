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
   $(document).on( "dblclick", "td", function() {
    var atributo=$(this).attr('name');
    var contenido=$(this).html();

    if($(this).attr('id') != 'noresult' && $(this).attr('name') != "id"){
        if($(this).text() != ''){
             contenido=$(this).html();
            $(this).html('');
            var input =$('<input>');
if ($(this).attr('name')=="date_of_birth" ||  $(this).attr('name')=="date_found"){
    input.attr('type','date');
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
                url: "/listar/modificar/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            });
            $(this).parent().html(valor);
        }
      
        else{
            $(this).parent().html($(this).attr('placeholder'));
        }


       
    }







});
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
    
        case "date_of_birth":
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();
            if(mm<10) 
            {
                mm='0'+mm;
            } 
            valor = valor.split("-");



            if(parseInt(valor[0])>yyyy){
                res=false;
            }
            else if(parseInt(valor[1])>mm){
                res=false;
            }
            else if (parseInt(valor[2])>dd){
                res=false;
            }   else res=true;

    

            break;
    
        case "description":
            
            expresionRegular = new RegExp("[A-Za-z]");
            res = expresionRegular.test(valor);
            break;
    
    
        case "nickname":
            expresionRegular = new RegExp("[A-Za-z]");
            res = expresionRegular.test(valor);
            break;
    
    
        case "place_found":
            expresionRegular = new RegExp("[^A-Za-z0-9]+");
            res = expresionRegular.test(valor);
            break;
    
        case "size":
            expresionRegular = new RegExp("[^A-Za-z0-9]+");
            res = expresionRegular.test(valor);
            break;
    
        case "date_found":
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();
            if(mm<10) 
            {
                mm='0'+mm;
            } 
            valor = valor.split("-");



            if(parseInt(valor[0])>yyyy){
                res=false;
            }
            else if(parseInt(valor[1])>mm){
                res=false;
            }
            else if (parseInt(valor[2])>dd){
                res=false;
            }   else res=true;


            break;
    
        case "condition":
            expresionRegular = new RegExp("[^A-Za-z0-9]+");
            res = expresionRegular.test(valor);
            break;
    
    
        default:
            res = false;
    }

 
    return res;
}

});




