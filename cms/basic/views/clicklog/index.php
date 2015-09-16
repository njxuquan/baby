<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClicklogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clicklogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicklog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pageid',
            'cmspositionid',
            'sort',
            'cmsid',
            // 'status',
            'clientip',
            'addtime',
            'source',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
