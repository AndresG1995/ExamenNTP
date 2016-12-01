<?php
 
namespace backend\controllers;
 
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
class ProductoPedidoController extends ActiveController
{
    public $modelClass = 'frontend\models\Pedido';
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
            $model->setAttribute('id_producto', @$_GET['id_producto']);
            $query->andFilterWhere(['like', 'id_producto', $model->id_producto]);
            return $dataProvider;
        }
            ]
                ]
        );
    }
}