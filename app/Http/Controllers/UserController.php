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

    public static function historialUsuario(){
        $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date','lines.quantity','products.name')
            ->join('orders','users.nif','=','orders.nif')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.nif',Auth::user()->nif)
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

}
