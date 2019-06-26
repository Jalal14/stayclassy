<?php

namespace App\Providers;
use View;
use App\Footer;
use App\Category;
use App\Type;
use App\Layout;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $icon = Layout::first();
        View::share('icon', $icon->icon);
        $publicViews = [
            'public.checkout',
            'public.confirm-order',
            'public.footer-details',
            'public.product-details',
            'public.home',
            'public.product-list',
        ];
        view()->composer($publicViews, function ($view){
            $categories = Category::orderBy('id')
                ->get();
            $types = Type::orderBy('id')
                ->get();
            $footer  = Footer::first();
            $quality = json_decode($footer->quality);
            $quality->column = 'quality';
            $returnPolicy = json_decode($footer->return_policy);
            $returnPolicy->column = 'return_policy';
            $shipping = json_decode($footer->shipping);
            $shipping->column = 'shipping';
            $service = json_decode($footer->service);
            $service->column = 'service';
            $contact = json_decode($footer->contact);
            $policy = json_decode($footer->policy);
            $policy->column = 'policy';
            $about = json_decode($footer->about);
            $about->column = 'about';
           $view->with('categories', $categories)
               ->with('types', $types)
               ->with('quality', $quality)
               ->with('return', $returnPolicy)
               ->with('shipping', $shipping)
               ->with('service', $service)
               ->with('contact', $contact)
               ->with('policy', $policy)
               ->with('about', $about);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
