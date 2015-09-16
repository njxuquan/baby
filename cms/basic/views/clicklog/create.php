<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Clicklog */

$this->title = 'Create Clicklog';
$this->params['breadcrumbs'][] = ['label' => 'Clicklogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicklog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
