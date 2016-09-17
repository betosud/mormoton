<?php


namespace Tshafer\SocialShare\Services;

class Digg extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://delicious.com/post?';
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
          'url'   => $link,
          'title' => $text,
        ];
    }
}
