<?php


namespace Tshafer\SocialShare\Services;

class Gmail extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'https://mail.google.com/mail/?';
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
          'u'    => $link,
          'body' => $text,
          'view' => 'cm',
          'fs'   => '1',
          'to'   => null,
          'ui'   => '2',
          'tf'   => '1',
        ];
    }
}
