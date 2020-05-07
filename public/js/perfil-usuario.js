$(function(){

    //HISTORIAL crear el a apartado de historiales


    //GENERA HISOTIRIALES a partir de lo que traer la consulta ajax
    function crearHistorial(historiales){

        $('#historiales').empty();

        for(var i = 0 ; i<historiales.length ; i++){

            var div_contenedor=$('<div>');
            $('#historiales').append(div_contenedor);
            var cont=0;

            for(var clave in historiales[i]){
                var historial= historiales[i][clave];
                var div_historial = $('<div>');
                div_historial.attr('id','historial'+i);
                var div1=$('<div>');
                //DIV 1-------------------------
                div1.addClass('d-flex');
                div1.html('Nombre &nbsp;&nbsp;<span id="nombre" class="nombre mr-auto">'+historiales[i]['name']+'</span>Orden de Pedido:&nbsp;&nbsp;<span class="id" id="order">'+historiales[i]['id_order']+'</span>');
                var div2=$('<div>');

                div2.html('Precio&nbsp;&nbsp;<span id="precio" class="precio">'+historiales[i]['price']+'€</span><br>Cantidad&nbsp;&nbsp;<span id=cantidad class="cantidad">'+historiales[i]['quantity']+'</span><br>Método de pago&nbsp;&nbsp;<span id="pago" class="metodopago">'+historiales[i]['payment_methods']+'</span><br>');

                var div3=$('<div>');
                div3.addClass('d-flex');
                div3.html('  Precio Final&nbsp;&nbsp;<span id="precio" class="precio mr-auto">'+historiales[i]['total_price']+'€</span>Fecha de Compra&nbsp;&nbsp;<span id="fecha" class="compra">'+historiales[i]['date']+'</span><br>');
                
                cont++;
            }

            div_contenedor.append(div1);
            div_contenedor.append(div2);
            div_contenedor.append(div3);
            div_contenedor.append('<hr>');
        }

    }

/*

array(1) { [0]=> object(stdClass)#344 (7) 
    { ["id_order"]=> int(2) ["payment_methods"]=>
     string(11) "Credit Card" ["total_price"]=>
      int(20) ["price"]=> int(10) ["date_order"]=> 
      string(10) "2020-05-06" ["quantity"]=> int(1)
       ["name"]=> string(17) "Taza Tummys White" } }
ORDER 

*/


    //DOBLE CLICK en los SPAN PERFIL: Al hacer doble click sobre un span, vaciaremos el 'span' y crearemos un input
    $('#usuario-perfil').on('dblclick', '#contenedor-perfil span',function(){
        var valor=$(this).text();
        console.log(valor);
        $(this).empty();
        var input=$('<input>');
        input.attr('id','perfil-input');
        if($(this).attr('id') == 'nacimiento'){
            console.log('entra fecha');
            input.attr('type','date');
            input.val(valor);
            console.log(valor);
            input.attr('placeholder',valor);
        }
        else if($(this).attr('id')=='telefono'){
            input.attr('type', 'tel');
            input.val(valor);
            input.attr('placeholder',valor);
            input.attr('pattern', "^[9|8|7|6]\d{8}$");
        }
        
        /*
<input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>

        */
        else{
            input.attr('type','text');
            input.attr('placeholder',valor);
        }

        $(this).append(input);
        input.focus();
    });


    //BLUR en los INPUT PERFIL: Al hacer blur sobre un input se debe comporbar los datos introducidos por el ususario
    $('#usuario-perfil').on('blur', '#perfil-input',function(){
        var span=$(this).parent();

        if($(this).val()!= ''){
            var dato=$(this).val();
            span.empty();
            span.text(dato);

            if(!$('#guardar-perfil').length > 0){
                var img=$('<img>');
                img.attr('src','/img/icons/guarda.svg');
                img.attr('id','guardar-perfil');
                $('#recu-contras').append(img);
            }

        }else{
            var dato=$(this).attr('placeholder');
            span.empty();
            span.text(dato);
        }
    });

    $('#usuario-perfil').on('click','#guardar-perfil',function(){
        console.log('MODIFICARLO - para insertar los datos en la BBDD');
    })

});