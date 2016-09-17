<?php


namespace Tshafer\SocialShare\Services;

/**
 * Class Service.
 */

abstract class Service
{

    /**
     * @param string $link
     * @param string $text
     * @param string $media
     *
     * @return string
     */
    public static function getSchema($link, $text = null, $media = null)
    {
        $query = urldecode(http_build_query(
          static::getFields($link, $text, $media)
        ));

        return static::getUrl() . $query;
    }

    /**
     * @return string
     */
    abstract public static function getUrl();

    /**
     * @param string $link
     * @param string $text
     * @param string $media
     *
     * @return array
     */
    abstract public static function getFields($link, $text, $media);
}
