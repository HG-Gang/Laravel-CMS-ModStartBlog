<?php


namespace Module\Banner\Biz;


use Module\Vendor\Biz\BizTrait;

class BannerPositionBiz
{
    use BizTrait;

    
    public static function all()
    {
        return self::listAll();
    }

    
    public static function get($name)
    {
        return self::getByName($name);
    }
}
