$(document).ready(function() {

    var valor="";
    var cantidad = $("<td>").length
var valorinput="";
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
/*

    function pdfconverter() {
        var pdf = new jsPDF('l', 'pt', 'letter');
    
        pdf.cellInitialize();
        pdf.setFontSize(10);
        $.each( $('#tablaanimales tr'), function (i, row){
            $.each( $(row).find("td, th"), function(j, cell){
                var txt = $(cell).text().trim() || " ";
                var width =  70; //make 4th column smaller
                pdf.cell(10, 50, width, 30, txt, i);
            });
        });
    
        pdf.save('sample-file.pdf');
    }


*/

function pdfconverter() {
    var pdf = new jsPDF('l',  'pt', 'letter');
    var contador=0;
    pdf.cellInitialize();
    pdf.setFontSize(10);
    $.each( $('#tablaanimales tr'), function (i, row){
        $.each( $(row).find("td, th"), function(j, cell){
            contador++;
            var txt = $(cell).text().trim().split(" ").join("\n") || " ";
        if(contador==6){

        }
else{
    var width =  72; //make with column smaller
    var height = 72;
    pdf.cell(10, 50, width, height, txt, i);
}
        
           
        
        });
        contador=0;
    });
    
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
       
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange; var j=0;
        tab = document.getElementById('tablaanimales'); // id of table
    
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
                






    function añadiralert(atributo){


        if($("#top").length == 1) {

            $("#top").remove();
            }
        
        
                var diverror = $("<div> Has cometido un error en el campo " + atributo + " </div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
                var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


    }



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


  

   /*Añadir Animal (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
   $(document).on( "click", "#botonAñadir", function() {

if(  $("#animalesañadirtr").length==1 ){

    if($("#top").length == 1) {

        $("#top").remove();
        }
    
    
            var diverror = $("<div>" + "Ya has pulsado el boton"  + "</div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

}
else{



var animaltr=$("<tr>").attr("id", "animalesañadirtr").insertBefore($("#animalesAdmin"));
var animalidtd =$("<td>").attr("name", "id").appendTo(animaltr);

var animalracetd =$("<td>").attr("name", "race").appendTo(animaltr);

var inputtext1 =$("<input>").attr("type", "text").attr("id", "animalrace").appendTo(animalracetd);

var speciestd =$("<td>").attr("name", "species").appendTo(animaltr);

var inputtext2 =$("<input>").attr("type", "text").attr("id", "species").appendTo(speciestd);

var gendertd =$("<td>").attr("name", "gender").appendTo(animaltr);


var inputselect1 =$("<select>").attr("id", "selectgender").attr("name", "selectgender").appendTo(gendertd);
var machooption=$("<option> Macho </option>").attr("value", "Macho").appendTo(inputselect1);
var hembraoption=$("<option> Hembra </option>").attr("value", "Hembra").appendTo(inputselect1);

var dateofbirthtd =$("<td>").attr("name", "date_of_birth").appendTo(animaltr);

var inputtext3 =$("<input>").attr("type", "date").attr("id", "date_of_birth").appendTo(dateofbirthtd);


var descriptiontd =$("<td>").attr("name", "description").appendTo(animaltr);

var inputtext4 =$("<textarea>").attr("rows", "4").attr("cols", "50").attr("id", "descripcion").appendTo(descriptiontd);


var healthtd =$("<td>").attr("name", "health").appendTo(animaltr);

var inputtext5 =$("<input>").attr("type", "text").attr("id", "health").appendTo(healthtd);


var nicknametd =$("<td>").attr("name", "nickname").appendTo(animaltr);

var inputtext6 =$("<input>").attr("type", "text").attr("id", "nickname").appendTo(nicknametd);


var placefoundtd =$("<td>").attr("name", "place_found").appendTo(animaltr);

var inputtext7 =$("<input>").attr("type", "text").attr("id", "place_found").appendTo(placefoundtd);


var sizetd =$("<td>").attr("name", "size").appendTo(animaltr);

var inputtext8 =$("<input>").attr("type", "text").attr("id", "size").appendTo(sizetd);


var datefoundtd =$("<td>").attr("name", "date_found").appendTo(animaltr);

var inputtext9 =$("<input>").attr("type", "date").attr("id", "date_found").appendTo(datefoundtd);



var conditiontd =$("<td>").attr("name", "condition").appendTo(animaltr);

var inputtext11 =$("<input>").attr("type", "text").attr("id", "condition").appendTo(conditiontd);

var imagentd =$("<td>").attr("name", "imagen").appendTo(animaltr);

var inputfile =$("<input>").attr("type", "file").attr("id", "fileInput").appendTo(imagentd);



  
  $("#fileInput").on("change paste keyup", function() {
valor=$(this).val();
valor = this.value.replace(/^.*\\/, "");
valorinput = "/img/animals/"+valor;

 
 });

var botoned =$("<td>").appendTo(animaltr);
var botonsuccess=$("<button>").attr("id", "anyadiranimal").attr("class", "btn btn-success").attr("style", "margin-left: 5px;").attr("type", "submit").appendTo(botoned);
var icheck =$("<i>").attr("class", " fa fa-check").attr("style", "font-size: 15px;").appendTo(botonsuccess);
var botonserror=$("<button>").attr("id", "borrartr").attr("class", "btn btn-danger").attr("style", "margin-left: 5px;").attr("type", "submit").appendTo(botoned);
var icheck =$("<i>").attr("class", "fa fa-trash").attr("style", "font-size: 15px;").appendTo(botonserror);

}



    });

$(document).on("click", "#borrartr", function(){

    $("#animalesañadirtr").empty();
    $("#animalesañadirtr").remove();

});





    $(document).on( "click", "#anyadiranimal", function() {
       




expresionRegular = new RegExp("^[A-Za-z]+$");
res = expresionRegular.test($("#animalrace").val());
if(res==false){
    añadiralert("Raza");
}
else{



    expresionRegular = new RegExp("^[A-Za-z]+$");
    res = expresionRegular.test($("#species").val());

    if(res==false){
        añadiralert("Especie");
    }

    else{

     
        var generovalor = $( "#selectgender option:selected" ).text();

      

        var trimStr = $.trim(generovalor);



if( trimStr!="Macho" && trimStr!="Hembra"){
 
    añadiralert("Genero");



}

else{

    var fechavalor=$("#date_of_birth").val();



    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(mm<10) 
    {
        mm='0'+mm;
    } 
    fechavalor = fechavalor.split("-");



    if(parseInt(fechavalor[0])>yyyy){
        res=false;
    }
    else if(parseInt(fechavalor[1])>mm){
        res=false;
    }
    else if (parseInt(fechavalor[2])>dd){
        res=false;
    }   else res=true;


if(res==false){
        
    añadiralert("Fecha De Nacimiento");

}

else{
   
   
    expresionRegular = new RegExp("^[A-Za-z ]+$");
    res = expresionRegular.test($("#descripcion").val());

    if(res==false){
   
        añadiralert("Descripción");
    }

    else{
  
     
        expresionRegular = new RegExp("^[A-Za-z]+$");
        res = expresionRegular.test($("#health").val());
       
        if(res==false){
     
            añadiralert("Salud");
        }
    

        else{
      
       
            expresionRegular = new RegExp("^[A-Za-z]+$");
            res = expresionRegular.test($("#nickname").val());
         
            if(res==false){
                añadiralert("Apodo");
            }

            else{
             

                expresionRegular = new RegExp("^[A-Za-z0-9]+$");
                res = expresionRegular.test($("#place_found").val());
            
                if(res==false){
                    añadiralert("Lugar Encontrado");
                }
            else{
              
                expresionRegular = new RegExp("^[A-Za-z0-9]+$");
                res = expresionRegular.test($("#size").val());
            
                if(res==false){
                    añadiralert("Tamaño");
                }


                else{
         
                  
    var fechavalor=$("#date_found").val();



    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(mm<10) 
    {
        mm='0'+mm;
    } 
    fechavalor = fechavalor.split("-");



    if(parseInt(fechavalor[0])>yyyy){
        res=false;
    }
    else if(parseInt(fechavalor[1])>mm){
        res=false;
    }
    else if (parseInt(fechavalor[2])>dd){
        res=false;
    }   else res=true;


if(res==false){
   
    añadiralert("Lugar Encontrado");

}

else{

    expresionRegular = new RegExp("^[A-Za-z0-9]*$");
     res = expresionRegular.test($("#condition").val());
            
 



                if(res==false){
                
                    añadiralert("Condición");
                }
                else{

                  
                    
                    var trimStr = $.trim($("#condition").val());


if( trimStr=="" || trimStr==undefined ||trimStr==null  ){

    var valorcondition="";

}
else{

    var valorcondition=trimStr;
}




if(valorinput==""){

    añadiralert("Imagen");

}

else{


                    $.ajax({
                        type: 'post',
                         dataType: "json",
                         url: '/api/crearAnimal/',
                     
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                         data:{"_token": $('#token').val(), race:$("#animalrace").val(), species:$("#species").val(), gender: $( "#selectgender option:selected" ).text(),date_of_birth:$("#date_of_birth").val(),  description:$("#descripcion").val(), health:$("#health").val(), nickname:$("#nickname").val(), place_found:$("#place_found").val(),  size:$("#size").val(), date_found:$("#date_found").val(),condition:valorcondition,imagen:valorinput},
                     })
                    
                     .done(function(response){

$("#animalesañadirtr").empty();
$("#animalesañadirtr").remove();


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












                }

}

                }










            
            }




            }
        


        }

        

    }

}






}
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
                url: "/listar/modificarAnimal/"+id+"/"+atributo+"/"+valor,
                method: "GET",
            })

   
            .done(function(response){
            
                if($("#top").length == 1) {

                    $("#top").remove();
                    }
                
                
                        var diverror = $("<div> Has cambiado el campo " + atributo + " </div>" ).attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
                        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

                                     })
                                    
                                    .fail(function(response){
                            
                                
                                
                                    });







            $(this).parent().html(valor);
        }
      
        else{
            $(this).parent().html($(this).attr('placeholder'));
        }


       
    }





//^[0-9]+$

});
function comprobacionModificacion(atributo, valor) {

    var expresionRegular = ""
    var res = false;
    
    switch (atributo) {
        case "race":
            expresionRegular = new RegExp("^[A-Za-z]+$");
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
            
            expresionRegular = new RegExp("^[A-Za-z ]+$");
            res = expresionRegular.test(valor);
            break;
    
    
        case "nickname":
            expresionRegular = new RegExp("^[A-Za-z]+$");
            res = expresionRegular.test(valor);
            break;
    
    
        case "place_found":
            expresionRegular = new RegExp("^[A-Za-z0-9]+$");
            res = expresionRegular.test(valor);
            break;
    
        case "size":
            expresionRegular = new RegExp("^[A-Za-z0-9]+$");
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
            expresionRegular = new RegExp("^[A-Za-z0-9]+$");
            res = expresionRegular.test(valor);
            break;
    
    
        default:
            res = false;
    }

 
    return res;
}

});




