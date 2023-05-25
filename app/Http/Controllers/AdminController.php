<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Gadget;
use App\commande;
use App\ajout_panier;
use App\User;
use App\admin;
use Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $orders = commande::get();
       
        $transformedOrders = $orders->transform(function($order, $key){
            $order->panier = unserialize($order->panier);
            return $order;
        });
    
        $RevenueData = $transformedOrders->map(function($order) {
            return $order->panier['totalPrice'];
        });
        
        $ordersData = $transformedOrders->map(function($order) {
            return $order->panier['totalQty'];
        });
    
        $customersData = $transformedOrders->pluck('client_firstname')->toArray();
        $dates = $transformedOrders->pluck('created_at')->toArray();
    
        $commandes = commande::get();
        $dateAujourdhui = Carbon::now()->toDateString();
        $commandesByTd = commande::whereDate('created_at', $dateAujourdhui)->get();
        $transformedCommandesByTd = $commandesByTd->transform(function($commande, $key){
            $commande->panier = unserialize($commande->panier);
            return $commande;
        });
    
        return view('admin.dashboard', compact('ordersData', 'RevenueData', 'customersData', 'dates'))
            ->with('transformedCommandesByTd', $transformedCommandesByTd);
    }
    
    public function userstable(){
        $users = User::get();
        $dateAujourdhui = Carbon::now()->toDateString();
        $usersbyTd = User::whereDate('created_at', $dateAujourdhui)->get();

        return view('admin.userslist', compact('usersbyTd', 'users' ));
    }

    public function gadgetstable(){

        $categories = category::get();
        

        $gadgets = Gadget::get();
        return view('admin.gadgetstable', compact('categories', 'gadgets' ));

    }

    public function account(){
        $admin = session::get('admin');
        //return view('admin.admin-account')->with('admin', $admin ?? null);
        dd($admin);
    }
    


    public function adminlogin(){
        return view('admin.admin-login');
    }

    public function adminsignup(){
        return view('admin.admin-signup');
    }


    public function create_account(Request $request ){
        $this->validate($request, ['username' => 'required'  , 
                                    'name' => 'required',
                                   'password' => 'required|min:4' ]);
        $admin = new admin();
        $admin->admin_name = $request -> input('name');
        $admin->login  = $request -> input('username');
        $admin->password = bcrypt($request->input('password'));
       
        $admin->save();

        return back()->with('status', 'Your account has been created successfully !');
    }



    public function admin_connect(Request $request){
        $this->validate($request, ['username' => 'required'  , 
                                   'password' => 'required' ]);
        
        $admin = admin::where('login', $request->input('username'))->first();

        if ($admin) {

            if(Hash::check($request->input('password'), $admin->password)){
                session::put('admin', $admin);
                return redirect('/admin-panel')->with('admin', $admin);
            }
            else {
                return back()->with('status', 'Wrong password or email');

            }
            

        } else {

            return back()->with('status' ,'You don'."'".'t have account');
        }
        
    }

    public function logout(){

        Session::forget('admin');
        return redirect('/admin');

    }


    /*public function edit_admin(Request $request){
       
        $this->validate($request,[
            'fullName' =>'required']);


        $admin =  admin::find($request->input('id'));

        $gadget->gadget_name = $request -> input('gadget_name');
        $gadget->gadget_price = $request -> input('gadget_price');
        $gadget->description = $request -> input('gadget_description');
        $gadget->gadget_category = $request -> input('gadget_category');
        
               
        

            $gadget->update();

            return redirect('/gadgetslist')->with('status', 'the gadget.'.$gadget->gadget_name.' has been successfully edited !');

           

        
    }*/
    
}
