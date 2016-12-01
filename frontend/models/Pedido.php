<?php

namespace frontend\models;

use Yii;
use frontend\models\Producto;
use \yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_producto
 * @property integer $cantidad
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'cantidad'], 'required'],
            [['id_user', 'id_producto', 'cantidad'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
        ];
    }
    
        public function getComboProductos()
    {
        $model=Producto::find()->asArray()->all();
        return ArrayHelper::map($model, 'idP', 'nombreP','precio');
    }
}
