<?php


namespace app\models;


use yii\base\Model;

class Product extends Model
{
    public $id;
    public $categoryId;
    public $price;
    public $hidden;

    public function rules()
    {
        return [
            [['id', 'categoryId', 'price', 'hidden'], 'safe'],
        ];
    }
}