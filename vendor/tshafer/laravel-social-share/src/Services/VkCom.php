<?php


namespace Tshafer\SocialShare\Services;

class VkCom extends Service
{

    /**
     * @return string
     */
    public static function getUrl()
    {
        return 'http://vk.com/share.php?';
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
          'url'     => $link,
          'image'   => $media,
          'title'   => $text,
          'noparse' => 'false',
        ];
    }
}
