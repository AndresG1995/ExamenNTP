<?php

namespace app\models;

use Yii;
use \yii\helpers\ArrayHelper;
use common\models\User;
/**
 * This is the model class for table "persona".
 *
 * @property integer $uid
 * @property integer $id_user
 * @property integer $idD
 * @property integer $idP
 * @property string $nombreP
 * @property integer $saldo
 *
 * @property Departamento $idD0
 * @property User $idUser
 * @property Producto $idP0
 * @property Registro[] $registros
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'idD',], 'required'],
            [['id_user', 'idD', 'saldo'], 'integer'],
            [['idD'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['idD' => 'idD']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'id_user' => 'Usuario',
            'idD' => 'Departamento',
            'saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdD0()
    {
        return $this->hasOne(Departamento::className(), ['idD' => 'idD']);
    }
public function getComboDepartamentos()
    {
        $model=Departamento::find()->asArray()->all();
        return ArrayHelper::map($model, 'idD', 'nombreD');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    public function getComboUsuarios()
    {
        $model=User::find()->asArray()->all();
        return ArrayHelper::map($model, 'id', 'username');
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::className(), ['uid' => 'uid']);
    }
}
