<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\slider;
use App\Gadget;
use App\Category;
use App\ajout_panier;
use App\User;
use App\clients;
use App\wishlist;
use Session;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Stripe;
use App\commande;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    //
    public function home(){
        $sliders = slider::where('status', 1)->get();
        $gadgets = Gadget::where('status', 1)->get();
        $dateAujourdhui = Carbon::now()->toDateString();
        $NewArrivalCategory = Gadget::whereMonth('created_at', Carbon::now()->month)->pluck('gadget_category');

        
        $gadgetsThisMonth = Gadget::whereMonth('created_at', Carbon::now()->month)->get();
        $gadgetsMostsold = DB::table('gadgets')
        ->join('commandes', 'gadgets.gadget_name', '=', 'commandes.panier->items->product_name')
        ->select('gadgets.*', DB::raw('COUNT(commandes.id) as total_sales'))
        ->groupBy('gadgets.id', 'gadgets.category_id', 'gadgets.gadget_name', 'gadgets.gadget_category', 'gadgets.gadget_image', 'gadgets.description', 'gadgets.gadget_price', 'gadgets.status', 'gadgets.created_at', 'gadgets.updated_at')
        ->orderBy('total_sales', 'desc')
        ->get();
        $categories = Category::get();
        
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('wishlist') ? new wishlist(Session::get('wishlist')) : null;

        if(!$cart ){
            if(!$wishlist ){
            return view('client.home')->with([
                'sliders' => $sliders,
                'gadgets' => $gadgets,
                'categories' => $categories,
                'product' => null,
                'wishItems'=>null,
                'gadgetsThisMonth' => $gadgetsThisMonth,
                'gadgetsMostsold' => $gadgetsMostsold,
                'NewArrivalCategory' => $NewArrivalCategory
            ]);
             }
             else{

                return view('client.home')->with([
                    'sliders' => $sliders,
                    'gadgets' => $gadgets,
                    'categories' => $categories,
                    'product' => null,
                    'wishItems' => $wishlist->items,
                    'gadgetsThisMonth' => $gadgetsThisMonth,
                    'gadgetsMostsold' => $gadgetsMostsold,
                    'NewArrivalCategory' => $NewArrivalCategory
                ]);
             }
             
        }

        return view('client.home')->with([
            'sliders' => $sliders,
            'gadgets' => $gadgets,
            'categories' => $categories,
            'product' => $cart->items,
            'wishItems' => isset($wishlist) ? $wishlist->items : null,
            'gadgetsThisMonth' => $gadgetsThisMonth,
            'gadgetsMostsold' => $gadgetsMostsold,
            'NewArrivalCategory' => $NewArrivalCategory
        ]);

       

       



    
    }

    public function shop(){
        $gadgets = Gadget::where('status', 1)->paginate(12);
        
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('wishlist ') ? new wishlist(Session::get('wishlist')) : null;

        if(!$cart ){
            if(!$wishlist ){
                return view('client.shop', ['product' => null ,'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);

            }
            else{
                return view('client.shop', ['product' => null ,'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
        }

            }
            

        return view('client.shop', ['product' => $cart->items ,'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
    }



    public function shopByCategory($category){
        $categories = Category::get();
        $nb = Gadget::where('gadget_category', $category)->count();
        // Récupérez les gadgets de la catégorie sélectionnée
        $gadgets = Gadget::where('gadget_category', $category)->where('status', 1)->get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('wishlist') ? new wishlist(Session::get('wishlist')) : null;

        if(!$cart ){
            if(!$wishlist ){
                return view('client.shopbycategory', ['product' => null ,'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets)->with('nbbycat', $nb);
            }else{
                return view('client.shopbycategory', ['product' => null ,'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets)->with('nbbycat', $nb);
            }
            
        }
 
        // Retournez la vue avec les gadgets sélectionnés
        return view('client.shopbycategory', ['product' => $cart->items  ,'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    public function cart(){
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('wishlist') ? new wishlist(Session::get('wishlist')) : null;

        if(!$cart){
            if(!$wishlist ){
            return view('client.empty-cart', ['product' => null ,'wishItems'=>null]);
        }
        else{
            return view('client.empty-cart', ['product' => null ,'wishItems'=>$wishlist->items]);
        }
        }      
        
        return view('client.cart', ['product' => $cart->items ,'wishItems' => isset($wishlist) ? $wishlist->items : null])->with('cart', $cart);
    }

    public function about(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('wishlist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist ){
            return view('client.about',['product' =>null ,'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            else{
                return view('client.about',['product' =>null ,'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
        }


        return view('client.about', ['product' => $cart->items ,'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
    
    }

    public function client_login(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist ){
                return view('client.login',['product' =>  null ,'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }

            else{
                return view('client.login',['product' =>  null ,'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
        }


        return view('client.login', ['product' => $cart->items ,'wishItems' => isset($wishlist) ? $wishlist->items : null])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    public function signup(){
        return view('client.signup');
    }

    public function paiement(){
        if(!Session::has('client')) {
            return view('client.login');
        }

        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist){
            return view('client.cart', ['product' => null, 'wishItems'=>null]);
            }
            else{

                return view('client.cart', ['product' => null, 'wishItems'=>$wishlist->items]);

            }

        }


        return view('client.checkout',['product' =>  null , 'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    public function ordertracking(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        
       
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        if(!$cart){
            if(!$wishlist){
            return view('client.ordertracking', ['product' => null, 'wishItems'=>null]);
            }
            else{
                return view('client.ordertracking', ['product' => null, 'wishItems'=>$wishlist->items]);
            }
        }


        return view('client.ordertracking', ['product' => $cart->items , 'wishItems' => isset($wishlist) ? $wishlist->items : null,]);
    }

    public function accountpage(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $user = Session::get('user');
        $orders= commande::where('client_email', $user->email)->get();


        $orders->transform(function($order, $key){
            $order->panier = unserialize($order->panier);

            return $order;
        });



        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist){
                return view('client.account',['product' =>  null , 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets)->with('orders',  $orders);
            }
            else{
                return view('client.account',['product' =>  null , 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets)->with('orders',  $orders);
            }

            

        }

        return view('client.account',['product' => $cart->items,  'wishItems' => isset($wishlist) ? $wishlist->items : null])->with('categories', $categories)->with('gadgets', $gadgets)->with('orders',  $orders);

    }

    public function contact(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist){
                return view('client.contact',['product' =>  null , 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            else{
                return view('client.contact',['product' =>  null , 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
           
        }

        

        return view('client.contact', ['product' => $cart->items , 'wishItems' => isset($wishlist) ? $wishlist->items : null])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    public function checkout(){
        $gadgets = Gadget::where('status', 1)->get();
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!Session::has('user')) {
            return view('client.login',['product' => $cart->items, 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
        }

        
        if(!$cart){
            if(!$wishlist){
                return view('client.cart', ['product' => null, 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            else{
                return view('client.cart', ['product' => null, 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
           
        }

        return view('client.checkout',['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    public function nbProduct(){
        $nb = Gadget::count();
        return $nb;
    }

    public function nbProductBycat($category){
        $nb = Gadget::where('gadget_category', $category)->count();
        return $nb;
    }

    public function nbOrder(){
        $nb = commande::count();
        return $nb;
    }

    public function add_to_cart($id){
        $gadgets = Gadget::find($id);

        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new ajout_panier($oldCart);
        $cart->add($gadgets, $id);

        Session::put('cart', $cart);

       // dd(Session::get('cart'));

       return redirect('/shop');

        
    }

    public function edit_panier(Request $request , $id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new ajout_panier($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);
        
        // Ajouter un message de débogage ici
        //dd('edit_panier called');

        return redirect::to('/cart');
        //return redirect::to('/cart');

    }

    public function remove_product($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new ajout_panier($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/cart');
    }

    public function to_pay(Request $request) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ajout_panier($oldCart);
        $typeDeCarte = $request->input('card-type');
       
        
        
       
    
        Stripe::setApiKey('sk_test_51MzSfCJ2LM8AStyJB7MeHuOwAGcxFrkzxr1wBE0hXITjLbUAwFgzDC3kehm2vokEISwCrC20RitFslZoZkJSxkhT008XLalyJX');
    
        try{
            
            
            $source = ''; // initialisez la variable source à une chaîne vide
    
            switch ($typeDeCarte) {
                case 'visa':
                    $source = 'tok_visa';
                    break;
                case 'mastercard':
                    $source = 'tok_mastercard';
                    break;
                case 'american Express':
                    $source = 'tok_amex';
                    break;
                // ajoutez d'autres cas pour d'autres types de cartes si nécessaire
            }
            if ($source != '') {
                $charge = Charge::create(array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => "usd",
                    "source" => $source, // $request->input('stripeToken'), // obtainded with Stripe.js
                    "description" => "Test Charge"
                ));
                $commandes = new commande();
                $commandes->payment_id = $charge->id;
                $commandes->client_firstname = $request->input('firstname');
                $commandes->client_lastname = $request->input('lastname');
                $commandes->client_email = $request->input('email');
                $commandes->adresse = $request->input('country') . ', '. $request->input('Street').', '. $request->input('apartment').' , ' . $request->input('city') . ', ' . $request->input('state') . ', ' . $request->input('postcode');
                $commandes->panier = serialize($cart);
                $commandes->save();

                // ...

                if ($request->has('ship_different_address')) {
                    $commandes1 = new commande();
                    $commandes1->payment_id = $charge->id;
                    $commandes1->client_firstname = $request->input('firstname1');
                    $commandes1->client_lastname = $request->input('lastname1');
                    $commandes1->client_email = $request->input('email1');
                    $commandes1->adresse = $request->input('country1') . ', '. $request->input('Street1').', '. $request->input('appart1').' , ' . $request->input('city1') . ', ' . $request->input('state1') . ', ' . $request->input('postcode1');
                    $commandes1->panier = serialize($cart);
                    $commandes1->save();
                }
                


                
               /* $commandes = commande::where('payment_id', $charge->id)->get();
                $commandes->transform(function($commande, $key){
                    $commande->panier = unserialize($commande->panier);
                    return $commande;
                });

                $email =  $request->input('email');
                $email1 =  $request->input('email1');
                
                Mail::to($email)->send(new SendMail($commandes));

                if ($request->has('ship_different_address')) {
                    Mail::to($email1)->send(new SendMail($commandes)); // Envoyer un e-mail pour la commande de livraison
                }*/

               

                }

               



                
                

                
                
                
                //$email =  Session::get('user')->email;

                
    
            
            

            
           
            
         
        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout')->with('error', $e->getMessage())->withInput();
        }
    
        Session::forget('cart');
        return redirect('/thankyoupage')->with('status', 'Purchase accomplished successfully !');
       //dd($source);
    }
    
    public function create_account(Request $request ){
        $this->validate($request, ['user-name' => 'required'  , 
                                    'email' => 'email|required|unique:users',
                                   'user-password' => 'required|min:4' ]);
        $user = new User();
        $user->name = $request -> input('user-name');
        $user->email = $request -> input('email');
        $user->password = bcrypt($request->input('user-password'));
       
        $user->save();

        return back()->with('status', 'Your account has been created successfully !');
    }

    public function connect_acount(Request $request) {
        $this->validate($request, ['email' => 'required'  , 
                                   'user-password' => 'required' ]);
        
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {

            if(Hash::check($request->input('user-password'), $user->password)){
                session::put('user', $user);
                return redirect('/home');
            }
            else {
                return back()->with('status', 'Wrong password or email');

            }
            

        } else {

            return back()->with('status' ,'You don'."'".'t have account');
        }
    }


    public function logout(){

        Session::forget('user');
        return redirect('/home');

    }

   public function ShopByAZ(){

        $gadgets = Gadget::orderBy('gadget_name', 'asc')->paginate(12);
        //$gadgetsByPage =  $gadgets::paginate(12);
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist){
                return view('client.shopbyaz', ['product' => null, 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            else{
                return view('client.shopbyaz', ['product' => null, 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            
            }
            
        }

        return view('client.shopbyaz', ['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null, ])->with('categories', $categories)->with('gadgets', $gadgets);

   }

   public function ShopByZA(){
        $gadgets = Gadget::orderBy('gadget_name', 'desc')->paginate(12);
       
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;

        if(!$cart){
            if(!$wishlist){
                return view('client.shopbyza', ['product' => null, 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }

            else{
                return view('client.shopbyza', ['product' => null, 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            
        }

        return view('client.shopbyza', ['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
   }

   public function ShopByPriceAsc(){
        $gadgets = Gadget::orderBy('gadget_price', 'asc')->paginate(12);
        //$gadgetsByPage =  $gadgets::paginate(12);
        $categories = Category::get();
        $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
        $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
        if(!$cart){
            if(!$wishlist){
                return view('client.shopbypriceasc', ['product' => null, 'wishItems'=>null])->with('categories', $categories)->with('gadgets', $gadgets);
            }

            else{
                return view('client.shopbypriceasc', ['product' => null, 'wishItems'=>$wishlist->items])->with('categories', $categories)->with('gadgets', $gadgets);
            }
            
        }


        return view('client.shopbypriceasc', ['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
   }

   public function shopByPriceDesc(){

    $gadgets = Gadget::orderBy('gadget_price', 'desc')->paginate(12);
    $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;
    //$gadgetsByPage =  $gadgets::paginate(12);
    $categories = Category::get();
    $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;

    if(!$cart){
        if(!$wishlist){
            return view('client.shopbypricedesc', ['product' => null, 'wishItems'=>null ])->with('categories', $categories)->with('gadgets', $gadgets);
        }
        else{
            return view('client.shopbypricedesc', ['product' => null, 'wishItems'=>$wishlist->items ])->with('categories', $categories)->with('gadgets', $gadgets);
        }
        
    }

    return view('client.shopbypricedesc', ['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null,])->with('categories', $categories)->with('gadgets', $gadgets);
    
   }

   public function shopByNew(){



    $gadgets = Gadget::whereMonth('created_at', Carbon::now()->month)->paginate(12);
    

    //$gadgetsByPage =  $gadgets::paginate(12);
    $categories = Category::get();
    $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;
    $wishlist = Session::has('whislist') ? new wishlist(Session::get('wishlist')) : null;

    if(!$cart){
        if(!$wishlist){
            return view('client.shopbynew', ['product' => null, 'wishItems'=>null ])->with('categories', $categories)->with('gadgets', $gadgets)->with('gadgets', $gadgetsByPage);
        }
        else{
            return view('client.shopbynew', ['product' => null, 'wishItems'=>$wishlist->items ])->with('categories', $categories)->with('gadgets', $gadgets)->with('gadgets', $gadgetsByPage);
        }
    }

    return view('client.shopbynew', ['product' => $cart->items, 'wishItems' => isset($wishlist) ? $wishlist->items : null ])->with('categories', $categories)->with('gadgets', $gadgets)->with('gadgets', $gadgetsByPage);
    
   }


   public function save_profile(Request $request){

    $this->validate($request, ['first-name' => 'required'  , 
                               'last-name' => 'required',
                                    'email' => 'email|required|unique:clients',
                                   'user-password' => 'required|min:4' ,
                                    'birthday' => 'required']);
        $client = new clients();
        $client->firstname = $request -> input('first-name');
        $client->lastname = $request -> input('last-name');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('user-password'));
        $client->birthday = $request->input('birthday');
       
        $client->save();

        return back()->with('status', 'Your profile have been saved successfully !');


   }


   public function thankyou(){


    $gadgets = Gadget::where('status', 1)->get();
    $categories = Category::get();
    $cart = Session::has('cart') ? new ajout_panier(Session::get('cart')) : null;

    if(!$cart){
        return view('client.thankyou', ['product' => null])->with('categories', $categories)->with('gadgets', $gadgets);
    }

    return view('client.thankyou', ['product' => $cart->items])->with('categories', $categories)->with('gadgets', $gadgets);
    
   }


   public function add_to_whish($id){
    $gadgets = Gadget::find($id);

    $oldlist = Session::has('wishlist')?Session::get('wishlist'):null;
    $wishlist = new wishlist($oldlist);
    $wishlist->add($gadgets, $id);

    Session::put('wishlist', $wishlist);


   // dd(Session::get('cart'));

   //return redirect('/shop');

   return back()->with('status', 'Your profile have been saved successfully !');

    
    }


    public function remove_wish_product($id){
        $oldlist = Session::has('wishlist')? Session::get('wishlist'):null;
        $wishlist = new wishlist($oldlist);
        $wishlist->removeItem($id);
       
        if(count($wishlist->items) > 0){
            Session::put('wishlist', $wishlist);
        }
        else{
            Session::forget('wishlist');
        }

        //dd(Session::get('cart'));
        //return redirect('/cart');
    }









   
   

    


    
    

}
