<?php


namespace app\models;

use yii\data\ArrayDataProvider;

class ProductSearch extends Product
{
    private $models;
    private $_filtered = false;

    public function __construct($models, $config = [])
    {
        parent::__construct($config);
        $this->models = $models;
    }

    public function search($params)
    {
        if ($this->load($params) && $this->validate()) {
            $this->_filtered = true;
        }

        return new ArrayDataProvider([
            'allModels' => $this->filterModels(),
            'sort' => [
                'attributes' => ['id', 'categoryId', 'price', 'hidden'],
            ]
        ]);
    }

    protected function filterModels()
    {
        $data = $this->models;

        if ($this->_filtered) {
            $data = array_filter($data, function ($value) {
                $conditions = [true];
                if (!empty($this->id)) {
                    $conditions[] = strpos($value['id'], $this->id) !== false;
                }
                if (!empty($this->categoryId)) {
                    $conditions[] = strpos($value['categoryId'], $this->categoryId) !== false;
                }
                if (!empty($this->price)) {
                    $conditions[] = strpos($value['price'], $this->price) !== false;
                }
                if (isset($this->hidden) && $this->hidden !== '') {
                    $conditions[] = strpos($value['hidden'], $this->hidden) !== false;
                }
                return array_product($conditions);
            });
        }

        return $data;
    }
}