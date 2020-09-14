<?php

namespace frontend\controllers\shop;

use shop\entities\Shop\Product\Modification;
use shop\forms\Shop\AddToCartForm;
use shop\helpers\JgrowlMessageHelper;
use shop\readModels\Shop\ProductReadRepository;
use shop\useCases\Shop\CartService;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CartController extends Controller
{
    public $layout = 'mainOther';
    //public $enableCsrfValidation = false;

    private $products;
    private $service;

    public function __construct($id, $module, CartService $service, ProductReadRepository $products, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->products = $products;
        $this->service = $service;
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'quantity' => ['POST'],
                    'remove' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $cart = $this->service->getCart();

        return $this->render('index', [
            'cart' => $cart,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionAddAjax()
    {
        //Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax){
                $data = json_decode(file_get_contents('php://input'),true);
                foreach ($data as $d) {
                    try{
                        $this->service->add($d['productId'], $d['modId'], $d['val']);
                    }catch (\Exception $e)
                    {
                        return $e->getMessage();
                    }
                }
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
            return true;
        }
    }

    public function actionQtyGet()
    {
        //Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax){
            //$data = Yii::$app->request->post();
            $data = file_get_contents('php://input');
            $mod  = Modification::findOne($data);
            return $mod->quantity;
        }
        return ['error' => 'ERROR'];
    }

    public function actionAdd($id)
    {
        if (!$product = $this->products->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if (!$product->modifications) {
            try {
                $this->service->add($product->id, null, 1);
                Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
                return $this->redirect(Yii::$app->request->referrer);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        //$this->layout = 'blank';

        $form = new AddToCartForm($product);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->add($product->id, $form->modification, $form->quantity);
                Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
                return $this->redirect(Yii::$app->request->referrer);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        Yii::$app->session->setFlash('warning', 'Необходимо выбрать модельный ряд товара!');
        return $this->redirect(['shop/catalog/product', 'id' => $product->id]);
//        return $this->render('add', [
//            'product' => $product,
//            'model' => $form,
//        ]);
    }

    public function actionSetCommentItems(){
        if (Yii::$app->request->isAjax){
            $data = json_decode(file_get_contents('php://input'),true);
            $this->service->setComment(Html::encode($data['id']),Html::encode($data['comment']));
            return $data['id'];
        }
        return ['error' => 'Error added comment!'];

    }


    /**
     * @param $id
     * @return mixed
     */
    public function actionQuantity($id)
    {
        //$this->enableCsrfValidation = false;
        try {
            $this->service->set($id, (int)Yii::$app->request->post('quantity'));
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function actionRemove($id)
    {
        try {
            $this->service->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        //return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionClear()
    {
        try {
            $this->service->clear();
            Yii::$app->session->setFlash('info', '<strong>Корзина</strong> очищена!');
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}