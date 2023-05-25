<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Gadget;
use App\Category;
use App\commande;
use App\User;
use Stripe\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('nbProduct', $this->nbProduct());

            $categories = Category::all();

            $nbProductBycat = [];

            foreach ($categories as $category) {
                $nbProductBycat[$category->category_name] = $this->nbProductBycat($category->category_name);
            }

            $view->with('nbProductBycat', $nbProductBycat);
            $view->with('categories', $categories);
            $view->with('nbOrder', $this->nbOrder());
            $view->with('nbUser', $this->nbUsers());
            $view->with('revenue', $this->getRevenue());
        });
    }

    public function nbProduct()
    {
        $nb = Gadget::count();
        return $nb;
    }

    public function nbProductBycat($category)
    {
        $nb = Gadget::where('gadget_category', $category)->count();
        return $nb;
    }

    public function nbOrder(){
        $nb = commande::count();
        return $nb;
    }

    public function nbUsers(){
        $nb = User::count();
        return $nb;
    }


   

    public function getRevenue()
    {
        Stripe::setApiKey('sk_test_51MzSfCJ2LM8AStyJB7MeHuOwAGcxFrkzxr1wBE0hXITjLbUAwFgzDC3kehm2vokEISwCrC20RitFslZoZkJSxkhT008XLalyJX');

        // Utilisez l'API Stripe pour récupérer les revenus
        $revenue = \Stripe\Balance::retrieve()['available'][0]['amount'];

        return  $revenue;
    }

    public function getNewArrival($category){
        $gadgetsArrival = Gadget::whereMonth('created_at', Carbon::now()->month)
        ->where('category', $category)
        ->get();

    }

    

   
}

