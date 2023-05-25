<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commande;

class OrderController extends Controller
{
    //

    public function orderslist(){
        $commande = commande::get();
        $commande->transform(function($commande, $key){
            $commande->panier = unserialize($commande->panier);
            return $commande;
        });
        return view('admin.orderslist')->with('commande', $commande);
    }
    

}
