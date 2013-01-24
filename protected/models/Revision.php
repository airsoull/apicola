<?php

/**
 * This is the model class for table "caj_revision".
 *
 * The followings are the available columns in table 'caj_revision':
 * @property integer $id_revision
 * @property integer $id_cajones
 * @property string $fecha_revision
 * @property string $observacion
 * @property integer $id_estado
 * @property integer $id_comunas
 *
 * The followings are the available model relations:
 * @property Cajones $idCajones
 * @property UsrComunas $idComunas
 * @property Estado $idEstado
 * @property RevisionEnfermedades[] $revisionEnfermedades
 */
class Revision extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Revision the static model class
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
		return 'caj_revision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cajones, observacion, id_estado, id_comunas', 'required'),
			array('id_cajones, id_estado, id_comunas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_revision, id_cajones, fecha_revision, observacion, id_estado, id_comunas', 'safe', 'on'=>'search'),
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
			'idCajones' => array(self::BELONGS_TO, 'Cajones', 'id_cajones'),
			'idComunas' => array(self::BELONGS_TO, 'Comunas', 'id_comunas'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'revisionEnfermedades' => array(self::HAS_MANY, 'RevisionEnfermedades', 'id_revision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_revision' => 'Id Revision',
			'id_cajones' => 'Cajón',
			'fecha_revision' => 'Fecha Revisión',
			'observacion' => 'Observación',
			'id_estado' => 'Estado',
			'id_comunas' => 'Comuna',
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

		$criteria->compare('id_revision',$this->id_revision);
		$criteria->compare('id_cajones',$this->id_cajones);
		$criteria->compare('fecha_revision',$this->fecha_revision,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_comunas',$this->id_comunas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}