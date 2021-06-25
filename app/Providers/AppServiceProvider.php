<?php

namespace App\Providers;

use App\Http\Mixins\ResponseMixins;
use App\Observers\ProductObserver;
use App\Product;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);
        //+998 91 758-94-03
        Str::macro('correctPhone', function($phone){
//            return '+998 '. substr($phone, 0, 2).' '.substr($phone, 2, 3). '-'.substr($phone, 5, 2). '-'.substr($phone, -2, 2);
        return $phone.'cha';
        });

//        ResponseFactory::macro('successJson', function($data){
//            return [
//                'message' => 'Ok',
//                'data' => $data,
//                'success' => true
//            ];
//        });
//
//        ResponseFactory::macro('errorJson', function($error, $code, $message = null){
//            return [
//                'message' => $message?? 'another message',
//                'error' => $error,
//                'code' => $code
//            ];
//        });

        ResponseFactory::mixin(new ResponseMixins());
    }
}
