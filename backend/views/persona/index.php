<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use app\models\Departamento;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'uid',
            //'id_user',
            ['attribute' => 'id_user',
                'label' => 'Usuario',
                'value' => function($data) {
                return User::findOne(['id'=>$data['id_user']])->username;
                }
            ],
            //'idD',
            ['attribute' => 'idD',
                'label' => 'Departamento',
                'value' => function($data) {
                return Departamento::findOne(['idD'=>$data['idD']])->nombreD;
                }
            ],
            // 'saldo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
