<?php


namespace Tshafer\SocialShare\Services;

class GooglePlus extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://plus.google.com/share?';
    }

    /**
     * @param string $link
     * @param string $text
     * @param string $media
     *
     * @return array
     */
    public static function getFields($link, $text, $media)
    {
        return [
          'url' => $link,
        ];
    }
}
