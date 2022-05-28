<?php

$middleware = [];
if (class_exists(\Module\Member\Middleware\ApiAuthMiddleware::class)) {
    $middleware[] = \Module\Member\Middleware\ApiAuthMiddleware::class;
}
$router->group([
    'middleware' => $middleware,
], function () use ($router) {

    $router->match(['post'], 'blog/comment/add', 'CommentController@add');

    $router->match(['post'], 'blog/message/add', 'MessageController@add');

});
