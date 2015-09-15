<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmsposition".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pageid
 * @property integer $status
 */
class Cmsposition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmsposition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pageid', 'status'], 'required'],
            [['pageid', 'status'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pageid' => 'Pageid',
            'status' => 'Status',
        ];
    }
}
