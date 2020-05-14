



$(function () {
 


$(".likesnumeroanswer").click(function(){
    $(this).toggleClass("heart");
});






    

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
