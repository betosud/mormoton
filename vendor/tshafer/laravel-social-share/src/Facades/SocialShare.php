<?php


namespace Tshafer\SocialShare\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SocialShare.
 */
class SocialShare extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'social-share';
    }
}
