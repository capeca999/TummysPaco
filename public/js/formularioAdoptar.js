$( document ).ready(function() {



    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr ('content')
        },
        url: "/listar/AnyadirPeticion/",
        method: "GET",
        data: {nombre:  $("#from-name"),  email: $("#from-email"), phone: $("#from-phone"), comments: $("#from-comments")},
        error:function(data){
            alert("error occured"); //===Show Error Message====
        }
    });


});