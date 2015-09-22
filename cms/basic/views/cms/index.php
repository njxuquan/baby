<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

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
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'title',
                'label'=>'标题',
				//'options'=>array('width'=>"200px"), 
            ],
            [
                'attribute'=>'content',
                'label'=>'简介',
				//'options'=>array('width'=>"200px"), 
            ],
            [
                'attribute'=>'tag',
                'label'=>'标签',
				//'options'=>array('width'=>"80px"), 
            ],
            [
                'attribute'=>'link',
                'label'=>'链接',
				//'options'=>array('width'=>"10px"), 
            ],
            [
                'attribute'=>'begindate',
                'label'=>'开始时间',
				//'options'=>array('width'=>"100px"), 
            ],
            [
                'attribute'=>'enddate',
                'label'=>'结束时间',
				//'options'=>array('width'=>"100px"), 
            ],
            // 'addtime',
            // 'status',
            [
                'attribute'=>'imgurl',
                'label'=>'图片url',
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
			[
				'label' => '所在页面', 
				'attribute' => 'page.name', 
				'filter' => Html::activeDropDownList($searchModel, 'page_name', ArrayHelper::map($pages, 'id', 'name'), ['prompt' => 'All'])
			],
			[
				'label' => 'cms位置', 
				'attribute' => 'cmsposition.name', 
				//'filter' => Html::activeTextInput($searchModel, 'cmsposition_name',['class'=>'form-control'])
				'filter' => Html::activeDropDownList($searchModel, 'cmsposition_name', ArrayHelper::map($cmspositions, 'id', 'name'), ['prompt' => 'All'])
			],
            [
                'attribute'=>'sort',
                'label'=>'cms位置顺序',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
