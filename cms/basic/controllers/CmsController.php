<?php

namespace app\controllers;

use Yii;
use app\models\Cms;
use app\models\CmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Page;
use app\models\Cmsposition;
use app\models\CmspositionSearch;

/**
 * CmsController implements the CRUD actions for Cms model.
 */
class CmsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$pages = Page::find()->all();
		$cmspositions = Cmsposition::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'pages' => $pages,
			'cmspositions' => $cmspositions,
        ]);
    }

    /**
     * Displays a single Cms model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $pagedata = Page::findOne($model->pageid);
        $cmspoaitiondata = Cmsposition::findOne($model->cmspositionid);
        $model->pageid = $pagedata->name;
        $model->cmspositionid = $cmspoaitiondata->name;
        //$model->imgurl = Yii::$app->request->hostInfo.'/'.$model->imgurl;
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Cms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cms();
        $rootPath = "uploads/";
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'imgurl');
			if (empty($image)) {
				$model->addError('imgurl', '请上传图片');
			} else {
				$ext = $image->getExtension();
				$randName = time() . rand(1000, 9999) . "." . $ext;
				$image->saveAs($rootPath . $randName);
				$model->imgurl = $rootPath.$randName;
				$model->addtime = date('Y-m-d H:i:s');
				$model->status = 1;
			}

			if(strtotime($model->enddate) <= strtotime($model->begindate)) {
				$model->addError('begindate', '开始时间不能大于结束时间');
			} else {
				$sql = " select id from cms where pageid=".$model->pageid." and cmspositionid=".$model->cmspositionid." and `sort`=".$model->sort." and ((unix_timestamp(begindate) <= unix_timestamp('".$model->begindate."') and unix_timestamp(enddate) > unix_timestamp('".$model->begindate."')) or (unix_timestamp(begindate) < unix_timestamp('".$model->enddate."') and unix_timestamp(enddate) > unix_timestamp('".$model->enddate."')) or (unix_timestamp('".$model->begindate."') < unix_timestamp(begindate) and unix_timestamp('".$model->enddate."') > unix_timestamp(begindate)) or (unix_timestamp('".$model->begindate."') > unix_timestamp(enddate) and unix_timestamp('".$model->enddate."') < unix_timestamp(enddate))) ";
				$row = Cms::findBySql($sql)->all();
				if (count($row) > 0) {
					$model->addError('begindate', '同一位置同一时间区间内只能有一条投放广告');
				}
			}
			if ($model->hasErrors()) {
				$pagedata = Page::find()->all();
				$cmspoaitiondata = Cmsposition::find()->all();
				return $this->render('create', [
					'model' => $model,
					'pagedata' => $pagedata,
					'cmspoaitiondata' => $cmspoaitiondata,
				]);
			}
			
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $pagedata = Page::find()->all();
            $cmspoaitiondata = Cmsposition::find()->all();
            return $this->render('create', [
                'model' => $model,
                'pagedata' => $pagedata,
                'cmspoaitiondata' => $cmspoaitiondata,
            ]);
        }
    }

    /**
     * Updates an existing Cms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rootPath = "uploads/";
        if ($model->load(Yii::$app->request->post())) {
			$image = UploadedFile::getInstance($model, 'imgurl');
			if (empty($image)) {
				$post = Yii::$app->request->post();
				$hidden_imgurl = $post['hidden_imgurl'];
				if ($hidden_imgurl == '') {
					$model->addError('imgurl', '请上传图片');
				}
				$model->imgurl = $hidden_imgurl;
			} else {
				$ext = $image->getExtension();
				$randName = time() . rand(1000, 9999) . "." . $ext;
				$image->saveAs($rootPath . $randName);
				$model->imgurl = $rootPath.$randName;
			}
			if(strtotime($model->enddate) <= strtotime($model->begindate)) {
				$model->addError('begindate', '开始时间不能大于结束时间');
			} else {
				$sql = " select id from cms where id<>".$model->id." and pageid=".$model->pageid." and cmspositionid=".$model->cmspositionid." and `sort`=".$model->sort." and ((unix_timestamp(begindate) <= unix_timestamp('".$model->begindate."') and unix_timestamp(enddate) > unix_timestamp('".$model->begindate."')) or (unix_timestamp(begindate) < unix_timestamp('".$model->enddate."') and unix_timestamp(enddate) > unix_timestamp('".$model->enddate."')) or (unix_timestamp('".$model->begindate."') < unix_timestamp(begindate) and unix_timestamp('".$model->enddate."') > unix_timestamp(begindate)) or (unix_timestamp('".$model->begindate."') > unix_timestamp(enddate) and unix_timestamp('".$model->enddate."') < unix_timestamp(enddate))) ";
				$row = Cms::findBySql($sql)->all();
				if (count($row) > 0) {
					$model->addError('begindate', '同一位置同一时间区间内只能有一条投放广告');
				}
			}
			if ($model->hasErrors()) {
				$pagedata = Page::find()->all();
				$cmspoaitiondata = Cmsposition::find()->all();
				return $this->render('update', [
					'model' => $model,
					'pagedata' => $pagedata,
					'cmspoaitiondata' => $cmspoaitiondata,
				]);
			}
			//var_dump($model);
			//die();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $pagedata = Page::find()->all();
            $cmspoaitiondata = Cmsposition::find()->all();
            return $this->render('update', [
                'model' => $model,
                'pagedata' => $pagedata,
                'cmspoaitiondata' => $cmspoaitiondata,
            ]);
        }
    }

    /**
     * Deletes an existing Cms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
