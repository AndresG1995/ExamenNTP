<?php
 
namespace frontend\controllers;
 
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
class PersonaPedidoController extends ActiveController
{
    public $modelClass = 'common\models\Persona';
    public function actions() {
        return array_merge(
                parent::actions(), [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'prepareDataProvider' => function ($action) {
            /* @var $model Post */
            $model = new $this->modelClass;
            $query = $model::find();
            $dataProvider = new ActiveDataProvider(['query' => $query]);
            $model->setAttribute('id_user', @$_GET['id_user']);
            $query->andFilterWhere(['like', 'id_user', $model->id_user]);
            return $dataProvider;
        }
            ]
                ]
        );
    }
}