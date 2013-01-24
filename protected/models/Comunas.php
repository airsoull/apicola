<?php

/**
 * This is the model class for table "usr_comunas".
 *
 * The followings are the available columns in table 'usr_comunas':
 * @property integer $id_comunas
 * @property string $nombre
 * @property integer $id_regiones
 *
 * The followings are the available model relations:
 * @property Regiones $idRegiones
 * @property Persona[] $personas
 */
class Comunas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comunas the static model class
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
		return 'usr_comunas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_comunas, nombre, id_regiones', 'required'),
			array('id_comunas, id_regiones', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_comunas, nombre, id_regiones', 'safe', 'on'=>'search'),
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
			'idRegiones' => array(self::BELONGS_TO, 'Regiones', 'id_regiones'),
			'personas' => array(self::HAS_MANY, 'Persona', 'id_comunas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_comunas' => 'Id Comunas',
			'nombre' => 'Nombre',
			'id_regiones' => 'Id Regiones',
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

		$criteria->compare('id_comunas',$this->id_comunas);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_regiones',$this->id_regiones);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}