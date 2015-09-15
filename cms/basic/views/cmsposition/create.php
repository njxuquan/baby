<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cmsposition */

$this->title = 'Create Cmsposition';
$this->params['breadcrumbs'][] = ['label' => 'Cmspositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmsposition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
