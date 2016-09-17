<?php


namespace Tshafer\SocialShare\Services;

class Twitter extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://twitter.com/intent/tweet?';
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
          'url'  => $link,
          'text' => $text,
        ];
    }
}
