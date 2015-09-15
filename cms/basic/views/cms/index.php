<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加Cms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'title',
                'label'=>'标题',
            ],
            [
                'attribute'=>'content',
                'label'=>'简介',
            ],
            [
                'attribute'=>'tag',
                'label'=>'标签',
            ],
            [
                'attribute'=>'link',
                'label'=>'链接',
            ],
            [
                'attribute'=>'begindate',
                'label'=>'开始时间',
            ],
            [
                'attribute'=>'enddate',
                'label'=>'结束时间',
            ],
            // 'addtime',
            // 'status',
            [
                'attribute'=>'imgurl',
                'label'=>'图片url',
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
                'attribute'=>'pageid',
                'label'=>'所在页面',
            ],
            [
                'attribute'=>'cmspositionid',
                'label'=>'cms位置',
            ],
            [
                'attribute'=>'sort',
                'label'=>'cms位置顺序',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
