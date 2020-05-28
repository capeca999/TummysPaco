$(document).ready(function() {


//Función convierte una tabla a un pdf

    function pdfconverter() {
        var pdf = new jsPDF('l',  'pt', 'letter');
    var contador=0;
        pdf.cellInitialize();
        pdf.setFontSize(10);
        $.each( $('#tablausuarios tr'), function (i, row){
            $.each( $(row).find("td, th"), function(j, cell){
            contador++;
                var txt = $(cell).text().trim().split(" ").join("\n") || " ";
    
if(contador==7){


}
else{

    var width =  72; //make with column smaller
    var height = 72;
    pdf.cell(10, 50, width, height, txt, i);              
        
}


            });
            contador=0;
        });
        //Función que crea un string random para el nombre del pdf

        function randomStr(len, arr) { 
            var ans = ''; 
            for (var i = len; i > 0; i--) { 
                ans +=  
                  arr[Math.floor(Math.random() * arr.length)]; 
            } 
            return ans; 
        } 
    
    var nombrepdf=randomStr(7, '12345abcde');
        pdf.save(nombrepdf+'.pdf');
    }

        function fnExcelReport()
        {
           //Función que crea un excel personalizado con los datos de la tabla

            var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange; var j=0;
            tab = document.getElementById('tablausuarios'); // id of table
        
            for(j = 0 ; j < tab.rows.length ; j++) 
            {     
                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                //tab_text=tab_text+"</tr>";
            }
        
            tab_text=tab_text+"</table>";
            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
        
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE "); 
        
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html","replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus(); 
                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
            }  
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
        
            return (sa);
        } 
        $("#ExportarExcel").click(function(){     
            fnExcelReport();
                    });
                    $("#ExportarPDF").click(function(){      
                        pdfconverter();
                                });
                    
    
    
    











//Función que filtra el buscado por lo que queramos introducir
//Comprueba en cada tr si la palabra buscada existe, si no existe mostrara no results



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
                
                    console.log(data);


                    if($("#top").length == 1) {

                        $("#top").remove();
                        }
                    
              
                            var diverror = $("<div> No puedes modificar tu rol  </div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
                            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);



                },
                success: function(data){


if(data.length==(5)){


    if($("#top").length == 1) {

        $("#top").remove();
        }
    

            var diverror = $("<div> No puedes modificar tu rol  </div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

}


                }
                
            });

            if($("#top").length == 1) {

                $("#top").remove();
                }
            
      
                    var diverror = $("<div> Has modificado el campo " + atributo + "</div>" ).attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
                    var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                    var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
           



            
            $(this).parent().html(valor);
        }
        else{

            if(data.length!=5){
                $(this).parent().html($(this).attr('placeholder'));
            }

//    <div id="contenedorPrincipal">       


if($("#top").length == 1) {

  $("#top").remove();
  }
  var diverror = $("<div>Has tenido un error en el " + atributo + "</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#diventero"));
  var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
  var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
}
    }
});
//Función que comprueba si la modificación esta correcta

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

});




