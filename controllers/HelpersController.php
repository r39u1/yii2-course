<?php


namespace app\controllers;


use yii\helpers\StringHelper;
use yii\web\Controller;

class HelpersController extends Controller
{
    public function actionTruncate()
    {
        $word = 'word';
        $string = $word;
        for ($i = 1; $i < 30; $i++) {
            $string .= ' ' . $word;
        }
        $string = StringHelper::mb_ucfirst($string);

        return $this->render('truncate', ['string' => $string]);
    }

    public function actionCamelize()
    {
        return $this->render('camelize');
    }

    public function actionTransliterate()
    {
        return $this->render('transliterate');
    }
}