<?php


namespace Tshafer\SocialShare\Services;

class Pinterest extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'http://pinterest.com/pin/create/button/?';
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
          'url'         => $link,
          'media'       => $text,
          'description' => $text,
        ];
    }
}
