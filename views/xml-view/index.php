<?php

use app\components\CategoryColumn;
use yii\grid\GridView;

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'class' => CategoryColumn::className(),
            'attribute' => 'categoryId',
            'label' => 'Category',
            'categories' => $categories,
        ],
        'price',
        [
            'attribute' => 'hidden',
            'filter' => ['0' => 0, '1' => 1],
        ],
    ],
]) ?>