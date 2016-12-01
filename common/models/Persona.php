<?php

namespace common\models;

use Yii;

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
            [['id_user', 'idD', 'idP', 'nombreP'], 'required'],
            [['id_user', 'idD', 'idP', 'saldo'], 'integer'],
            [['nombreP'], 'string', 'max' => 50],
            [['idD'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['idD' => 'idD']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['idP'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idP' => 'idP']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'id_user' => 'Id User',
            'idD' => 'Id D',
            'idP' => 'Id P',
            'nombreP' => 'Nombre P',
            'saldo' => 'Saldo',
        ];
    }

//    public function ()
//    {
//        return [
//            'uid' => 'Uid',
//            'id_user' => 'Id User',
//            'idD' => 'Id D',
//            'idP' => 'Id P',
//            'nombreP' => 'Nombre P',
//            'saldo' => 'Saldo',
//        ];
//    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdD0()
    {
        return $this->hasOne(Departamento::className(), ['idD' => 'idD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdP0()
    {
        return $this->hasOne(Producto::className(), ['idP' => 'idP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::className(), ['uid' => 'uid']);
    }
}
