<?php


namespace app\controllers;


use app\models\Category;
use yii\web\Controller;

class SummernoteWidgetController extends Controller
{
    public function actionIndex()
    {
        $model = new Category();
        $model->name = 'Какая-то категория!!!';

        return $this->render('index', ['model' => $model]);
    }
}