<?php

namespace app\models;

use Yii;
use app\models\Page;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cms".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tag
 * @property string $begindate
 * @property string $enddate
 * @property string $addtime
 * @property integer $status
 * @property string $imgurl
 * @property integer $pageid
 * @property integer $cmspositionid
 * @property integer $sort
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'begindate', 'enddate', 'addtime', 'status', 'pageid', 'cmspositionid', 'sort', 'link', 'content'], 'required', 'message' => '不能为空'],
            [['begindate', 'enddate', 'addtime'], 'safe'],
            [['status', 'pageid', 'cmspositionid', 'sort'], 'integer'],
            [['title', 'content', 'imgurl', 'link'], 'string', 'max' => 512],
            [['tag'], 'string', 'max' => 128],
            [['link'], 'url', 'message'=>'必须是url'],
			//[['imgurl'], 'checkimg', 'on'=>'create,update'],
			//[['begindate'], 'checkdate']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'tag' => 'Tag',
            'link' => 'Link',
            'begindate' => 'Begindate',
            'enddate' => 'Enddate',
            'addtime' => 'Addtime',
            'status' => 'Status',
            'imgurl' => 'Imgurl',
            'pageid' => 'Pageid',
            'cmspositionid' => 'Cmspositionid',
            'sort' => 'Sort',
        ];
    }

	public function getPage(){  
        return $this->hasOne(Page::className() ,['id' => 'pageid']);  
    }

	public function getCmsposition(){  
        return $this->hasOne(Cmsposition::className() ,['id' => 'cmspositionid']);  
    }

	public function checkimg($attribute, $params){
		//var_dump(Yii::$app->request->post());
		$image = yii\web\UploadedFile::getInstance($this, 'imgurl');
		if (empty($image)) {
			$post = Yii::$app->request->post();
			$hidden_imgurl = $post['Cms']['hidden_imgurl'];
			//var_dump($hidden_imgurl);
			//die();
			if ($hidden_imgurl == '') {
				$this->addError($attribute, '请上传图片!');
			}
		}
	}

	public function checkdate($attribute, $params){
		//$oldtag = Cms::model()->findByAttributes(array('tagname'=>$this->tagname));
		//$post = Yii::$app->request->post();
		//$begindate = $post['Cms']['begindate'];
		//$enddate = $post['Cms']['enddate'];
		//if(strtotime($enddate) <= strtotime($begindate)){
			//die('dsfsdf');
		//	$this->addError($attribute, 'sdgdfg');
		//}
		$this->addError($attribute, 'sdgdfg');
		$this->getErrors($attribute);
		//echo '1111';
	}
}
