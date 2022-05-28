<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace EasyWeChat\OpenPlatform\CodeTemplate;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['code_template'] = function ($app) {
            return new Client($app);
        };
    }
}