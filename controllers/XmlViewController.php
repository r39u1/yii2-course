<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use app\models\ProductSearch;
use Yii;
use yii\base\Model;
use yii\web\Controller;

class XmlViewController extends Controller
{
    public function actionIndex()
    {
        $products = $this->modelsFromXml(Product::class, '@app/xml-files/products.xml');
        $categories = $this->modelsFromXml(Category::class, '@app/xml-files/categories.xml');

        $searchModel = new ProductSearch($products);
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'categories' => $categories,
        ]);
    }

    private function modelsFromXml($modelClass, $filePath)
    {
        $file = file_get_contents(Yii::getAlias($filePath));
        $xml = simplexml_load_string($file, "SimpleXMLElement", LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), true);
        $array = $array[array_key_first($array)];

        $models = [];
        foreach ($array as $item) {
            $models[] = new $modelClass();
        }

        Model::loadMultiple($models, $array, '');

        return $models;
    }
}