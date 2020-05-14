<?php
namespace frontend\controllers;

use shop\Exchange_1C\Category_Model;
use shop\helpers\JgrowlMessageHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'mainOther';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'frontend\captcha\NumberCaptcha',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'foreColor' => 0xDC3545, // цвет символов
                'fontFile' => '@frontend/web/fonts/Beccaria.ttf',
                'minLength' => 3, // минимальное количество символов
                'maxLength' => 3, // максимальное
                'offset' => -12, // расстояние между символами (можно отрицательное)
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'home';
        return $this->render('index');
    }
    public function actionToPartners()
    {
        return $this->render('to-partners');
    }

    public function actionSuppliers()
    {
        return $this->render('suppliers');
    }

    public function actionInfo()
    {
        return $this->render('info');
    }




}


