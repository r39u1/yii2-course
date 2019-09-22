<?php


namespace app\models;


use yii\base\Model;

class Category extends Model
{
    public $id;
    public $name;

    public function rules()
    {
        return [
            [['id', 'name'], 'safe'],
        ];
    }
}