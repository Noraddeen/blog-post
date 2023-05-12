<?php

namespace App\Providers;

use App\Services\IImpementing;
use App\Services\NewClass;
use App\Services\MailchimpNewsletterService;
use App\Services\NewsletterService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('data',fn()=>'data');

        app()->bind(NewsletterService::class,function ($app){
                $client = (new ApiClient())->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => 'us12'
                ]);

                return new MailchimpNewsletterService($client);
        });

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Model::unguard();
        //
    }
}
