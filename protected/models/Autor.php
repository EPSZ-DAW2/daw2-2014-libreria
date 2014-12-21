<?php

/**
 * This is the model class for table "autor".
 *
 * The followings are the available columns in table 'autor':
 * @property integer $IdAutor
 * @property string $Nombre
 * @property integer $IdNacionalidad
 * @property string $Web
 *
 * The followings are the available model relations:
 * @property Nacionalidad $idNacionalidad
 * @property Libro[] $libros
 */
class Autor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'autor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, IdNacionalidad', 'required'),
			array('IdNacionalidad', 'numerical', 'integerOnly'=>true),
			array('IdNacionalidad', 'exist', 'className' => 'Nacionalidad'),
			array('Nombre, Web', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdAutor, Nombre, IdNacionalidad, Web', 'safe', 'on'=>'search'),
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
			'nacionalidad' => array(self::BELONGS_TO, 'Nacionalidad', 'IdNacionalidad'),
			'libros' => array(self::MANY_MANY, 'Libro', 'libro_autor(IdAutor, IdLibro)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdAutor' => 'Id Autor',
			'Nombre' => 'Nombre',
			'IdNacionalidad' => 'Nacionalidad',
			'Web' => 'Página Web',
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

		$criteria->compare('IdAutor',$this->IdAutor);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('IdNacionalidad',$this->IdNacionalidad);
		$criteria->compare('Web',$this->Web,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Autor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
