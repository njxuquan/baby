<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clicklog;

/**
 * ClicklogSearch represents the model behind the search form about `app\models\Clicklog`.
 */
class ClicklogSearch extends Clicklog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pageid', 'cmspositionid', 'sort', 'cmsid', 'status'], 'integer'],
            [['clientip', 'addtime', 'source'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Clicklog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pageid' => $this->pageid,
            'cmspositionid' => $this->cmspositionid,
            'sort' => $this->sort,
            'cmsid' => $this->cmsid,
            'status' => $this->status,
            'addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'clientip', $this->clientip])
            ->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}
