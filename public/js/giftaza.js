//Cargamos la página completamente antes de empezar
$(function(){

/*
$("img").attr("").hover(function(){
$(this).attr("src", "/img/products/TazaTummys/gif2.gif");
});


$("#1").mouseout(function(){
    $(this).attr("src", "/img/products/TazaTummys/taza.jpg");
    });
  */  
  

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