<?php

/**
 * This is the model class for table "usr_regiones".
 *
 * The followings are the available columns in table 'usr_regiones':
 * @property integer $id_regiones
 * @property string $nombre
 * @property integer $orden
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Comunas[] $comunases
 * @property Persona[] $personas
 */
class Regiones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Regiones the static model class
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
		return 'usr_regiones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_regiones, nombre, orden, activo', 'required'),
			array('id_regiones, orden, activo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_regiones, nombre, orden, activo', 'safe', 'on'=>'search'),
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
			'comunases' => array(self::HAS_MANY, 'Comunas', 'id_regiones'),
			'personas' => array(self::HAS_MANY, 'Persona', 'id_regiones'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_regiones' => 'Id Regiones',
			'nombre' => 'Nombre',
			'orden' => 'Orden',
			'activo' => 'Activo',
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

		$criteria->compare('id_regiones',$this->id_regiones);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}