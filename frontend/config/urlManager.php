<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['frontendHostInfo'],
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'cache' => false,
    'normalizer' => [
        'class' => 'yii\web\UrlNormalizer',
        'normalizeTrailingSlash' => true,
        'collapseSlashes' => true,
    ],
    'rules' => [
        '' => 'site/index',
        'contact' => 'contact/index',
        'signup' => 'auth/signup/request',
        'signup/<_a:[\w-]+>' => 'auth/signup/<_a>',
        '<_a:login|logout>' => 'auth/auth/<_a>',
        /*Static*/
        'to-partners' => 'site/to-partners',
        'suppliers' => 'site/suppliers',
        'info' => 'site/info',
        /*Static*/
        ['pattern' => 'yandex-market', 'route' => 'market/index', 'suffix' => '.xml'],

        ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
        ['pattern' => 'sitemap-<target:[a-z-]+>-<start:\d+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
        ['pattern' => 'sitemap-<target:[a-z-]+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],

        'cart' => '/shop/cart/index',

        'blog' => 'blog/post/index',
        'blog/tag/<slug:[\w\-]+>' => 'blog/post/tag',
        'blog/post/<slug:[\w\-]+>' => 'blog/post/post',
        'blog/post/<slug:[\w\-]+>/comment' => 'blog/post/comment',
        'blog/<slug:[\w\-]+>' => 'blog/post/category',

        'catalog/page/<page:\d+>' => 'shop/catalog/index',
        'catalog' => 'shop/catalog/index',
        //'brand/<slug:[\w\-]+>' => 'shop/catalog/brand',
        'brand/<id:\d+>' => 'shop/catalog/brand',
//        '<catalog:\w+>' => 'shop/catalog/search',
        ['class' => 'frontend\urls\ExchangeUrlRule'],
        ['class' => 'frontend\urls\ProductUrlRule' ],
        //'<catalog:\w+>/page/<page:\d+>' => 'shop/catalog/index',
        ['class' => 'frontend\urls\CategoryUrlRule'],
        //'catalog/<id:\d+>' => 'shop/catalog/product',

        //'<slug:[\w\-]+>' => 'page/view',
        'cabinet' => 'cabinet/default/index',
        'cabinet/<_c:[\w\-]+>' => 'cabinet/<_c>/index',
        'cabinet/<_c:[\w\-]+>/<id:\d+>' => 'cabinet/<_c>/view',
        'cabinet/<_c:[\w\-]+>/<_a:[\w-]+>' => 'cabinet/<_c>/<_a>',
        'cabinet/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => 'cabinet/<_c>/<_a>',

        //['class' => 'frontend\urls\PageUrlRule'],

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',


    ],
];