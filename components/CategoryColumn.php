<?php


namespace app\components;


use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;

class CategoryColumn extends DataColumn
{
    public $categories;

    public function init()
    {
        parent::init();

        if ($this->categories !== null) {
            $this->filter = ArrayHelper::map($this->categories, 'id', 'name');
        }

    }

    public function getDataCellValue($model, $key, $index)
    {
        if ($this->value !== null) {
            if (is_string($this->value)) {
                return ArrayHelper::getValue($model, $this->value);
            }

            return call_user_func($this->value, $model, $key, $index, $this);
        } elseif ($this->attribute !== null) {
            if ($this->filter !== null) {
                $categoryId = ArrayHelper::getValue($model, $this->attribute);
                $categoryName = $this->filter[$categoryId];
                return $categoryName;
            }

            return ArrayHelper::getValue($model, $this->attribute);
        }

        return null;
    }
}