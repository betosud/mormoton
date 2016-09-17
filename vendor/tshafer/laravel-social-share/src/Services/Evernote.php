<?php


namespace Tshafer\SocialShare\Services;

class Evernote extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'http://www.evernote.com/clip.action?';
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
