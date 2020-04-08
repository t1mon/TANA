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
        if(!Category::findOne(['name' => $this->name])) {
            if ($this->parent_id == null)
            {
                $this->CategoryCreate(1);
            }
            if ($this->parent_id != null)
            {
                $categoryT = CategoryModel1C::findOne(['id' => $this->parent_id]);
                $category =  Category::find()->where(['name' => $categoryT->name])->one();
                if ($category) {
                    $this->CategoryCreate($category->id++);
                }
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }


    public function CategoryCreate($id)
    {
            $form = new CategoryForm();
            $form->name = $this->name;
            $form->slug = Inflector::slug($this->name);
            $form->parentId = $id;
            $category = Category::create(
                $form->name,
                $form->slug,
                $form->title,
                $form->description,
                new Meta('', '', '')
            );
            $category->accounting_id = $this->accounting_id;
            $category->appendTo(Category::findOne($form->parentId));
            $category->save();

    }


    public function transactions():array
    {
            return [
                self::SCENARIO_DEFAULT => self::OP_ALL,
            ];
    }


}