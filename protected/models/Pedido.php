<?php

/**
 * This is the model class for table "pedido".
 *
 * The followings are the available columns in table 'pedido':
 * @property integer $IdPedido
 * @property integer $Serie
 * @property integer $Numero
 * @property string $Fecha
 * @property integer $IdCliente
 * @property integer $IdPago
 * @property integer $IVA
 * @property double $GastosEnvio
 * @property integer $Pagado
 * @property integer $IdEstado
 * @property string $DomicilioEnvio
 * @property integer $CPEnvio
 * @property string $PoblacionEnvio
 * @property string $ProvinciaEnvio
 * @property integer $TelefonoEnvio
 *
 * The followings are the available model relations:
 * @property Linea[] $lineas
 * @property Cliente $idCliente
 * @property Estado $idEstado
 * @property FormaPago $idPago
 */
class Pedido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Serie, Numero, Fecha, IdCliente, IdPago, IVA, GastosEnvio, Pagado, IdEstado, DomicilioEnvio, CPEnvio, PoblacionEnvio, ProvinciaEnvio, TelefonoEnvio', 'required'),
			array('Serie, Numero, IdCliente, IdPago, IVA, Pagado, IdEstado, CPEnvio, TelefonoEnvio', 'numerical', 'integerOnly'=>true),
			array('GastosEnvio', 'numerical'),
			array('DomicilioEnvio', 'length', 'max'=>100),
			array('PoblacionEnvio', 'length', 'max'=>60),
			array('ProvinciaEnvio', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdPedido, Serie, Numero, Fecha, IdCliente, IdPago, IVA, GastosEnvio, Pagado, IdEstado, DomicilioEnvio, CPEnvio, PoblacionEnvio, ProvinciaEnvio, TelefonoEnvio', 'safe', 'on'=>'search'),
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
			'lineas' => array(self::HAS_MANY, 'Linea', 'IdPedido'),
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'IdCliente'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'IdEstado'),
			'pago' => array(self::BELONGS_TO, 'FormaPago', 'IdPago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdPedido' => 'Id Pedido',
			'Serie' => 'Serie',
			'Numero' => 'Numero',
			'Fecha' => 'Fecha',
			'IdCliente' => 'Id Cliente',
			'IdPago' => 'Id Pago',
			'IVA' => 'IVA',
			'GastosEnvio' => 'Gastos de Envío',
			'Pagado' => 'Pagado',
			'IdEstado' => 'Id Estado',
			'DomicilioEnvio' => 'Domicilio Envió',
			'CPEnvio' => 'CP Envío',
			'PoblacionEnvio' => 'Población Envío',
			'ProvinciaEnvio' => 'Provincia Envío',
			'TelefonoEnvio' => 'Teléfono Envío',
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

		$criteria->compare('IdPedido',$this->IdPedido);
		$criteria->compare('Serie',$this->Serie);
		$criteria->compare('Numero',$this->Numero);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('IdCliente',$this->IdCliente);
		$criteria->compare('IdPago',$this->IdPago);
		$criteria->compare('IVA',$this->IVA);
		$criteria->compare('GastosEnvio',$this->GastosEnvio);
		$criteria->compare('Pagado',$this->Pagado);
		$criteria->compare('IdEstado',$this->IdEstado);
		$criteria->compare('DomicilioEnvio',$this->DomicilioEnvio,true);
		$criteria->compare('CPEnvio',$this->CPEnvio);
		$criteria->compare('PoblacionEnvio',$this->PoblacionEnvio,true);
		$criteria->compare('ProvinciaEnvio',$this->ProvinciaEnvio,true);
		$criteria->compare('TelefonoEnvio',$this->TelefonoEnvio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pedido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
