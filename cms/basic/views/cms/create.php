<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cms */

$this->title = '添加Cms';
$this->params['breadcrumbs'][] = ['label' => 'Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pagedata' => $pagedata,
        'cmspoaitiondata' => $cmspoaitiondata,
    ]) ?>

</div>
