$( document ).ready(function() {
    alert("hola");



    $("#buttonSubmit").click(function(){
        var nombre = $("#from-name").val();
        var email = $("#from-email").val();
        var phone = $("#from-phone").val();
        var comments = $("#from-comments").val();
        var idanimal = $("#hidden").attr("value");
        var data={nombre:nombre,email:email,phone:phone,comments:comments,idanimal:idanimal};

        $.ajax({
            type: "post",
            url:'/anydadirpeticion',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
      
            data:{"_token": $('#token').val(), nombre:nombre,email:email,phone:phone,comments:comments,idanimal:idanimal},
           
            success:function(data) {
                alert(data);
                },
            error:function(data){
                console.log(data); //===Show Error Message====
            }
       
        });
    
      });


});