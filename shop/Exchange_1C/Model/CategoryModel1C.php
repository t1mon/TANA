<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 18/03/2020
 * Time: 15:23
 */

namespace shop\Exchange_1C\Model;


use shop\entities\Meta;
use shop\entities\Shop\Category;
use shop\forms\manage\Shop\CategoryForm;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

class CategoryModel1C extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%shop_categories_1c}}';
    }

    public function afterSave($insert, $changedAttributes)
    {
        if(!Category::findOne(['accounting_id' => $this->accounting_id])) {
            if ($this->parent_id == null)
            {
                $this->CategoryCreate(1);
            }
            if ($this->parent_id != null)
            {
                $categoryT = CategoryModel1C::findOne(['id' => $this->parent_id]);
                $category =  Category::find()->where(['accounting_id' => $categoryT->accounting_id])->one();
                if ($category) {
                    $this->CategoryCreate($category->id);
                }
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }


    public function CategoryCreate($id)
    {
            $category = Category::create(
                $this->name,
                Inflector::slug($this->name),
                '',
                '',
                new Meta('', '', '')
            );
            $category->accounting_id = $this->accounting_id;
            $category->appendTo(Category::findOne($id));
            $category->save();
            unset($category);

    }

//    public function updateCategory(Category $category){
//        $category->updateAttributes(['name' => $this->name ]);
//    }
    public function getCategory(){
        return $this->hasOne(Category::class,['accounting_id' => 'accounting_id']);
    }

    public function transactions():array
    {
            return [
                self::SCENARIO_DEFAULT => self::OP_ALL,
            ];
    }


}