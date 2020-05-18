<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
use App\Line;
use App\Product;
use DB;
use Image;
use App\Badge;
use App\Award;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Saca todos los Usuarios tipo Usuario
     *
     * @param  void
     * @return json usuarios
     */
    public static function listarUsuarios(){
        $usuarios = User::all()
            ->where('role', 'Usuario');

        return json_encode($usuarios);
    }

    
    /**
     * Modifica el valor con el $valor pasado del atributo pasado con el valor $atributo del usuario con ese id 
     *
     * @param  int $id
     * @param  string $atributo
     * @param  string $valor
     *
     * @return array usuario
     */
    public static function modificarUsuario($id,$atributo,$valor){
        $usuario = User::find(Auth::user()->id);
        $usuario->$atributo = $valor;
        $usuario->save(); 
    }
    public static function modificarUsuarioperfil($atributo,$valor){

 

        $usuario = User::find(Auth::user()->id);
        $usuario->$atributo = $valor;
        $usuario->save(); 
    }
    public static function changeBadge($id){
        $usuario = User::find(Auth::user()->id);
        $usuario->badge_selected = $id;
        $usuario->save(); 

        $awards = Badge::select('badges.icon', 'badges.id')
        ->where('badges.id', '=' ,$id)
        ->get()
        ->toJson();
$awardss = json_decode($awards);

return $awardss;
    }



    public static function historialUsuarioPedidos(){
        $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date_order','lines.quantity','products.name')
            ->join('orders','users.id','=','orders.id_user')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.id',Auth::user()->id)
            ->get();
        return $historiales;
    }
    public static function historialAdmin($nif){
        $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date','lines.quantity','products.name')
            ->join('orders','users.nif','=','orders.nif')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.nif',$nif)
            ->get();
        return $historiales;
    }
    
    public static function historialImporte($nif,$importe){
        $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date','lines.quantity','products.name')
            ->join('orders','users.nif','=','orders.nif')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.nif',$nif)
            ->where('orders.total_price',$importe)
            ->get();
        return $historiales;
    }

    public static function historialFecha($nif,$fecha){
      $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date','lines.quantity','products.name')
            ->join('orders','users.nif','=','orders.nif')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.nif',$nif)
            ->where('orders.date',$fecha)
            ->get();
        return $historiales;
    }



    //    public static function historialUsuario($nif){
    //        $historiales = User::select('line_product.id_order','orders.payment_methods','orders.total_price','products.price','orders.date','line_product.quantity','products.name')
    //            ->join('orders','users.nif','=','orders.nif')
    //            ->join('line_product','orders.id','=','line_product.id_order')
    //            ->join('products','line_product.id_product','=','products.id')
    //            ->where('orders.nif',$nif)
    //            ->get();
    //        return $historiales;
    //    }

    /*
    ->select('nif','name', 'surname1', 'surname2', 'email', 'date_of_birth')

    $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
    */



    public  function getUsuariosAdmin(){
        $usuarios = $this::getUsuariosAdminList();
        return view ('adminUsuarios')->with('usuarios', json_decode($usuarios));
    }
    


public static function gethistorial(){
        $historiales = User::select('lines.id_order','orders.payment_method','orders.total_price',
        'products.price','orders.date_order','lines.quantity','products.name')
        ->join('orders','users.id','=','orders.id_user')
        ->join('lines','orders.id','=','lines.id_order')
        ->join('products','lines.id_product','=','products.id')
        ->where('orders.id_user', '=' , Auth::user()->id)
        ->orderBy('id_order')
        ->get()
        ->toJson();


$historial = json_decode($historiales);


return $historial;
}

    public static function getperfil(){
$historial= self::gethistorial();
$awards= self::getawards();
$awardseleccionado = self::getawardseleccionado();
$data = array();
$data['historial'] = $historial;
$data['award']=$awards;
$data['awardseleccionado']=$awardseleccionado;
return view ('perfil', compact("data"));
    }


    public static function getawards(){
        $awards = Award::select('awards.id','awards.id_user','awards.id_badge',
        'badges.id','badges.icon','badges.name','badges.description')
        ->join('badges','awards.id_badge','=','badges.id')
        ->where('awards.id_user', '=' , Auth::user()->id)
        ->get()
        ->toJson();
$awardss = json_decode($awards);
for($cont1=0; $cont1 < count($awardss); $cont1++){
if($awardss[$cont1]->id_badge==Auth::user()->badge_selected){
    $awardss[$cont1]->selected=true;
}
else {
   $awardss[$cont1]->selected=false;
}
}
return $awardss;
    }



    public static function getawardseleccionado(){
        $awards = Award::select('awards.id','awards.id_user','awards.id_badge',
        'badges.id','badges.icon','badges.name','badges.description')
        ->join('badges','awards.id_badge','=','badges.id')
        ->where('awards.id_user', '=' , Auth::user()->id)
        ->get()
        ->toJson();
$awardss = json_decode($awards);
for($cont1=0; $cont1 < count($awardss); $cont1++){
if($awardss[$cont1]->id_badge==Auth::user()->badge_selected){
    $awardss[$cont1]->selected=true;
    return $awardss[$cont1];

}

}

$column_id =DB::table('awards')->insertGetId([
    'id_user'=>Auth::user()->id,
    'id_badge'=>10,
]);


return "new";
    }









    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(150, 150)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
        }
        
        $historial= self::gethistorial();
        $awards= self::getawards();
        $awardseleccionado = self::getawardseleccionado();
        $data = array();
        $data['historial'] = $historial;
        $data['award']=$awards;
        $data['awardseleccionado']=$awardseleccionado;
        return view ('perfil', compact("data"));
    }






    
    public static function getUsuariosAdminList(){

        $usuarios = User::all();
         return json_encode($usuarios);

      /*
        return User::select('users.id', 'users.nif', 'users.role','users.name',
        'users.first_name','users.last_name', 'users.image', 'users.password', 'users.date_birth', 'users.email', 'users.province',
         'users.location','users.telephone_number')
        ->groupBy('users.id')
        ->get()
        ->toJson();
        }
    
    */



}



}
