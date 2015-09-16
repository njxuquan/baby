<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClicklogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clicklog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pageid') ?>

    <?= $form->field($model, 'cmspositionid') ?>

    <?= $form->field($model, 'sort') ?>

    <?= $form->field($model, 'cmsid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'clientip') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'source') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
