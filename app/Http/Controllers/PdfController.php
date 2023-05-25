<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commande;
use Session;

class PdfController extends Controller
{
    //

    public function view_pdf($id){

        Session::put('id', $id);
        try{
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        }
        catch(\ Exception $e){
            return redirect('/orderslist')->with('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html(){
        $orders = commande::where('id',Session::get('id'))->get();

        foreach($orders as $order){
            $first_name = $order->client_firstname;
            $last_name = $order->client_lastname;
            $address = $order->adresse;
            $date = $order->created_at;
        }

        $orders->transform(function($order, $key){
            $order->panier = unserialize($order->panier);

            return $order;
        });

        $output = '<link rel="stylesheet" href="frontend/complements/css/style.css">
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                    <th>Client Name : '.$first_name.' '.$last_name.'<br> Client Address : '.$address.' <br> Date : '.$date.'</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table"  >
                            <thead class="thead-primary" style =" background-color: #012970">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Gadget name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';
        
        foreach($orders as $order){
            foreach($order->panier->items as $item){

                $output .= '<tr class="text-center">
                                <td class="image-prod"><img src="storage/gadget_images/'.$item['product_image'].'" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name">
                                    <h3>'.$item['product_name'].'</h3>
                                </td>
                                <td class="price">$ '.$item['product_price'].'</td>
                                <td class="qty">'.$item['qty'].'</td>
                                <td class="total">$ '.$item['product_price']*$item['qty'].'</td>
                            </tr><!-- END TR-->
                            </tbody>';

            }

            $totalPrice = $order->panier->totalPrice; 

        }

        $output .='</table>';

        $output .='<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th>$ '.$totalPrice.'</th>
                            </tr>
                        </thead>
                    </table>';


        return $output;
                
    
    }


}
