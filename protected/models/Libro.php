<?php

/**
 * This is the model class for table "libro".
 *
 * The followings are the available columns in table 'libro':
 * @property integer $IdLibro
 * @property string $ISBN
 * @property integer $IdEditorial
 * @property string $Titulo
 * @property string $Edicion
 * @property integer $Paginas
 * @property string $Formato
 * @property integer $IdIdioma
 * @property string $Resumen
 * @property double $Precio
 * @property integer $Stock
 *
 * The followings are the available model relations:
 * @property Editorial $idEditorial
 * @property Idioma $idIdioma
 * @property Autor[] $autors
 * @property Categoria[] $categorias
 * @property Linea[] $lineas
 */
class Libro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'libro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ISBN, IdEditorial, Titulo, IdIdioma, Resumen', 'required'),
			array('IdEditorial, Paginas, IdIdioma, Stock', 'numerical', 'integerOnly'=>true),
			array('Precio', 'numerical'),
			array('ISBN', 'length', 'max'=>13),
			array('Titulo', 'length', 'max'=>100),
			array('Edicion, Formato', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdLibro, ISBN, IdEditorial, Titulo, Edicion, Paginas, Formato, IdIdioma, Resumen, Precio, Stock', 'safe', 'on'=>'search'),
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
			'idEditorial' => array(self::BELONGS_TO, 'Editorial', 'IdEditorial'),
			'idIdioma' => array(self::BELONGS_TO, 'Idioma', 'IdIdioma'),
			'autors' => array(self::MANY_MANY, 'Autor', 'libro_autor(IdLibro, IdAutor)'),
			'categorias' => array(self::MANY_MANY, 'Categoria', 'libro_categoria(IdLibro, IdCategoria)'),
			'lineas' => array(self::HAS_MANY, 'Linea', 'IdLibro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdLibro' => 'Id Libro',
			'ISBN' => 'Isbn',
			'IdEditorial' => 'Id Editorial',
			'Titulo' => 'Titulo',
			'Edicion' => 'Edicion',
			'Paginas' => 'Paginas',
			'Formato' => 'Formato',
			'IdIdioma' => 'Id Idioma',
			'Resumen' => 'Resumen',
			'Precio' => 'Precio',
			'Stock' => 'Stock',
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

		$criteria->compare('IdLibro',$this->IdLibro);
		$criteria->compare('ISBN',$this->ISBN,true);
		$criteria->compare('IdEditorial',$this->IdEditorial);
		$criteria->compare('Titulo',$this->Titulo,true);
		$criteria->compare('Edicion',$this->Edicion,true);
		$criteria->compare('Paginas',$this->Paginas);
		$criteria->compare('Formato',$this->Formato,true);
		$criteria->compare('IdIdioma',$this->IdIdioma);
		$criteria->compare('Resumen',$this->Resumen,true);
		$criteria->compare('Precio',$this->Precio);
		$criteria->compare('Stock',$this->Stock);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Libro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
