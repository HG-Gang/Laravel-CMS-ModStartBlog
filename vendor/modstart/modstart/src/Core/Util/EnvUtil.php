<?php

namespace ModStart\Core\Util;

class EnvUtil
{
    public static function env($key)
    {
        switch ($key) {
            case 'uploadMaxSize':
                $upload_max_filesize = @ini_get('upload_max_filesize');
                if (empty($upload_max_filesize)) {
                    return 0;
                }
                $post_max_size = @ini_get('post_max_size');
                if (empty($post_max_size)) {
                    return 0;
                }
                $upload_max_filesize = FileUtil::formattedSizeToBytes($upload_max_filesize);
                $post_max_size = FileUtil::formattedSizeToBytes($post_max_size);
                $size = min($upload_max_filesize, $post_max_size);
                                $size -= 10 * 1024;
                                return max($size, 100 * 1024);
        }
        return null;
    }

    public static function iniFileConfig($key)
    {
        return @ini_get($key);
    }
}
