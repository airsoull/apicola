<?php

/**
 * This is the model class for table "usr_ip".
 *
 * The followings are the available columns in table 'usr_ip':
 * @property integer $id_usuario
 * @property string $ip
 * @property string $fecha
 * @property string $empresa
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 */
class Ip extends CActiveRecord
{
	public $contar;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ip the static model class
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
		return 'usr_ip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, ip', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('ip, empresa', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, ip, fecha, empresa', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'ip' => 'Ip',
			'fecha' => 'Fecha',
			'empresa' => 'Empresa',
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
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('empresa',$this->empresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}