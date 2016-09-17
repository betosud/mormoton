<?php


namespace Tshafer\SocialShare\Services;

class Tumblr extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'http://www.tumblr.com/share?';
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
          'u' => $link,
          't' => $text,
          'v' => 3,
        ];
    }
}
