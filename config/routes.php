<?php
/**
 * the returned array has the following structure: ['request_uri' => 'A\Fully\Qualified\Class\Name::methodName']
 */
return [
    '/' => 'App\Controller\Page\PageController::index',
    '/users' => 'App\Controller\User\UserController::index',
    '/admin/users' => 'App\Controller\User\UserController::index',
    '/admin/users/create' => 'App\Controller\User\UserController::create',
    '/admin/users/update' => 'App\Controller\User\UserController::update',
    '/admin/users/delete' => 'App\Controller\User\UserController::delete',
];