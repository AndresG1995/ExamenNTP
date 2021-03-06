<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList($model->ComboUsuarios)->label('Usuario') ?>

    <?= $form->field($model, 'idD')->dropDownList($model->ComboDepartamentos)->label('Departamento') ?>

    <!--?= $form->field($model, 'idP')->textInput() ?-->

    <!--?= $form->field($model, 'nombreP')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'saldo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
