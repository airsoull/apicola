<?php

/**
 * This is the model class for table "caj_cajones".
 *
 * The followings are the available columns in table 'caj_cajones':
 * @property integer $id_cajones
 * @property string $codigo_barra
 * @property string $descripcion
 * @property integer $cantidad_marcos
 *
 * The followings are the available model relations:
 * @property Movimientos[] $movimientoses
 * @property Revision[] $revisions
 * @property OnesProductos[] $onesProductoses
 */
class Cajones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cajones the static model class
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
		return 'caj_cajones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo_barra, descripcion, cantidad_marcos', 'required'),
			array('cantidad_marcos', 'numerical', 'integerOnly'=>true),
			array('codigo_barra', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cajones, codigo_barra, descripcion, cantidad_marcos', 'safe', 'on'=>'search'),
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
			'movimientoses' => array(self::HAS_MANY, 'Movimientos', 'id_cajones'),
			'revisions' => array(self::HAS_MANY, 'Revision', 'id_cajones'),
			'onesProductoses' => array(self::HAS_MANY, 'OnesProductos', 'id_cajones'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cajones' => 'Id Cajones',
			'codigo_barra' => 'Código Barra',
			'descripcion' => 'Descripción',
			'cantidad_marcos' => 'Cantidad Marcos',
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
		$criteria->compare('codigo_barra',$this->codigo_barra,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cantidad_marcos',$this->cantidad_marcos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}