<?php

/**
 * This is the model class for table "caj_movimientos".
 *
 * The followings are the available columns in table 'caj_movimientos':
 * @property integer $id_movimientos
 * @property integer $id_cajones
 * @property string $fecha_movimiento
 * @property double $gps_altitud
 * @property double $gps_longitud
 * @property double $gps_altura
 * @property integer $origen
 * @property integer $destino
 *
 * The followings are the available model relations:
 * @property UsrRegiones $destino0
 * @property Cajones $idCajones
 * @property UsrRegiones $origen0
 */
class Movimientos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Movimientos the static model class
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
		return 'caj_movimientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cajones, gps_altitud, gps_longitud, gps_altura, origen, destino', 'required'),
			array('id_cajones, origen, destino', 'numerical', 'integerOnly'=>true),
			array('gps_altitud, gps_longitud, gps_altura', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_movimientos, id_cajones, fecha_movimiento, gps_altitud, gps_longitud, gps_altura, origen, destino', 'safe', 'on'=>'search'),
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
			'destino0' => array(self::BELONGS_TO, 'Comunas', 'destino'),
			'idCajones' => array(self::BELONGS_TO, 'Cajones', 'id_cajones'),
			'origen0' => array(self::BELONGS_TO, 'Comunas', 'origen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_movimientos' => 'Id Movimientos',
			'id_cajones' => 'Cajón',
			'fecha_movimiento' => 'Fecha Movimiento',
			'gps_altitud' => 'Gps Altitud',
			'gps_longitud' => 'Gps Longitud',
			'gps_altura' => 'Gps Altura',
			'origen' => 'Origen',
			'destino' => 'Destino',
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

		$criteria->compare('id_movimientos',$this->id_movimientos);
		$criteria->compare('id_cajones',$this->id_cajones);
		$criteria->compare('fecha_movimiento',$this->fecha_movimiento,true);
		$criteria->compare('gps_altitud',$this->gps_altitud);
		$criteria->compare('gps_longitud',$this->gps_longitud);
		$criteria->compare('gps_altura',$this->gps_altura);
		$criteria->compare('origen',$this->origen);
		$criteria->compare('destino',$this->destino);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}