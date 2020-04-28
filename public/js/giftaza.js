//Cargamos la página completamente antes de empezar
$(function(){


$("#giftaza").hover(function(){
$(this).attr("src", "/img/products/TazaTummys/gif2.gif");
});


$("#giftaza").mouseout(function(){
    $(this).attr("src", "/img/products/TazaTummys/taza.jpg");
    });
    

});