$( document ).ready(function() {
//Función que crea un alert personalizado

    function crearalert(campo) {
   
        if($("#top").length == 1) {

            $("#top").remove();
            }
            var diverror = $("<div>Has cometido un error en el campo " +  campo +  "</div>").attr("class" , "alert alert-warning beautifulerror").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
            var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
            var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);



      }

      //Comprobamos todos los campos para que esten correctamente formateados y lo mandamos para crear la petición


    $("#buttonSubmit").click(function(){
        var nombre = $("#from-name").val();
        var email = $("#from-email").val();
        var phone = $("#from-phone").val();
        var comments = $("#from-comments").val();
        var idanimal = $("#hidden").attr("value");
        var data={nombre:nombre,email:email,phone:phone,comments:comments,idanimal:idanimal};

        var fin=true;


     
        var exp= new RegExp("^[a-zA-Z]{2,}$");     
        var res = exp.test($("#from-name").val());
        if(res==false){
     
            crearalert("nombre");
        }
        else{
     

var exp = new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}");
var res = exp.test($("#from-email").val());

if(res==false){
  
    crearalert("email");
}

else{

    var exp = new RegExp("^[679]{1}[0-9]{8}$");
    var res = exp.test($("#from-phone").val());

if(res==false){
    crearalert("Teléfono");
}

else{

    var exp = new RegExp("^[a-zA-Z0-9 ]+$");
    var res = exp.test($("#from-comments").val());

if(res==false){
    crearalert("Comentario");
}

else{

    
    $.ajax({
        type: "post",
        url:'/comprobarPeticion',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{"_token": $('#token').val(), idanimal:idanimal},
        success:function(data) {
            $.ajax({
                type: "post",
                url:'/anydadirpeticion',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          
                data:{"_token": $('#token').val(), nombre:nombre,email:email,phone:phone,comments:comments,idanimal:idanimal},
               
                success:function(data) {
          
                    
                    if($("#top").length == 1) {

                        $("#top").remove();
                        }
                        var diverror = $("<div>Felicidades! Se le enviara un email pronto con la confirmación</div>").attr("class" , "alert alert-warning beautifulcorrect").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                        var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                        var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);


                    },
                error:function(data){
                }
           
            });             
            },
        error:function(data){
            if($("#top").length == 1) {

                $("#top").remove();
                }
                var diverror = $("<div>Has realizado la petición con anterioridad</div>").attr("class" , "alert alert-warning beautiful").attr("role",  "alert").attr("id", "top").appendTo($("#todoContenido"));
                var buttonerror = $("<button>").attr("type", "button").attr("class" , "close").attr("data-dismiss" , "alert").attr("aria-label", "close").appendTo(diverror);
                var spanaria= $("<span>&times</span>").attr("aria-hidden", "true").appendTo(buttonerror);
        }
    });









}




}

}


        }



      




    
      });


});