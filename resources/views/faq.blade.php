
@extends('layouts.master')

@section('titulo')
    - Sobre nosotros
@endsection
@section('contenido')       
    <section id="faq" style="padding: 2px;margin: 11px;">
        <hr class="star-dark mb-5">
        <h2 class="text-uppercase text-center" style="font-size: 48;">FAQ</h2><br >
        <div class="container">
            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Como puedo colaborar con el refugio?&nbsp;</button>
                <div class="panel">
                    <p>Puedes colaborar con el refugio haciendo una donación, siendo un voluntario o simplemente adoptando un animal </p>
                </div>
            </div><br >
            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿En qué consiste el proceso de adopción?&nbsp;</button>
                <div class="panel">
                    <p>El proceso de adopción es un acto, a través del cual, una persona mayor de edad se hace cargo de un animal de la protectora con la finalidad de darle un hogar y cuidarlo.</p>
                </div>
            </div><br>
            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Qué animales puedo adoptar?&nbsp;</button>
                <div class="panel">
                    <p> Cualquiera de los animales que están en la protectora y que aparecen en nuestra web. Mira nuestros animales y dinos cual es el que te interesa.<p>
                </div>
            </div><br>
            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Quién puede adoptar?&nbsp;</button>
                <div class="panel">
                    <p>Cualquier persona mayor de edad que se comprometa a ser un buen dueño.</p>
                </div>
            </div><br>
            

            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Cómo adopto un animal de la protectora?&nbsp;</button>
                <div class="panel">
                    <p>Si ya has decidido qué animal es el que quieres adoptar de nuestros animales, entra en su ficha en la web y clickea sobre el botón "me interesa". Completa el formulario que aparece y una vez que nosotros recibamos la solicitud y analicemos la información proporcionada, nos pondremos en contacto contigo para dar los siguientes pasos: comprobar que cumples los requisitos y que eres una persona adecuada para la adopción.</p>
                </div>
            </div><br>

            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Que requisitos hay que cumplir para adoptar?&nbsp;</button>
                <div class="panel">
                    <p> Ser mayor de edad, tener un domicilio en el que poder tener el animal adoptado, firmar un contrato de adopción y asumir los costes veterinarios.</p>
                </div>
            </div><br>


            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿En quñe consiste el contrato de adopción?&nbsp;</button>
                <div class="panel">
                    <p> Es un documento en el que básicamente te comprometes a ser un buen dueño, cuidando del animal en unas condiciones óptimas de espacio, tiempo, alimentación, ejercicio,... y proporcionándole los cuidados veterinarios que requiera,...</p>
                </div>
            </div><br>


            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Cuánto dinero suponen los gastos veterinarios?&nbsp;</button>
                <div class="panel">
                    <p> Para un animal adulto los gastos están rondando los 70 euros y para los cachorros alrededor de 60 euros.</p>
                </div>
            </div><br>


            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Cuándo hay que abonar el dinero de los gastos veterinarios?&nbsp;</button>
                <div class="panel">
                    <p> Los gastos veterinarios se pagarán en el momento de la adopción.</p>
                </div>
            </div><br>


            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">¿Es obligatoria la esterilización?&nbsp;</button>
                <div class="panel">
                    <p> Si, esto se hace en favor de la salud del ánimal, así como para evitar el exceso de ánimales en situaciones precarias. En algunos casos, por motivos de edad o salud, la esterilización no ha sido realizada, por tanto el adoptante deberá hacerse caso de dicha esterilización.</p>
                </div>
            </div><br>



            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Tengo una adopción aprobada, ¿Hay que tener algo preparado en el momento de la adopción?&nbsp;</button>
                <div class="panel">
                    <p> Sí, se recomienda traer los accesorios adecuados para el transporte del animal (transportín, correa y collar, etc).</p>
                </div>
            </div><br>


        </div>
        <div class="container">
            <hr class="star-dark mb-5">
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/js/faq.js"></script>
    @endsection