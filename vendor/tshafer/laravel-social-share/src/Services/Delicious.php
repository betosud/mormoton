<?php


namespace Tshafer\SocialShare\Services;

class Delicious extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'http://www.digg.com/submit?';
    }

    /**
     * @param $link
     * @param $text
     * @param $media
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
