<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clicklog".
 *
 * @property integer $id
 * @property integer $pageid
 * @property integer $cmspositionid
 * @property integer $sort
 * @property integer $cmsid
 * @property integer $status
 * @property string $clientip
 * @property string $addtime
 * @property string $source
 */
class Clicklog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clicklog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pageid', 'cmspositionid', 'sort', 'cmsid', 'status', 'clientip', 'addtime', 'source'], 'required'],
            [['pageid', 'cmspositionid', 'sort', 'cmsid', 'status'], 'integer'],
            [['addtime'], 'safe'],
            [['clientip', 'source'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pageid' => 'Pageid',
            'cmspositionid' => 'Cmspositionid',
            'sort' => 'Sort',
            'cmsid' => 'Cmsid',
            'status' => 'Status',
            'clientip' => 'Clientip',
            'addtime' => 'Addtime',
            'source' => 'Source',
        ];
    }
}
