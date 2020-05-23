$(document).ready(function () {
   
  




    function añadiralert(atributo){


        if($("#top").length == 1) {

            $("#top").remove();
            }
        
        
                var diverror = $("<div> Has cometido un error en el campo " + atributo + " </div>" ).attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipal"));
                var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


    }

$("#donarboton").click(function(event){


 var reason = $( "#razon option:selected" ).text();
if(reason!= "Ofrenda de amor" &&  reason!="Me gustan los animales" && reason!= "Me gusta ayudar"){
añadiralert("Razon Donación");

}

else{
    var anonimo = $( "#anonimo option:selected" ).text();

if(anonimo!= "No" &&  anonimo!="Si" ){

    añadiralert("Anonimo");
}
else{
    var dinerodonar= $("#dinerodonar").val();

if(dinerodonar<=0){
    añadiralert("Dinero Donación");

}
else{
    var paymentmethod= $(".active").attr("value");

if(paymentmethod!="Credit card" && paymentmethod!="Paypal" && paymentmethod!="Debit card"){
    añadiralert("Metodo De Pago");
}
else{


var nombreapellidos = $("#nombreapellidos").val();

expresionRegular = new RegExp("^[A-Za-z ]+$");
res = expresionRegular.test(nombreapellidos);


if(res==false){

añadiralert("Nombre Y Apellidos");

}
else{

 var numerotarjeta = $("#numerotarjeta").val();

 expresionRegular = new RegExp("^[0-9]+$");
 res = expresionRegular.test(numerotarjeta);

if(res==false){

    añadiralert("Numero De La Tarjeta");


}
else{

var mes=$("#mes").val();
expresionRegular = new RegExp("^[0-9]+$");
res = expresionRegular.test(mes);

if(res==false || mes<1 || mes>12){
    añadiralert("Mes De Caducidad");
}
else{


    var anyo=$("#anyo").val();
expresionRegular = new RegExp("^[0-9]+$");
res = expresionRegular.test(anyo);
if(res==false){
    añadiralert("Anyo De Caducidad");
}

else{

    var mes=$("#mes").val();
    var anyo=$("#anyo").val();

    var today = new Date();

    var mm = today.getMonth()+1; 

    var yyyy = today.getFullYear();

    if(mm<10) 
    {
        mm='0'+mm;
    } 


   var correcto = true;
if(parseInt(anyo)<yyyy){
    correcto=false
    añadiralert("Anyo, está caducada tu tarjeta")
}
else if (parseInt(anyo)==yyyy){


if(parseInt(mes)<mm){
    correcto=false;
    añadiralert("Mes, está caducada tu tarjeta")

}

}


if(correcto==true){
            
            var ccv=$("#ccv").val();
            expresionRegular = new RegExp("^[0-9]+$");
            res = expresionRegular.test(ccv);
            
            if(res==false){
                añadiralert("Código De Seguridad");
            }
            else{




                var userid= $("#idusuarioinput").val();





                $.ajax({
            type:'post',
                    dataType: "json",
                    url: '/api/hacerDonacion/',
                    
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{"_token": $('#token').val(), reason:reason,anonimo:anonimo,dinerodonar:dinerodonar,paymentmethod:paymentmethod,userid:userid},
            
                })
                .done(function(response) {
                console.log(response);
                    if($("#top").length == 1) {
            
                        $("#top").remove();
                        }
                    
                    
                            var diverror = $("<div>Has realizado la donación correctamente! Muchas Gracias de parte de Tummys!</div>" ).attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#contenedorprincipal"));
                            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
                
            
                            setTimeout(function(){
                                window.location.href = '/';
                             }, 3000);
            
            
            
            
                })
                .fail(function(response) {
            
            console.log(response);
            
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











});








});

