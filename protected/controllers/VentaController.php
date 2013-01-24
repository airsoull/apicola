<?php

class VentaController extends Controller
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
				'actions'=>array(
					'index', 
					'detalle', 
					'anio', 
					'mes', 
					'anios', 
					'detalleu', 
					'meses', 
					'region', 
					'anior',
					'meser',
					'caca',
					'revisar',
					'revisarid',
					'mesesc',
				),
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
		$model=new Venta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_venta));
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

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_venta));
			}else{
			}
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

		$dataProvider=new CActiveDataProvider('Venta');
		$semana = Venta::model()->findAll(array(
				'select'=>'day(fecha) as fechas, count(fecha) as cantidad, week(fecha) as semana, sum(total) as total',
				'group'=>'fechas',
				'having' => 'semana = WEEKOFYEAR(NOW())',
			)
		);
		$mes = Venta::model()->findAll(array(
				'select'=>'day(fecha) as fechas, count(fecha) as cantidad, month(fecha) as mes, sum(total) as total',
				'group'=>'fechas',
				'condition'=>'month(fecha) = month(now())',
				#'having' => 'mes = month(now())',
			)
		);
		$anio = Venta::model()->findAll(array(
				'select'=>'month(fecha) as fechas, count(fecha) as cantidad, year(fecha) as mes, sum(total) as total',
				'group'=>'fechas',
				'having' => 'mes = year(now())',
			)
		);

		$this->render('index',array(
			'semana'=>$semana,
			'mes'=>$mes,
			'anio'=>$anio,
			$this->setTheme(),
		));
	}

	public function actionRevisar(){
		$model = Venta::model()->findAll(array('condition'=>'revisado = :x', 'params'=>array('x'=>'2')));
		$this->render('_revisar', array($this->setTheme(), 'model'=>$model));
	}

	public function actionRevisarid($id){
		$venta = Venta::model()->find(array('condition'=>'id_venta = :x', 'params'=>array('x'=>$id)));
		$detalle = DetalleVenta::model()->findAll(array('condition'=>'id_venta = :x', 'params'=>array('x'=>$venta->id_venta)));
		$persona = Persona::model()->find(array('condition' =>'rut = :x', 'params'=>array('x'=>$venta->rut)));
		$usuario = Usuario::model()->find(array('condition'=>'id_usuario = :x', 'params'=>array('x'=>$persona->id_usuario)));
		

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($venta);

		if(isset($_POST['Venta']))
		{
			#$venta->attributes=$_POST['Venta'];
			$venta->setAttribute('revisado', 1);
			
			if($venta->save()){
				$this->redirect(array('/venta/revisar'));
			}else{
			}
		}

		$this->render('_revisarid', array($this->setTheme(), 'venta'=>$venta, 'persona'=>$persona, 'detalle'=>$detalle, 'usuario'=>$usuario));
	}

	public function actionDetalle(){

		$anio = Venta::model()->findAll(array(
			'select'=>'year(fecha) as an',
			'group'=>'an',
		));
		$this->render('_detalle', array('anio'=>$anio, $this->setTheme()));
	}

	public function actionDetalleu($id){
		$model = DetalleVenta::model()->findAll('id_venta = '.$id);
		$venta = Venta::model()->find('id_venta = '.$id);
		$this->renderPartial('_detalleu', array('model' => $model, 'venta'=>$venta));
	}

	public function actionAnio($id){
		$anio = Venta::model()->findAll(array(
				'select'=>'month(fecha) as fechas, count(fecha) as cantidad, year(fecha) as an, sum(total) as total',
				'group'=>'fechas',
				'having' => 'an ='.$id,
			)
		);
		$this->render('_aniod', array('anio'=>$anio,'id'=>$id ,$this->setTheme()));
	}
	public function actionAnios($id){
		$anio = Venta::model()->findAll('year(fecha) = '.$id);
		$productos = DetalleVenta::model()->with('idVenta')->findAll(array(
			'select'=>'id_producto, sum(cantidad) as cantidad, sum(t.total) as total',
			'group'=>'t.id_producto',
			'having'=>'year(idVenta.fecha) ='.$id,
		));	
		$region = Venta::model()->findAll(array(
			'select'=>'id_regiones, count(id_regiones) as contar, sum(total) as total',
			'group'=>'id_regiones',
			'condition'=>'year(fecha) = '.$id,
		));
		$tipo = false;
		$this->render('_anios', array('anio'=>$anio,'id'=>$id,'tipo'=>$tipo ,'productos'=>$productos, 'region'=>$region, $this->setTheme()));
	}


	public function actionRegion(){
		$anio = Venta::model()->findAll(array(
			'select'=>'year(fecha) as an',
			'group'=>'an',
		));
		$this->render('_region', array('anio'=>$anio, $this->setTheme()));
	}

	public function actionAnior($id){
		$model = Venta::model()->findAll(
			array(
				'select'=>'id_regiones, count(id_regiones) as contar, sum(total) as total',
				'condition'=>'year(fecha) = '.$id,
				'group'=>'id_regiones',
			)
		);
		$region = Venta::model()->findAll(array(
			'select'=>'id_regiones',
			'group'=>'id_regiones',
			'condition'=>'year(fecha) ='.$id,
			'order'=>'total asc',
		));
		$producto = DetalleVenta::model()->with('idVenta')->findAll(array(
			'select'=>'id_producto, sum(cantidad) as contar, sum(t.total) as total',
			'group'=>'id_producto',
			'condition'=>'year(idVenta.fecha) ='.$id,
		));

		$meses = Venta::model()->findAll(array(
			'condition'=>'year(fecha) ='.$id, 
			'select'=>'month(fecha) as mes',
			'group'=>'mes',
		));
		$comunas = Venta::model()->findAll(array(
			'select'=>'id_regiones, id_comunas',
			'group'=>'id_comunas',
			'condition'=>'year(fecha) ='.$id,
		));
		$dato = false;
		$this->render('_aniosr', array($this->setTheme(),'comunas'=>$comunas, 'model'=>$model, 'id'=>$id, 'dato'=>$dato, 'meses'=>$meses,'region'=>$region ,'producto'=>$producto));
	}

	public function actionMeser($id){
		$model = Venta::model()->findAll(
			array(
				'select'=>'id_regiones, count(id_regiones) as contar, sum(total) as total',
				'condition'=>'month(fecha) = '.$id,
				'group'=>'id_regiones',
			)
		);
		$region = Venta::model()->findAll(array(
			'select'=>'id_regiones',
			'group'=>'id_regiones',
			'condition'=>'month(fecha) ='.$id,
			'order'=>'total asc',
		));
		$comunas = Venta::model()->findAll(array(
			'select'=>'id_regiones, id_comunas',
			'group'=>'id_comunas',
			'condition'=>'month(fecha) ='.$id,
		));
		$dato = true;
		$this->render('_aniosr', array($this->setTheme(),'comunas'=>$comunas, 'model'=>$model, 'id'=>$id,'region'=>$region ,'dato'=>$dato));
	}


	public function actionMeses($id){
		$anio = Venta::model()->findAll('month(fecha) = '.$id);
		$productos = DetalleVenta::model()->with('idVenta')->findAll(array(
			'select'=>'id_producto, sum(cantidad) as cantidad, sum(t.total) as total',
			'group'=>'t.id_producto',
			'condition'=>'month(idVenta.fecha) = '.$id,
		));	
		$region = Venta::model()->findAll(array(
			'select'=>'id_regiones, count(id_regiones) as contar, sum(total) as total',
			'group'=>'id_regiones',
			'condition'=>'month(fecha) = '.$id,
		));
		$tipo = true;
		$this->render('_anios', array('anio'=>$anio,'id'=>$id, 'productos'=>$productos, 'region'=>$region, 'tipo'=>$tipo ,$this->setTheme()));
	}

	public function actionMes($id){
		$mes = Venta::model()->findAll(array(
				'select'=>'day(fecha) as fechas, count(fecha) as cantidad, month(fecha) as mes, sum(total) as total',
				'group'=>'fechas',
				'having' => 'mes ='.$id,
			)
		);
		$comparar = false;
		$this->render('_mesd', array('mes'=>$mes, 'id'=>$id,'comparar'=>$comparar  ,$this->setTheme()));
	}

	public function actionMesesc(){
		$meses = $_POST['mes'];
		$meses = implode(",", $meses);
		$mes = Venta::model()->findAll(array(
				'select'=>'day(fecha) as fechas, count(fecha) as cantidad, month(fecha) as mes, sum(total) as total',
				'group'=>'fechas',
				'having' => 'mes in ('.$meses.')',
				'order'=>'mes asc'
			)
		);
		$comparar = true;
		$this->render('_mesc', array('mes'=>$mes,'comparar'=>$comparar, $this->setTheme()));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('admin',array(
			'model'=>$model,
			$this->setTheme(),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Venta::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
