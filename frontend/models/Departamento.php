<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $idD
 * @property string $nombreD
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreD'], 'required'],
            [['nombreD'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idD' => 'Id D',
            'nombreD' => 'Nombre D',
        ];
    }
}
