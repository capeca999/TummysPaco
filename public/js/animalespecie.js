$(document).ready(function() {


 


    $(".page-item").click(function(){


        var fin=false;
    var numeroarray=0;
    var estepage = $(this);
    
    if($(this).hasClass("disabled") || $(this).hasClass("active")){
    
    }
    else{

//Función que  consigue el animal y su especie

    
        $.ajax({
            type: 'GET',
             dataType: "json",
             url: '/api/animales/'+$(this).find("a").text()+'/'+$("#especienombre").val(),
         })
        
         .done(function(response){
   
     var arrayanimales =Object.values(response);
    

     var activo = $(".active");
     $(".active").removeClass("active");
    
     $(estepage).addClass("active");
    
        $("#diventero").empty();
        

        for (let index = 0; index < arrayanimales.length; index++) {
 

    var divtodo = $("<div>").attr("class", "col-sm-6 col-md-4 product-item animation-element slide-top-left").appendTo("#diventero");

    var productcontainer = $("<div>").attr("class", "product-container").appendTo(divtodo);

    var divrow1 = $("<div>").attr("class", 'row').appendTo(productcontainer);
            var divcol12= $("<div>").attr("class", "col-md-12").appendTo(divrow1);
    var aproductimage = $("<a>").attr("class", "product-image").appendTo(divcol12);
    var imganimal=$("<img>").attr("class", "imagenes_animalestodos").attr("src", arrayanimales[index].url).appendTo(aproductimage);
    var divrow2 = $("<div>").attr("class", "row").appendTo(productcontainer);
    var divcol8=$("<div>").attr("class", "col-8").appendTo(divrow2);
     var h2=$("<h2>"+arrayanimales[index].nickname+"</h2>").appendTo(divcol8);
    //arrayanimales
     if(arrayanimales[index].condition==null || arrayanimales[index].condition=="null"){
    
        var imgestrella=$("<img>").attr("title", arrayanimales[index].species).attr("class", "iconoEstrella").attr("src", "/img/icons/"+arrayanimales[index].species+".png").appendTo(h2);

        }
        else{
            var especial=$("<img>").attr("title", "Caso Especial").attr("class", "iconoEstrella").attr("src", "/img/icons/star.png").appendTo(h2);


        }


        var divrow3 = $("<div>").attr("class", "row").appendTo(productcontainer);
        var divcol122=$("<div>").attr("class", "col-12").appendTo(divrow3);
        var pdescription = $("<p>"+arrayanimales[index].description + "</p>").attr("class", "product-description").appendTo(divcol122);
        var divrow4 = $("<div>").attr("class", "row").appendTo(divcol122);
        var divcol66 = $("<div>").attr("class", "col-6").appendTo(divrow4);
        var animalid = $("<a>").attr("href", "/animal/"+arrayanimales[index].id).appendTo(divcol66);
        var botonnick = $("<button>" + "Mas Sobre" + arrayanimales[index].nickname+"</button>").attr("class", "btn btn-light").attr("type", "button").appendTo(animalid);
        var colultimo = $("<div>").attr("class", "col-6").appendTo(divcol122);



    }
         })
        .fail(function(response){ 
        
        
        });  
    }
    });
    
    

//Función que comprueba si hemos realizado la petición del animal con anterioridad


    $("#adoptar").click(function() {
        var idanimal = $("#hiddenid").attr("value");
        $.ajax({
            type: "post",
            url:'/comprobarPeticion',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{"_token": $('#token').val(), idanimal:idanimal},
            success:function(data) {
                window.location.href = "/animales/formularioAdoptar/"+$("#adoptar").attr("name");
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
    })
});




