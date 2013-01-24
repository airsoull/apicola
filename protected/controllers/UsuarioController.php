<?php

class UsuarioController extends Controller
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
				'actions'=>array('index','view', 'persona', 'compras', 'detallecompra', 'ip'),
				'expression'=>$this->acceso(),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'expression'=>$this->acceso(),
			),
			array('allow', 
				'actions'=>array('cuenta', 'detalle', 'datos', 'pass', 'mail'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('crear'),
				'users'=>array('?'),

			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	public function actionPersona($id){
		$contar = Persona::model()->count('id_usuario ='.$id);
		if($contar > 0){
			$con = true;
			$persona = Persona::model()->find('id_usuario ='.$id);
			$ventas = Venta::model()->count('rut ='.$persona->rut);
		}else{
			$persona = null;
			$ventas = null;
			$con = false;
		}
		$this->renderPartial('_persona', array('persona'=>$persona, 'con'=>$con, 'ventas'=>$ventas));
	}

	public function actionCompras($id){
		$usuario = Usuario::model()->find('id_usuario ='.$id);
		$persona = Persona::model()->find('id_usuario ='.$id);
		$venta = Venta::model()->findAll('rut ='.$persona->rut);
		$this->render('_compras', array($this->setTheme(), 'usuario'=>$usuario, 'persona'=>$persona, 'venta'=>$venta));
	}

	public function actionDetallecompra($id){
		$model = DetalleVenta::model()->findAll('id_venta = '.$id);
		$ventas = Venta::model()->find('id_venta ='.$id);
		$this->renderPartial('_detalleventa', array('model'=>$model, 'ventas'=>$ventas));
	}

	public function actionIp($id){
		$model = Ip::model()->findAll('id_usuario ='.$id);
		$this->renderPartial('_ip', array('model'=>$model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->setAttribute('passValidar', $model->getAttribute('password'));
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
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
		$dataProvider=new CActiveDataProvider('Usuario');
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
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
			$this->setTheme(),
		));
	}

	public function actionDetalle($id){
		$model = DetalleVenta::model()->findAll('id_venta = '.$id);
		$ventas = Venta::model()->find('id_venta = '.$id);
		$this->renderPartial('_detalle', array(
			"model"=>$model,
			'ventas'=>$ventas,
		));
	}

	public function actionDatos(){
		$usuario = Usuario::model()->find("usuario = '".Yii::app()->user->name."'");
        $contar = Persona::model()->count('id_usuario = '.$usuario->id_usuario);

        if($contar != 0){
            $model = Persona::model()->find('id_usuario = '.$usuario->id_usuario);
        }else{
            $model = new Persona;
        }

        if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Persona']))
        {
        	$model->attributes=$_POST['Persona'];
            $model->setAttribute('id_usuario', $usuario->id_usuario);
            if($model->save()){
            	$this->redirect(array('/usuario/cuenta'));
            }
        }

        $dato = false;
		$this->render('_datos', array('model'=>$model, 'dato' => $dato));
	}

	public function actionCuenta(){
		$user = Yii::app()->user->name;
		$model = Usuario::model()->find("usuario = '$user'");
		$contar = Persona::model()->count("id_usuario = '$model->id_usuario'");
		$contarVenta = 0;
		$persona = 0;
		$ventaTotal = 0;
		if($contar == 0){
			$contarPersona = 0;
			$venta = 0;
		}else{
			$contarPersona = 1;
			$persona = Persona::model()->find("id_usuario = '$model->id_usuario'");
			$contar = Venta::model()->count("rut = '$persona->rut'");
			if($contar != 0){
				$contarVenta = 1;
				$ventaTotal = Venta::model()->count("rut = '$persona->rut'");
				$venta = Venta::model()->findAll("rut = '$persona->rut'");
			}else{
				$ventaTotal = 0;
				$contarVenta = 0;
				$venta = 0;
			}
		}

		$this->render('_cuenta',array(
			'model'=>$model,
			'contarVenta'=>$contarVenta,
			'contarPersona' => $contarPersona,
			'persona'=>$persona,
			'venta'=>$venta,
			'ventaTotal'=>$ventaTotal,
		));

	}

	public function actionPass(){
		$this->render('_pass');
	}

	public function actionMail(){
		$this->render('_mail');
	}

	public function actionCrear(){
		$model=new Usuario;
		$login=new LoginForm;

		$this->performAjaxValidation($model);
		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->setAttribute('id_tipo', 2);
			if($model->save()){
				$model->updateAll(array('password'=>sha1($model->getAttribute('password'))), "usuario = '".$model->getAttribute('usuario')."'");
				$login->attributes = array('username'=>$model->getAttribute('usuario'), 'password'=>$model->getAttribute('password'));
				if($login->validate() && $login->login()){
					$this->redirect(array('cuenta','id'=>$model->id_usuario));
				}
			}
		}
		$this->render('_crear', array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
