<?php

/**
 * This is the model class for table "caj_revision_enfermedades".
 *
 * The followings are the available columns in table 'caj_revision_enfermedades':
 * @property integer $id_revision
 * @property integer $id_enfermedades
 *
 * The followings are the available model relations:
 * @property Enfermedades $idEnfermedades
 * @property Revision $idRevision
 */
class RevisionEnfermedades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RevisionEnfermedades the static model class
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
		return 'caj_revision_enfermedades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_revision, id_enfermedades', 'required'),
			array('id_revision, id_enfermedades', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_revision, id_enfermedades', 'safe', 'on'=>'search'),
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
			'idEnfermedades' => array(self::BELONGS_TO, 'Enfermedades', 'id_enfermedades'),
			'idRevision' => array(self::BELONGS_TO, 'Revision', 'id_revision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_revision' => 'Id Revision',
			'id_enfermedades' => 'Id Enfermedades',
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
		$criteria->compare('id_enfermedades',$this->id_enfermedades);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}