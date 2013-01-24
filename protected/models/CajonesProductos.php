<?php

/**
 * This is the model class for table "cajones_productos".
 *
 * The followings are the available columns in table 'cajones_productos':
 * @property integer $id_cajones
 * @property integer $id_tipo
 * @property integer $cantidad
 * @property integer $id_um
 *
 * The followings are the available model relations:
 * @property CajCajones $idCajones
 * @property ProTipo $idTipo
 * @property ProUm $idUm
 */
class CajonesProductos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CajonesProductos the static model class
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
		return 'cajones_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cajones, id_tipo, cantidad, id_um', 'required'),
			array('id_cajones, id_tipo, cantidad, id_um', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cajones, id_tipo, cantidad, id_um', 'safe', 'on'=>'search'),
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
			'idCajones' => array(self::BELONGS_TO, 'CajCajones', 'id_cajones'),
			'idTipo' => array(self::BELONGS_TO, 'ProTipo', 'id_tipo'),
			'idUm' => array(self::BELONGS_TO, 'ProUm', 'id_um'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cajones' => 'Id Cajones',
			'id_tipo' => 'Id Tipo',
			'cantidad' => 'Cantidad',
			'id_um' => 'Id Um',
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

		$criteria->compare('id_cajones',$this->id_cajones);
		$criteria->compare('id_tipo',$this->id_tipo);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('id_um',$this->id_um);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}