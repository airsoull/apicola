<?php

/**
 * This is the model class for table "pro_detalle_venta".
 *
 * The followings are the available columns in table 'pro_detalle_venta':
 * @property integer $id_venta
 * @property integer $id_producto
 * @property integer $cantidad
 * @property integer $total
 *
 * The followings are the available model relations:
 * @property Producto $idProducto
 * @property Venta $idVenta
 */
class DetalleVenta extends CActiveRecord
{
	public $contar, $mes;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetalleVenta the static model class
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
		return 'pro_detalle_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_venta, id_producto, cantidad, total', 'required'),
			array('id_venta, id_producto, cantidad, total', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_venta, id_producto, cantidad, total', 'safe', 'on'=>'search'),
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
			'idProducto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
			'idVenta' => array(self::BELONGS_TO, 'Venta', 'id_venta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_venta' => 'Id Venta',
			'id_producto' => 'Id Producto',
			'cantidad' => 'Cantidad',
			'total' => 'Total',
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

		$criteria->compare('id_venta',$this->id_venta);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}