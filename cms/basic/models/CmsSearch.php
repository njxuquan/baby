<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cms;

/**
 * CmsSearch represents the model behind the search form about `app\models\Cms`.
 */
class CmsSearch extends Cms
{
	public $page_name;
	public $cmsposition_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'pageid', 'cmspositionid', 'sort'], 'integer'],
            [['title', 'content', 'tag', 'begindate', 'enddate', 'addtime', 'imgurl', 'link', 'page_name', 'cmsposition_name'], 'safe'],
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
        $query = Cms::find();
		$query->joinWith(['page']);
		$query->joinWith(['cmsposition']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		/*
		$dataProvider->setSort([
			'attributes' => [
				'cmsposition_name' => [
					'asc' => ['cmsposition.name' => SORT_ASC],
					'desc' => ['cmsposition.name' => SORT_DESC],
					'label' => 'test'
				],
			]
		]); 
		*/
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'begindate' => $this->begindate,
            'enddate' => $this->enddate,
            'addtime' => $this->addtime,
            'status' => $this->status,
            'cms.pageid' => $this->page_name,
            'cmspositionid' => $this->cmsposition_name,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'imgurl', $this->imgurl]);

        return $dataProvider;
    }
}
