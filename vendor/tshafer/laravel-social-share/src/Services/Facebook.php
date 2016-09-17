<?php


namespace Tshafer\SocialShare\Services;

class Facebook extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://www.facebook.com/sharer/sharer.php?';
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
          'u'     => $link,
          'title' => $text,
        ];
    }
}
