//Cargamos la página completamente antes de empezar
$(function(){


$("#giftaza").hover(function(){
$(this).attr("src", "/img/products/TazaTummys/gif2.gif");
});


$("#giftaza").mouseout(function(){
    $(this).attr("src", "/img/products/TazaTummys/taza.jpg");
    });
    
    $("#blancoLargo").click(function(){
        $("#camisetaLarga").attr("src", "/img/products/camisetaBlancaTummys/1.jpg");
        });
    
        $("#grisLargo").click(function(){
            $("#camisetaLarga").attr("src", "/img/products/camisetaGrisTummys/1.jpg");
            });
        
        
            
            $("#negroLargo").click(function(){
                $("#camisetaLarga").attr("src", "/img/products/camisetaNegraTummys/1.jpg");
                });
            


                $("#blancoCorto").click(function(){
                    $("#camisetaCorta").attr("src", "/img/products/camisetaCortaBlancaTummys/1.jpg");
                    });  

                    $("#moradoCorto").click(function(){
                        $("#camisetaCorta").attr("src", "/img/products/camisetaMoradaCortaTummys/1.jpg");
                        });  


                        $("#negroCorto").click(function(){
                            $("#camisetaCorta").attr("src", "/img/products/camisetaNegraCortaTummys/1.jpg");
                            });  

                            (function ($) {
                                $.fn.serializeFormJSON = function () {
         
                                    var o = {};
                                    var a = this.serializeArray();
                                    $.each(a, function () {
                                        if (o[this.name]) {
                                            if (!o[this.name].push) {
                                                o[this.name] = [o[this.name]];
                                            }
                                            o[this.name].push(this.value || '');
                                        } else {
                                            o[this.name] = this.value || '';
                                        }
                                    });
                                    return o;
                                };
                            })(jQuery);


                            $('#formDonar').submit(function (e) {
                                e.preventDefault();
                                var data = $(this).serializeFormJSON();
                                
                                window.localStorage.setItem('checkout', JSON.stringify(data));
                                window.location.href = "/paginaComprar/";
                            });

});