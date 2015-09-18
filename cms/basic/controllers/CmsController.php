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
            $ext = $image->getExtension();
            $randName = time() . rand(1000, 9999) . "." . $ext;
            //$path = abs(crc32($randName) % 500);
            //$rootPath = $rootPath . $path . "/";
            //if (!file_exists($path)) {
            //    mkdir($rootPath,true);
            //}
            $image->saveAs($rootPath . $randName);
            $model->imgurl = $rootPath.$randName;
            $model->addtime = date('Y-m-d H:i:s');
            $model->status = 1;

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
        $oldimgurl = $model->imgurl;
        $rootPath = "uploads/";
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);
            //die();
            //if ($model->imgurl != '') {
                $image = UploadedFile::getInstance($model, 'imgurl');
                $ext = $image->getExtension();
                $randName = time() . rand(1000, 9999) . "." . $ext;
                $image->saveAs($rootPath . $randName);
                $model->imgurl = $rootPath.$randName;
            //} else {
            //    $model->imgurl = $oldimgurl;
            //}
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
