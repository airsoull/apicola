<?php

/**
 * This is the model class for table "usr_usuario".
 *
 * The followings are the available columns in table 'usr_usuario':
 * @property integer $id_usuario
 * @property string $usuario
 * @property string $password
 * @property string $mail
 * @property string $fecha_ingreso
 * @property integer $id_tipo
 *
 * The followings are the available model relations:
 * @property Persona[] $personas
 * @property Tipo $idTipo
 */
class Usuario extends CActiveRecord
{
	public $passValidar;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usr_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, password, mail, id_tipo, passValidar', 'required'),
			array('usuario, mail', 'unique'),
			array('mail', 'email'),
			array('passValidar', 'compare', 'compareAttribute'=>'password'),
			array('id_tipo', 'numerical', 'integerOnly'=>true),
			array('usuario, password, mail, passValidar', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, usuario, password, mail, fecha_ingreso, id_tipo', 'safe', 'on'=>'search'),
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
			'personas' => array(self::HAS_MANY, 'Persona', 'id_usuario'),
			'idTipo' => array(self::BELONGS_TO, 'Tipo', 'id_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'usuario' => 'Usuario',
			'password' => 'Contraseña',
			'mail' => 'Mail',
			'fecha_ingreso' => 'Fecha Ingreso',
			'id_tipo' => 'Tipo',
			'passValidar' => 'Validar Contraseña',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('id_tipo',$this->id_tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}