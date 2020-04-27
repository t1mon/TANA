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
            //'on afterProductSync' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterProductSync'],
            //'on afterUpdateProduct' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterUpdateProduct'],
            'on afterOfferSync' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterOfferSync'],
            //'on afterUpdateOffer' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterUpdateOffer'],
            'on afterFinishUploadFile' => [\shop\Exchange_1C\LoadDataBaseShop\ProductLoad::class, 'afterFinishUploadFile'],
            'auth' => function ($username, $password) {
                if($user = \shop\entities\User\User::findByUsername($username)){
                    if($user->validatePassword($password)){
                        return $user;
                    }
                }
                return false;
            },
            'bootstrapUrlRule' => false,
            'debug' => false,
            //'timeLimit' => 7200
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
        ],
    ],
];
