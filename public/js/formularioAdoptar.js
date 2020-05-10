$( document ).ready(function() {
    $("#buttonSubmit").click(function(){
        var nombre = $("#from-name").val();
        var email = $("#from-email").val();
        var phone = $("#from-phone").val();
        var comments = $("#from-comments").val();
        var idanimal = $("#hidden").attr("value");
        var data={nombre:nombre,email:email,phone:phone,comments:comments,idanimal:idanimal};





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
                        console.log(data); //===Show Error Message====
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
              console.log(data); //===Show Error Message====
            }
        });









    
      });


});