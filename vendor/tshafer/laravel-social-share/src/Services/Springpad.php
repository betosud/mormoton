<?php


namespace Tshafer\SocialShare\Services;

class Springpad extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://springpadit.com/s?';
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
          'name' => $text,
          'type' => 'lifemanagr.Bookmark',
        ];
    }
}
