<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Cms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-form">

    <?php $form = ActiveForm::begin([
                    'id' => "cms-form",
                    'enableAjaxValidation' => false,
                    'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'title', ['labelOptions' => ['label' => '标题']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content', ['labelOptions' => ['label' => '简介']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag', ['labelOptions' => ['label' => '标签']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link', ['labelOptions' => ['label' => '链接']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begindate', ['labelOptions' => ['label' => '开始时间']])->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => true, 
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'enddate', ['labelOptions' => ['label' => '结束时间']])->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => true, 
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'imgurl', ['labelOptions' => ['label' => '图片url']])->fileInput() ?>
	<?php
		echo Html::hiddenInput('hidden_imgurl', $value = $model->imgurl);
	?>

    <?= $form->field($model, 'pageid', ['labelOptions' => ['label' => '所在页面']])->dropDownList(ArrayHelper::map($pagedata, 'id', 'name')) ?>

    <?= $form->field($model, 'cmspositionid', ['labelOptions' => ['label' => 'cms位置']])->dropDownList(ArrayHelper::map($cmspoaitiondata, 'id', 'name')) ?>

    <?= $form->field($model, 'sort', ['labelOptions' => ['label' => 'cms位置顺序']])->dropDownList(['1' => '1',
                                                    '2' => '2',
                                                    '3' => '3',
                                                    '4' => '4',
                                                    '5' => '5',
                                                    '6' => '6',
                                                    '7' => '7',
                                                    '8' => '8',
                                                    '9' => '9',]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
