$(document).ready(function() {


 


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



                console.log(data); //===Show Error Message====
            }
        });
    })


/*


    $petitions = DB::table('petitions')
    ->where('id_animal' ,'=', $_POST['idanimal'])
    ->where('id_user' ,'=',  Auth::user()->id)
    ->limit(1)
    ->get();

    $peticion = count($petitions);

    if($peticion>0){
        return response()->json(['success'=>'Has realizado la petición']);

    }




*/


});




