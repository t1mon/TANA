<?php
namespace frontend\controllers;

use shop\entities\Shop\Product\Modification;
use shop\Exchange_1C\Category_Model;
use shop\Exchange_1C\Model\PriceModel;
use shop\Exchange_1C\Model\PvOfferPriceModel;
use shop\Exchange_1C\Product;
use shop\helpers\JgrowlMessageHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
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
                'backColor' => 0xF3F3F3,
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
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionThanks()
    {
        return $this->render('thanks');
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

    public function actionTest()
    {
        $_productId = \shop\entities\Shop\Product\Product::find()->andWhere(['accounting_id' => 'a2183361-b78d-11ea-9036-049226d3fd07'])->one()->id;
        $offers = Product::find()->andWhere(['accounting_id' => '2eb66bed-6a76-11ea-901f-049226d3fd07'])->one()->offers;
        //VarDumper::dump($product_1c,3,true);
        foreach ($offers as $offer)
        {
            $priceId = PvOfferPriceModel::find()->andWhere(['offer_id' => $offer->id])->one()['price_id'];
            $price = PriceModel::findOne(['id' => $priceId]);
            $modification = Modification::find()->andWhere(['code' => $offer->accounting_id])->one();
            //echo $price['id']."<br>";
            echo $modification->name." ".$modification->price."<br>";
        }
    }




}


