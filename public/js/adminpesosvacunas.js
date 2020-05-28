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



    
  





















   /*Añadir Animal (Añadir input)- Al hacer doble click creara un input en el td cliqueado*/
   $(document).on( "click", "#submitvacuna", function() {


    $.ajax({
        type: 'post',
         dataType: "json",
         url: '/api/crearVacuna/',
     
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{"_token": $('#token').val(), idanimal:$("#animalhidden").val(),datevacuna:$("#datevacuna").val(), nombre_vacuna:$( "#nombre_vacuna option:selected" ).attr("value")},
     })
    
     .done(function(response){
         console.log(response);
        if($("#top").length == 1) {
            $("#top").remove();
            }
            var diverror = $("<div>  Has Insertado Una Vacuna Al Animal!  </div>").attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

     })
    
    .fail(function(response){

    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);




    });


});
$(document).on( "click", "#submitpeso", function() {

alert($("#cantidadpeso").val());

    $.ajax({
        type: 'post',
         dataType: "json",
         url: '/api/crearPeso/',
     
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{"_token": $('#token').val(), idanimal:$("#animalhidden").val(),fechapeso:$("#datepeso").val(), cantidadpeso:$("#cantidadpeso").val()},
     })
    
     .done(function(response){
        if($("#top").length == 1) {

            $("#top").remove();
            }
            var diverror = $("<div>  Has Insertado Un peso Al Animal!  </div>").attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


     })
    
    .fail(function(response){
        console.log(response);
    if($("#top").length == 1) {

        $("#top").remove();
        }
        var diverror = $("<div>  Has tenido un error en un campo, comprueba tus datos</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipalpagina"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);




    });





});







$(document).on("click", ".pesosbotonanadir", function(){
alert("holaa");
$("#animalhidden").val($(this).val());


});



$(document).on("click", ".vacunabotonadir", function(){



$("#animalhidden").val( $(this).val() );

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
            
            expresionRegular = new RegExp("^[A-Za-z]+$");
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




