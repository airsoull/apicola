<?php

class ProductoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('anio','index','view', 'create','update', 'admin','delete', 'carga', 'activo', 'activon', 'detalle'),
				'expression'=>$this->acceso(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			$this->setTheme(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Producto;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Producto']))
		{
			$model->attributes=$_POST['Producto'];
			$model->image = CUploadedFile::getInstance($model,'image');
			$model->setAttribute('imagen', $model->image);
			if($model->save()){
				$model->image->saveAs(Yii::getPathOfAlias('webroot').'/imagenes/'.$model->image);
				$this->redirect(array('view','id'=>$model->id_producto));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			$this->setTheme(),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Producto']))
		{
			$model->attributes=$_POST['Producto'];
			$model->image = CUploadedFile::getInstance($model,'image');
			if(!empty($model->image)){
				$model->setAttribute('imagen', $model->image);
				$model->image->saveAs(Yii::getPathOfAlias('webroot').'/imagenes/'.$model->image);
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_producto));
		}

		$this->render('update',array(
			'model'=>$model,
			$this->setTheme(),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Producto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			$this->setTheme(),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Producto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Producto']))
			$model->attributes=$_GET['Producto'];

		$this->render('admin',array(
			'model'=>$model,
			$this->setTheme(),
		));
	}

	public function actionActivo(){
		$dataProvider=new CActiveDataProvider('Producto', array(
    	'criteria'=>array(
        	'condition'=>'id_activo=1'),
    	));

		$this->render('index', array('dataProvider'=>$dataProvider, $this->setTheme()));
	}

	public function actionActivon(){
		$dataProvider=new CActiveDataProvider('Producto', array(
    	'criteria'=>array(
        	'condition'=>'id_activo=2'),
    	));

		$this->render('index', array('dataProvider'=>$dataProvider, $this->setTheme()));
	}

	public function actionDetalle(){
		$model = Venta::model()->findAll(array(
			'select'=>'year(fecha) as fecha',
			'group'=>'year(fecha)',
		));
		$this->render('_detalle', array($this->setTheme(), 'model'=>$model));
	}
	public function actionAnio($id){
		$model = DetalleVenta::model()->with('idVenta')->findAll(array(
			'select'=>'month(fecha) as mes, id_producto, sum(cantidad) as cantidad, sum(t.total) as total',
			'condition'=>'year(fecha) ='.$id,
			'group'=>'month(fecha), id_producto',
		));
		$meses = Venta::model()->findAll();
		$this->render('_anio', array($this->setTheme(), 'model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Producto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
