<?php

/**
 * This is the model class for table "usr_persona".
 *
 * The followings are the available columns in table 'usr_persona':
 * @property integer $rut
 * @property string $dv
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property integer $id_regiones
 * @property integer $id_comunas
 * @property string $direccion
 * @property integer $telefono
 *
 * The followings are the available model relations:
 * @property Comunas $idComunas
 * @property Regiones $idRegiones
 * @property Usuario $idUsuario
 */
class Persona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Persona the static model class
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
		return 'usr_persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut, dv, id_usuario, nombre, apellido, id_regiones, id_comunas, direccion, telefono', 'required'),
			array('rut, id_usuario, id_regiones, id_comunas, telefono', 'numerical', 'integerOnly'=>true),
			array('dv', 'length', 'max'=>1),
			array('nombre, apellido, direccion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rut, dv, id_usuario, nombre, apellido, id_regiones, id_comunas, direccion, telefono', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut' => 'Rut',
			'dv' => 'Dv',
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'id_regiones' => 'Región',
			'id_comunas' => 'Comuna',
			'direccion' => 'Dirección',
			'telefono' => 'Teléfono',
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

		$criteria->compare('rut',$this->rut);
		$criteria->compare('dv',$this->dv,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('id_regiones',$this->id_regiones);
		$criteria->compare('id_comunas',$this->id_comunas);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}