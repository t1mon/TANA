<?php

namespace shop\forms\Shop;

use shop\entities\Shop\Product\Modification;
use shop\entities\Shop\Product\Product;
use shop\Exchange_1C\Model\SpecificationModel;
use shop\helpers\PriceHelper;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class AddToCartForm extends Model
{
    public $modification;
    public $quantity;
    public $check;

    private $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->_product = $product;
        $this->quantity = 0;
        parent::__construct($config);
    }

    public function attributeLabels()
    {
        return  [
            'modification' => 'Модельный ряд'
        ];
    }

    public function rules(): array
    {
        return array_filter([
            $this->_product->modifications ? ['modification', 'required', 'whenClient' => "function (attribute, value) {
            if (value == ''){ 
                $.jGrowl(\"Необходимо выбрать Модельный ряд!\", { life:'7000', theme: 'jgrowl warning',position: 'top-right' });
                }
            return true;
    }"] : false,
            ['quantity', 'required','whenClient' => "function (attribute, value) { 
                if ( value == 0 ) $.jGrowl('Количество должно быть больше 0',{ life:'7000', theme: 'jgrowl danger',position: 'top-right' }) 
             
                }"],
            ['quantity', 'integer', 'max' => $this->_product->quantity , 'min' => 1],
        ]);
    }

    public function modificationsList(): array
    {
        return ArrayHelper::map($this->_product->modifications, 'id', function (Modification $modification) {
            return  $modification->name . "&nbsp;". PriceHelper::format($modification->price ?: $this->_product->price_new);
        });
    }

    public function otherModificationList(): array
    {

        $modArr = [];
        foreach ($this->_product->modifications as $modification){
            $modArr [] = ArrayHelper::map($modification->specifications1c->offerspecifications,'specification_id','value');
        }
        $result = [];
        foreach ($modArr as $item){
            foreach ($item as $key=>$value) {
                    if ($key !== 1 && $key !== 4) {$result [$key] = $value;}
            }
        }
        return $result;
    }

    public function modificationsList1C() : array
    {
        return ArrayHelper::map($this->_product->modifications, 'id', function (Modification $modification,$name) {
            $modArr = ArrayHelper::map($modification->specifications1c->offerspecifications,'specification_id','value');
            foreach ($this->indexSpecification() as $value){
                if (isset($modArr[$value]))
                $name .= $modArr[$value] . " ";
            }
            return  $name;
        });
    }

    public function getModificationPrice($id)
    {
        return Modification::findOne($id)->price;
    }

    private function indexSpecification()
    {
        $array = [];
        $specifications = SpecificationModel::find()->asArray()->all();
        foreach ($specifications as $item => $specification){
            foreach ($specification as $key => $value)
            {
                if ($key == 'name') $specifications[$item][$key] = trim(preg_replace('/\d/', '', $specification[$key]));
                if ($value == 'Цвет' || $value == 'Размер') $array [] = $specification['id'];
            }
            if ($specifications[$item]['name'] == 'Цвет' || $specifications[$item]['name'] == 'Размер' )
            {
                $array[] = $specifications[$item]['id'];
            }
        }
        return $array;
    }

}