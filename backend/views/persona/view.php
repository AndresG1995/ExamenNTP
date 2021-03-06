<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use app\models\Departamento;
/* @var $this yii\web\View */
/* @var $model common\models\Persona */

$this->title = $model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'uid',
            //'id_user',
            [
                'label'=>'Usuario',
                'value'=> User::findOne(['id'=>$model->id_user])->username
            ],
            //'idD',
            [
                'label'=>'Usuario',
                'value'=> Departamento::findOne(['idD'=>$model->idD])->nombreD
            ],
            'saldo',
        ],
    ]) ?>

</div>
