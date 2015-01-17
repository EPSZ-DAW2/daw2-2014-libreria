<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $IdCliente
 * @property string $DomicilioFacturacion
 * @property integer $CPFacturacion
 * @property string $PoblacionFacturacion
 * @property string $ProvinciaFacturacion
 *
 * The followings are the available model relations:
 * @property Usuario $idCliente
 * @property Pedido[] $pedidos
 */
class Cliente extends CActiveRecord
{
	public $nombreCliente;
	public $apellidosCliente;
	public $nifCliente;
	public $emailCliente;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdCliente, DomicilioFacturacion, CPFacturacion, PoblacionFacturacion, ProvinciaFacturacion', 'required'),
			array('IdCliente, CPFacturacion', 'numerical', 'integerOnly'=>true),
			array('DomicilioFacturacion', 'length', 'max'=>100),
			array('PoblacionFacturacion', 'length', 'max'=>60),
			array('ProvinciaFacturacion', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdCliente, nombreCliente, apellidosCliente, nifCliente, emailCliente, DomicilioFacturacion, CPFacturacion, PoblacionFacturacion, ProvinciaFacturacion', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'IdCliente'),
			'pedidos' => array(self::HAS_MANY, 'Pedido', 'IdCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdCliente' => 'Id Cliente',
			'DomicilioFacturacion' => 'Domicilio Facturación',
			'CPFacturacion' => 'CP Facturación',
			'PoblacionFacturacion' => 'Población Facturación',
			'ProvinciaFacturacion' => 'Provincia Facturación',
			'ModificarDatos' => 'Modificar datos',			
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

		$criteria->with = array('usuario');

		$criteria->compare('usuario.Nombre',$this->nombreCliente,true);
		$criteria->compare('usuario.Apellidos',$this->apellidosCliente,true);
		$criteria->compare('usuario.NIF',$this->nifCliente);
		$criteria->compare('usuario.Email',$this->emailCliente);
		$criteria->compare('IdCliente',$this->IdCliente);
		$criteria->compare('DomicilioFacturacion',$this->DomicilioFacturacion,true);
		$criteria->compare('CPFacturacion',$this->CPFacturacion);
		$criteria->compare('PoblacionFacturacion',$this->PoblacionFacturacion,true);
		$criteria->compare('ProvinciaFacturacion',$this->ProvinciaFacturacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'nombreCliente'=>array(
						'asc'=>'usuario.Nombre',
						'desc'=>'usuario.Nombre DESC'
					),
					'apellidosCliente'=>array(
						'asc'=>'usuario.Apellidos',
						'desc'=>'usuario.Apellidos DESC'
					),
					'nifCliente'=>array(
						'asc'=>'usuario.NIF',
						'desc'=>'usuario.NIF DESC'
					),
					'emailCliente'=>array(
						'asc'=>'usuario.emailCliente',
						'desc'=>'usuario.emailCliente DESC'
					),
					'*',
				)
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
