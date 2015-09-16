<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clicklog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clicklog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pageid')->textInput() ?>

    <?= $form->field($model, 'cmspositionid')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'cmsid')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'clientip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addtime')->textInput() ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
