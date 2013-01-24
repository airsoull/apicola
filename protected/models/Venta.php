<?php

/**
 * This is the model class for table "pro_Venta".
 *
 * The followings are the available columns in table 'pro_Venta':
 * @property integer $id_venta
 * @property integer $rut
 * @property string $fecha
 * @property integer $id_regiones
 * @property integer $id_comunas
 * @property string $descripcion
 * @property integer $total
 *
 * The followings are the available model relations:
 * @property UsrComunas $idComunas
 * @property UsrRegiones $idRegiones
 * @property UsrPersona $rut0
 * @property DetalleVenta[] $detalleVentas
 */
class Venta extends CActiveRecord
{
	public $fechas, $cantidad, $semana, $mes, $an, $contar;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Venta the static model class
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
		return 'pro_Venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut, id_regiones, id_comunas, total', 'required'),
			array('rut, id_regiones, id_comunas, total', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_venta, rut, fecha, id_regiones, id_comunas, descripcion, total', 'safe', 'on'=>'search'),
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
			'idComunas' => array(self::BELONGS_TO, 'Comunas', 'id_comunas'),
			'idRegiones' => array(self::BELONGS_TO, 'Regiones', 'id_regiones'),
			'rut0' => array(self::BELONGS_TO, 'Persona', 'rut'),
			'detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'id_venta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_venta' => 'Id Venta',
			'rut' => 'Rut',
			'fecha' => 'Fecha',
			'id_regiones' => 'Id Regiones',
			'id_comunas' => 'Id Comunas',
			'descripcion' => 'Descripción',
			'total' => 'Total',
			'revisado'=>'Revisado',
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
		$criteria->compare('rut',$this->rut);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_regiones',$this->id_regiones);
		$criteria->compare('id_comunas',$this->id_comunas);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}