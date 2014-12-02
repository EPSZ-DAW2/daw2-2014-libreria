<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $IdUsuario
 * @property string $Email
 * @property string $Password
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $NIF
 * @property integer $Telefono
 * @property integer $Bloqueado
 * @property string $FechaRegistro
 * @property integer $Revisado
 *
 * The followings are the available model relations:
 * @property Authitem[] $authitems
 * @property Cliente $cliente
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Email, Password, Nombre, Apellidos, NIF, Bloqueado, FechaRegistro, Revisado', 'required'),
			array('Telefono, Bloqueado, Revisado', 'numerical', 'integerOnly'=>true),
			array('Email, Nombre', 'length', 'max'=>50),
			array('Password', 'length', 'max'=>30),
			array('Apellidos', 'length', 'max'=>80),
			array('NIF', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuario, Email, Password, Nombre, Apellidos, NIF, Telefono, Bloqueado, FechaRegistro, Revisado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'authitems' => array(self::MANY_MANY, 'Authitem', 'authassignment(userid, itemname)'),
			'cliente' => array(self::HAS_ONE, 'Cliente', 'IdCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuario' => 'Id Usuario',
			'Email' => 'Email',
			'Password' => 'Password',
			'Nombre' => 'Nombre',
			'Apellidos' => 'Apellidos',
			'NIF' => 'Nif',
			'Telefono' => 'Telefono',
			'Bloqueado' => 'Bloqueado',
			'FechaRegistro' => 'Fecha Registro',
			'Revisado' => 'Revisado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdUsuario',$this->IdUsuario);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellidos',$this->Apellidos,true);
		$criteria->compare('NIF',$this->NIF,true);
		$criteria->compare('Telefono',$this->Telefono);
		$criteria->compare('Bloqueado',$this->Bloqueado);
		$criteria->compare('FechaRegistro',$this->FechaRegistro,true);
		$criteria->compare('Revisado',$this->Revisado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
