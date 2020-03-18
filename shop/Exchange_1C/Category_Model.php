<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 18/03/2020
 * Time: 15:23
 */

namespace shop\Exchange_1C;


use shop\entities\Meta;
use shop\entities\Shop\Category;
use shop\forms\manage\Shop\CategoryForm;
use shop\useCases\manage\Shop\CategoryManageService;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

class Category_Model extends ActiveRecord
{

//    public $name;
//    public $parent_id;
//    public $accounting_id;


    public static function tableName(): string
    {
        return '{{%shop_categories_1c}}';
    }

//    public function rules(): array
//    {
//        return [
//            [['name'], 'required'],
//            [['parent_id'], 'integer'],
//            [['name', 'accounting_id'], 'string', 'max' => 255],
//        ];
//    }
public function afterSave($insert, $changedAttributes)
{
    if(!Category::findOne(['name' => $this->name])) {
        if ($this->parent_id != null) {
            if ($this->parent_id == 1) {
                $form = new CategoryForm();
                $form->name = $this->name;
                $form->slug = Inflector::slug($this->name);
                $form->parentId = 1;
                $category = Category::create(
                    $form->name,
                    $form->slug,
                    $form->title,
                    $form->description,
                    new Meta('', '', '')
                );
                $category->appendTo(Category::findOne($form->parentId));
                $category->save();
            } else {
                $categoryT = Category_Model::findOne(['id' => $this->parent_id]);
                $category = Category::findOne(['name' => $categoryT->name]);

                $form = new CategoryForm();
                $form->name = $this->name;
                $form->slug = Inflector::slug($this->name);
                $form->parentId = $category->id;
                $category = Category::create(
                    $form->name,
                    $form->slug,
                    $form->title,
                    $form->description,
                    new Meta('', '', '')
                );
                $category->appendTo(Category::findOne($form->parentId));
                $category->save();
            }
        }
    }
    parent::afterSave($insert, $changedAttributes);
}

    public function transactions():array
{
    return [
        self::SCENARIO_DEFAULT => self::OP_ALL,
    ];
}


}