<?php

namespace App\Providers;

use App\Services\MailchimpNewsLetter;
use App\Services\NewsLetter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Nette\Utils\Paginator as UtilsPaginator;

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
        app()->bind(NewsLetter::class,function(){

           $client=(new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
            return new MailchimpNewsLetter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Paginator::useBootstrap();
    }
}
