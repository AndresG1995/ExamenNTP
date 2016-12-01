<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $idP
 * @property string $nombreP
 * @property double $precio
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreP', 'precio'], 'required'],
            [['precio'], 'number'],
            [['nombreP'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idP' => 'Id P',
            'nombreP' => 'Nombre P',
            'precio' => 'Precio',
        ];
    }
}