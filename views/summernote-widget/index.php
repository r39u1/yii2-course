<?php

use r39u1\summernote\SummernoteWidget;
use yii\widgets\ActiveForm;

?>
<?= SummernoteWidget::widget([
        'name' => 'summernote',
]) ?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->widget(SummernoteWidget::class, [
        'editorOptions' => [
            'height' => '500',
        ],
    ]) ?>
<?php ActiveForm::end(); ?>