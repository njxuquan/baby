<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cms */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            [
                'attribute'=>'status',
                'label'=>'状态',
            ],
            [
                'attribute'=>'imgurl',
                'value'=>$model->imgurl,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            //'imgurl:img',
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
        ],
    ]) ?>

</div>
