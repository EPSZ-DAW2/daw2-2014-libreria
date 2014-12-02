<?php

/**
 * This is the model class for table "linea".
 *
 * The followings are the available columns in table 'linea':
 * @property integer $IdLinea
 * @property integer $IdPedido
 * @property integer $IdLibro
 * @property integer $Cantidad
 * @property double $Precio
 * @property double $Importe
 *
 * The followings are the available model relations:
 * @property Libro $idLibro
 * @property Pedido $idPedido
 */
class Linea extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdPedido, IdLibro, Cantidad, Precio, Importe', 'required'),
			array('IdPedido, IdLibro, Cantidad', 'numerical', 'integerOnly'=>true),
			array('Precio, Importe', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdLinea, IdPedido, IdLibro, Cantidad, Precio, Importe', 'safe', 'on'=>'search'),
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
			'libro' => array(self::BELONGS_TO, 'Libro', 'IdLibro'),
			'pedido' => array(self::BELONGS_TO, 'Pedido', 'IdPedido'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdLinea' => 'Id Linea',
			'IdPedido' => 'Id Pedido',
			'IdLibro' => 'Id Libro',
			'Cantidad' => 'Cantidad',
			'Precio' => 'Precio Unitario',
			'Importe' => 'Importe Total',
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

		$criteria->compare('IdLinea',$this->IdLinea);
		$criteria->compare('IdPedido',$this->IdPedido);
		$criteria->compare('IdLibro',$this->IdLibro);
		$criteria->compare('Cantidad',$this->Cantidad);
		$criteria->compare('Precio',$this->Precio);
		$criteria->compare('Importe',$this->Importe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Linea the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
