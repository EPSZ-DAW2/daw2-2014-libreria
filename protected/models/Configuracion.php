<?php

/**
 * This is the model class for table "configuracion".
 *
 * The followings are the available columns in table 'configuracion':
 * @property string $Campo
 * @property string $Valor
 */
class Configuracion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configuracion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Campo, Valor', 'required'),
			array('Campo, Valor', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Campo, Valor', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Campo' => 'Campo',
			'Valor' => 'Valor',
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

		$criteria->compare('Campo',$this->Campo,true);
		$criteria->compare('Valor',$this->Valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Configuracion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//-----------------------------------------------------
	//Establecer una variable de configuración
	//Uso:
	// if (Configuracion::establecer( $variable, $valor)) ...;
	public static function establecer( $variable, $valor)
	{
		$modelo= new Configuracion;
		$modelo->Campo= $variable;
		$modelo->Valor= $valor;
		return ($modelo->save() !== false);
	}
	
	//-----------------------------------------------------
	//Obtener una varible de configuración.
	//Uso:
	// $valor= Configuracion::obtener( $variable, $defecto);
	public static function obtener( $variable, $defecto)
	{
		$modelo= Configuracion::model()->findByPk( $variable);
		if ($modelo === null) {
			$valor= $defecto;
			self::establecer( $variable, $defecto);
		} else {
			$valor= $modelo->Valor;
		}
		return $valor;
	}
	
	//-----------------------------------------------------
	//Obtener el número de libros por página configurado.
	//Uso:
	// $numero= Configuracion::LibrosPagina();
	public static function LibrosPagina()
	{
		return (int)self::obtener( 'LibrosPagina', 25);
	}
	
	//-----------------------------------------------------
	//Obtener el número de lineas por página configurado.
	//Uso:
	// $numero= Configuracion::LineasPagina();
	public static function LineasPagina()
	{
		return (int)self::obtener( 'LineasPagina', 10);
	}
	
	//-----------------------------------------------------
	//Obtener el tipo de IVA para libros.
	//Uso:
	// $numero= Configuracion::IvaLibros();
	public static function IvaLibros()
	{
		return (int)self::obtener( 'IvaLibros', 21);
	}
	
	
	
}
