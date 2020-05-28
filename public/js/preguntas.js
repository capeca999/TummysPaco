$(function () {
 

var pagina=0;
//Funcion para formatear la fecha adecuadamente
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
    
        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
    
        return [year, month, day].join('-');
    }


    $(document).on('click','#submitpregunta' , function(){
        var today = new Date();

var titulo = $("#titulo").val();
var descripcion = $("#descripcion").val();

//Ajax para crear una pregunta
$.ajax({
    type: 'POST',
     dataType: "json",
     url: '/forum/',
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{"_token": $('#token').val(), title:$("#titulo").val(), description: $("#descripcion").val(), date:formatDate(today)},
 })

 .done(function(response){

    $("#divform").empty();


 })
.fail(function(response){ 

    console.log(response);

});



       }
    );


//Creamos el formulario par añadir preguntas
    $(document).on('click', '#newthread', function(){
        if( $("#divform").length==0){
        var diventero = $("#diventero");
        var divform=$("<div>").attr("id", "divform").insertBefore(diventero);
        var tituloh2=$("<h2>Creación de Pregunta</h2>").attr("class", "text-center").appendTo(divform);
        var div1= $("<div>").attr("class", "form-group").appendTo(divform);
        var label1=$("<label>Titulo</label>").attr("for", "text-input").appendTo(div1);
        var input1=$("<input>").attr("class", "form-control").attr("type", "text").attr("id", "titulo").attr("name", "text-input").appendTo(div1);
        var div2= $("<div>").attr("class", "form-group").appendTo(divform);
        var label1=$("<label>Descripción</label>").attr("for", "textarea-input").appendTo(div2);
        var textarea=$("<textarea>").attr("class", "form-control").attr("id", "descripcion").attr("name", "textarea").appendTo(div2);
        var div3= $("<div>").attr("class", "form-group").appendTo(divform);
        var button=$("<button>Crear Pregunta</button>").attr("id", "submitpregunta").attr("class", "btn btn-primary").appendTo(div3);
        }
    
    });
        

//Creamos el formulario para crear la respuesta
$(document).on('click', '#replybutton', function(){

    if( $("#divform").length==0){

    var diventero = $("#diventero");
    var divform=$("<div>").attr("id", "divform").insertBefore(diventero);
    var tituloh2=$("<h2>Creación de Respuesta</h2>").attr("class", "text-center").appendTo(divform);
    var div1= $("<div>").attr("class", "form-group").appendTo(divform);
    var label1=$("<label>Titulo</label>").attr("for", "text-input").appendTo(div1);
    var input1=$("<input>").attr("class", "form-control").attr("type", "text").attr("id", "titulo").attr("name", "text-input").appendTo(div1);
    var div2= $("<div>").attr("class", "form-group").appendTo(divform);
    var label1=$("<label>Descripción</label>").attr("for", "textarea-input").appendTo(div2);
    var textarea=$("<textarea>").attr("class", "form-control").attr("id", "descripcion").attr("name", "textarea").appendTo(div2);
    var div3= $("<div>").attr("class", "form-group").appendTo(divform);
    var button=$("<button>Crear Respuesta</button>").attr("id", "submitrespuesta").attr("class", "btn btn-primary").appendTo(div3);
}


});
//Creamos la respuesta
    $(document).on('click', '#submitrespuesta', function(){

        var today = new Date();

        var titulo = $("#titulo").val();
        var descripcion = $("#descripcion").val();
        var hiddenquestion = $("#hiddenquestion").val();



        $.ajax({
            type: 'POST',
             dataType: "json",
             url: '/forum/thread',
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{"_token": $('#token').val(), title:$("#titulo").val(), description: $("#descripcion").val(), date:formatDate(today), id_question:hiddenquestion},
         })
        
         .done(function(response){
        $("#divform").empty();

            console.log(response);

        
        
         })
        .fail(function(response){ 
        
            console.log(response);
        
        });
        



    });


    
//Cambiamos el icono del corazon al darle like
$(".likesnumeroanswer").click(function(){
    $(this).toggleClass("heart");
});


    //Conseguimos las preguntas dependiendo de que página

$(".page-item").click(function(){
    var fin=false;
var numeroarray=0;
var estepage = $(this);

if($(this).hasClass("disabled") || $(this).hasClass("active")){

}
else{

    $.ajax({
        type: 'GET',
         dataType: "json",
         url: '/api/forum/'+$(this).find("a").text(),
     })
    
     .done(function(response){



 var arraypreguntas =Object.values(response);




 var activo = $(".active");
 $(".active").removeClass("active");

 $(estepage).addClass("active");

    $("#preguntastodas").empty();
    
//Creamos las preguntas encontradas
    for (let index = 0; index < arraypreguntas.length; index++) {
 

        $("<hr>").attr("class", "m-0").appendTo($("#preguntastodas"));
      var divbody=   $("<div>").attr("class", "card-body py-3").appendTo($("#preguntastodas"));
      var divgutters=   $("<div>").attr("class", "row no-gutters align-items-center").appendTo(divbody);
      var divcol = $("<div>").attr("class", "col").appendTo(divgutters);
      var ahref =  $("<a>"+arraypreguntas[index].title+"</a>").attr("class", "text-big").attr("data-abc", "true").attr("href", "/forum/thread/"+arraypreguntas[index].question_id).appendTo(divcol);

      var divfecha = $("<div>"+ "</div>").attr("class", "text-muted small mt-1").appendTo(divcol);

      var afirstnamelastname = $("<a>"+"</a>").attr("href", "javascript:void(0)").attr("class", "text-muted").attr("data-abc", "true").appendTo(divfecha);
      
      var divnone = $("<div>").attr("class", "d-none d-md-block col-4").appendTo(divgutters);   
        var  divguttersdos=   $("<div>").attr("class", "row no-gutters align-items-center").appendTo(divnone);


        var divcol2 = $("<div>"+arraypreguntas[index].respuestas+"</div>").attr("class", "col-4").appendTo(divguttersdos);

        
        var divmedia =$("<div>").attr("class", "media col-8 align-items-center").appendTo(divguttersdos);
        var imgusuario = $("<img>").attr("src", "/uploads/avatars/"+arraypreguntas[index].avatar).attr("alt", "avatarUsuario").attr("class", "  imagenpregunta d-block ui-w-30 rounded-circle").appendTo(divmedia);
       
       var badgeicon =$("<img>").attr("src", arraypreguntas[index].icon).attr("alt", arraypreguntas[index].textobadge).attr("class", "badgeiconusuario").appendTo(divmedia);
        var divtruncate = $("<div>").attr("class", "media-body flex-truncate ml-2").appendTo(divmedia);
       
       
       
        var fechaini = new Date();

        var fechafin = new Date(arraypreguntas[index].date);
    
        var diasdif= fechafin.getTime()-fechaini.getTime();
    
        var contdias = Math.round(diasdif/(1000*60*60*24));


contdias = contdias*-1;

       
       
        var divtextruncate = $("<div>"+" Hace " + contdias + " Días" + "</div>").attr("class", "line-height-1 text-truncate").appendTo(divtruncate);
        var aby=$("<a>"  + arraypreguntas[index].date + arraypreguntas[index].first_name + arraypreguntas[index].last_name +  "</a>").attr("href", "javascript:void(0)").attr("class", "text-muted small text-truncate").attr("data-abc", "true").appendTo(divtruncate);


    }


    
     })
    .fail(function(response){ 
    
        console.log(response);
    
    });









}


});






    //Quitamos los likes y hacemos una peticion en ajas para quitarlos en la bdd

$(".likes").click(function(event){
    $(this).toggleClass("heart");


var elemento = $(this);


if($(elemento).hasClass("answerquestion")){


    if(!$(elemento).hasClass("heart")){

        $.ajax({
            type: 'get',
             dataType: "json",
             url: '/quitarLikeAnswer/'+$("#hiddenquestion").val()+'/'+$(elemento).attr("id"),
         })
        
         .done(function(response){
        
            var texto= $(elemento).next().text();
       $(elemento).next().text(parseInt(texto)-1);
    
         })
        .fail(function(response){ 
      
            console.log(response);
    
    });

    }


    else{
        $.ajax({
               type: 'get',
                dataType: "json",
                url: '/darLikeAnswer/'+$("#hiddenquestion").val()+'/'+$(elemento).attr("id"),
            })
           
            .done(function(response){
               var texto= $(elemento).next().text();
               $(elemento).next().text(parseInt(texto)+1);
       
            })
           .fail(function(response){ 
               console.log(response);  
       });
       
       }
   
//heart

}
//if answerquestion
else{
    


if(!$(elemento).hasClass("heart")){


    $.ajax({
        type: 'get',
         dataType: "json",
         url: '/quitarLike/'+$("#hiddenquestion").val(),
     })
    
     .done(function(response){
        var texto= $(elemento).next().text();

       $(elemento).next().text(parseInt(texto)-1);

     })
    .fail(function(response){ 
        console.log(response);

});
}
//comienzo if heart
else{
 $.ajax({
        type: 'get',
         dataType: "json",
         url: '/darLike/'+$("#hiddenquestion").val(),
     })
    
     .done(function(response){
        var texto= $(elemento).next().text();

        $(elemento).next().text(parseInt(texto)+1);

     })
    .fail(function(response){   
});



}
//else fin

//fin todo
}
});




$(".likesnumeroanswer").click(function(event){

    var elemento = $(this);
    console.log($(elemento).attr("id"));

    if(!$(elemento).hasClass("heart")){
     
    
        $.ajax({
            type: 'get',
             dataType: "json",
             url: '/quitarLikeAnswer/'+$("#hiddenquestion").val()+'/'+$(elemento).attr("id"),
         })
        
         .done(function(response){
        
            var texto= $(elemento).next().text();
       $(elemento).next().text(parseInt(texto)-1);

         })
        .fail(function(response){ 
      
            console.log(response);
    
    });
    }


    else{
     $.ajax({
            type: 'get',
             dataType: "json",
             url: '/darLikeAnswer/'+$("#hiddenquestion").val()+'/'+$(elemento).attr("id"),
         })
        
         .done(function(response){
            var texto= $(elemento).next().text();
            $(elemento).next().text(parseInt(texto)+1);
    
         })
        .fail(function(response){ 
            console.log(response);  
    });
    
    }








     $.ajax({
            type: 'get',
             dataType: "json",
             url: '/darLikeAnswer/'+$("#hiddenquestion").val()+'/'+$(elemento).attr("id"),
         })
        
         .done(function(response){
            var texto= $(elemento).children().first().next().text();
           $(elemento).children().first().next().text(  parseInt(texto)+1    );
    
         })
        .fail(function(response){   
            console.log(response);
    });
    
    });

    



});
