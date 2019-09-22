<?php


namespace app\controllers;


use yii\web\Controller;

class FormatterController extends Controller
{
    public function actionIndex()
    {
        $phoneNumberFromDb = 89991234567;
        return $this->render('index', ['phoneNumber' => $phoneNumberFromDb]);
    }
}