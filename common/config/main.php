<?php
return [
    'language' => 'ru-RU',
    'name' => 'My',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'queue',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'exchange' => [
            'class' => \carono\exchange1c\ExchangeModule::class,
            'groupClass' => \shop\Exchange_1C\Group::class,
            'productClass' => \shop\Exchange_1C\Product::class,
            'offerClass' => \shop\Exchange_1C\Offer::class,
            'on afterUpdateProduct' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterUpdateProduct'],
            'auth' => function ($username, $password) {
                if($user = \shop\entities\User\User::findByUsername($username)){
                    if($user->validatePassword($password)){
                        return $user;
                    }
                }
                return false;
            },
            'bootstrapUrlRule' => false,
            'debug' => false
        ]
    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_items}}',
            'itemChildTable' => '{{%auth_item_children}}',
            'assignmentTable' => '{{%auth_assignments}}',
            'ruleTable' => '{{%auth_rules}}',
        ],
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'as log' => 'yii\queue\LogBehavior',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.js' : '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' :         'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
    ],
];
