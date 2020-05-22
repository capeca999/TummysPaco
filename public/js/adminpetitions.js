$(document).ready(function() {
    

    function pdfconverter() {
        var pdf = new jsPDF('l',  'pt', 'letter');

        pdf.cellInitialize();
        pdf.setFontSize(10);
        $.each( $('#tablapetitions tr'), function (i, row){
            $.each( $(row).find("td, th"), function(j, cell){

                
     
                var txt = $(cell).text().trim().split(" ").join("\n") || " ";
      
  
        var width =  80; //make with column smaller
        var height = 72;
        pdf.cell(10, 50, width, height, txt, i);
  
            
               
            
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
            tab = document.getElementById('tablapetitions'); // id of table
        
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
  var emailenviar = $(this).parent();
var idusuario= $(emailenviar).prev().prev().prev().prev().prev().prev().prev().text();
alert(idusuario);
    $.ajax({
        dataType:"json",
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/api/animalinfo/"+animalId,
        method: "GET",
        success:function(data) {
       
if(valor=="Accepted"){
    var mensaje="Felicidades " + $(emailenviar).prev().prev().prev().prev().prev().text()+ "! Tu solicitud de adopción de " + data[0].nickname + " Ha sido aceptada!, el siguiente paso es ir a nuestro refugio y cojer a tu mascota";


alert(idusuario);
alert(animalId);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/modificarAnimalAdoptar/"+idusuario+'/'+animalId,
        method: "GET",
    })                     .done(function(response){
        console.log(response);

        
        
        
                             })
                            
                            .fail(function(response){
                        console.log(response);
                                
                         
                            });


    
}
else{
    var mensaje="Lo sentimos " +$(emailenviar).prev().prev().prev().prev().prev().text() +  "Tu solicitud de adopción de " + data[0].nickname + " no ha sido aceptada, intentelo de nuevo o contactanos para mas información";
}

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },
    url: "/sendmail/"+mensaje+"/"+$(emailenviar).prev().prev().prev().prev().text(),
    method: "GET",
});


$.ajax({
    headers: {
        'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
    },
    url: "/eliminarPetition/"+$(emailenviar).prev().prev().prev().prev().prev().prev().prev().prev().text(),
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
            error : function(jqXHR,textStatus,errorThrown)    {  
              
            }
            





            
    });
  var parentBoton=$(this).parent();
$(parentBoton).prev().text(valor);

$(emailenviar).parent().remove();

if($("#top").length == 1) {

    $("#top").remove();
    }

    if($(this).attr("title")=="Cancelled"){
        var diverror = $("<div>Has " + $(this).attr("title")+" la petición</div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#divprincipal"));
        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
    }
    else{

  
    diverror = $("<div>Has " + $(this).attr("title")+" la petición</div>" ).attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#divprincipal"));
     buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
     spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);

}
            //var name = $(this).closest('tr').find('.contact_name').text();
});
});




