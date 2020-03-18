<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 14/03/2020
 * Time: 22:42
 */
namespace shop\Exchange_1C;


use carono\exchange1c\interfaces\GroupInterface;
use yii\db\ActiveRecord;

class Group extends ActiveRecord implements GroupInterface
{
    /**
     * Возвращаем имя поля в базе данных, в котором хранится ID из 1с
     *
     * @return string
     */
    public $name;
    public $parent_id;
    public $accounting_id;


    public static function tableName(): string
    {
        return '{{%shop_categories_1c}}';
    }
    public static function getIdFieldName1c()
    {
        return 'accounting_id';
    }
    /**
     * Создание дерева групп
     * в параметр передаётся массив всех групп (import.xml > Классификатор > Группы)
     * $groups[0]->parent - родительская группа
     * $groups[0]->children - дочерние группы
     *
     * @param \Zenwalker\CommerceML\Model\Group[] $groups
     * @return void
     */
    public static function createTree1c($groups)
    {
        foreach ($groups as $group) {
            self::createByML($group);
            if ($children = $group->getChildren()) {
                self::createTree1c($children);
            }
        }
    }
    /**
     * Создаём группу по модели группы CommerceML
     * проверяем все дерево родителей группы, если родителя нет в базе - создаём
     *
     * @param \Zenwalker\CommerceML\Model\Group $group
     * @return Group|array|null
     */
    public static function createByML(\Zenwalker\CommerceML\Model\Group $group)
    {

        if (!$model = Category_Model::findOne(['accounting_id' => $group->id])) {
            $model = new Category_Model();
            $model->accounting_id = $group->id;
        }
        $model->name = $group->name;
        if ($parent = $group->getParent()) {
            $parentModel = self::createByML($parent);
            $model->parent_id = $parentModel->id;
            unset($parentModel);
        } else {
            $model->parent_id = null;
        }
        $model->save();
        return $model;
    }
}