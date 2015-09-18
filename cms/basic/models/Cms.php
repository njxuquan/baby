<?php

namespace app\models;

use Yii;
use app\models\Page;

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
            [['title', 'imgurl', 'begindate', 'enddate', 'addtime', 'status', 'pageid', 'cmspositionid', 'sort', 'link', 'content'], 'required', 'message' => '不能为空'],
            [['begindate', 'enddate', 'addtime'], 'safe'],
            [['status', 'pageid', 'cmspositionid', 'sort'], 'integer'],
            [['title', 'content', 'imgurl', 'link'], 'string', 'max' => 512],
            [['tag'], 'string', 'max' => 128],
            [['link'], 'url', 'message'=>'必须是url']
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
}
