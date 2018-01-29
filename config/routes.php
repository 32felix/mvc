<?php

/**

 * Created by PhpStorm.

 * User: Івася

 * Date: 23.07.2017

 * Time: 15:11

 */



return [

    'task/edit/([0-9]+)' => 'task/edit/$1',

    'task/create' => 'task/create',

    '([\d]+)/([A-Za-z\+]+)' => 'site/index/$1/$2',

    '([\d]+)' => 'site/index/$1',

    'site/login' => 'site/login',

    'site/logout' => 'site/logout',

    '' => 'site/index',





];