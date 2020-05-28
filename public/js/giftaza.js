//Cargamos la página completamente antes de empezar
$(function(){


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

//Conseguimos el formulario a json y lo mandamos a la página de compra

                            $('#formDonar').submit(function (e) {
                           


                                
                                e.preventDefault();
                                var data = $(this).serializeFormJSON();
                                
                                window.localStorage.setItem('checkout', JSON.stringify(data));
                                window.location.href = "/paginaComprar/";
                             
                            });

});