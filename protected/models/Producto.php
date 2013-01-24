<?php

/**
 * This is the model class for table "pro_producto".
 *
 * The followings are the available columns in table 'pro_producto':
 * @property integer $id_producto
 * @property string $nombre
 * @property integer $id_tipo
 * @property string $descripcion
 * @property string $descripcion_general
 * @property string $imagen
 * @property integer $stock
 * @property integer $id_um
 * @property integer $precio
 * @property integer $id_activo
 *
 * The followings are the available model relations:
 * @property DetalleVenta[] $detalleVentas
 * @property Activo $idActivo
 * @property Tipo $idTipo
 * @property Um $idUm
 * @property VisitasGeneral[] $visitasGenerals
 * @property VisitasUnicas[] $visitasUnicases
 */
class Producto extends CActiveRecord
{
	public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_tipo, descripcion, descripcion_general, imagen, stock, id_um, precio, id_activo', 'required'),
			array('id_tipo, stock, id_um, precio, id_activo', 'numerical', 'integerOnly'=>true),
			array('image', 'file', 'types'=>'jpg, gif, png, jpeg', 'allowEmpty' => true),
			array('nombre, imagen', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_producto, nombre, id_tipo, descripcion, descripcion_general, imagen, stock, id_um, precio, id_activo', 'safe', 'on'=>'search'),
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
			'detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'id_producto'),
			'idActivo' => array(self::BELONGS_TO, 'Activo', 'id_activo'),
			'idTipo' => array(self::BELONGS_TO, 'proTipo', 'id_tipo'),
			'idUm' => array(self::BELONGS_TO, 'Um', 'id_um'),
			'visitasGenerals' => array(self::HAS_MANY, 'VisitasGeneral', 'id_productos'),
			'visitasUnicases' => array(self::HAS_MANY, 'VisitasUnicas', 'id_producto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'Id Producto',
			'nombre' => 'Nombre',
			'id_tipo' => 'Tipo',
			'descripcion' => 'Descripción',
			'descripcion_general' => 'Descripción General',
			'imagen' => 'Imagen',
			'stock' => 'Cantidad',
			'id_um' => 'Unidad de monto',
			'precio' => 'Precio',
			'id_activo' => 'Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_tipo',$this->id_tipo);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('descripcion_general',$this->descripcion_general,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('id_um',$this->id_um);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('id_activo',$this->id_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}