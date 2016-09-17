<?php


namespace Tshafer\SocialShare;

use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('social-share', function () {
            return new Share();
        });
    }
}
