<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$ultimos = Producto::model()->findAll(array('condition'=>'id_activo=:x','params'=>array(':x'=>1), 'order'=>'id_producto desc', 'limit'=>5));
		$producto_venta = DetalleVenta::model()->findAll(array(
			'select'=>'id_producto, count(id_producto) as c',
			'group'=>'id_producto',
			'order'=>'c desc',
			'limit'=>'5',
		));
		$producto_visto = VisitasGeneral::model()->findAll(array(
			'select'=>'id_productos, count(id_productos) as c',
			'group'=>'id_productos',
			'order'=>'c desc',
			'limit'=>'5',
		));

		$this->render('index', array(
			'ultimos'=>$ultimos,
			'producto_venta'=>$producto_venta,
			'producto_visto'=>$producto_visto,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	public function actionVenta(){
		
		$persona = Persona::model()->find(array('select'=>'rut', 'order'=>'rand()'));
		echo $persona->rut;

		$producto = Producto::model()->find(array('select'=>'id_producto, precio', 'order'=>'rand()'));
		echo $producto->id_producto.' '.$producto->precio;

		$dia = 0;
		$mes = 11;
		$region = 13;
		$comuna = 100;
		$descripcion = NULL;
		while ($dia <= 29) {
			$dia++;

			$alea = rand(1,10);
			$producto = Producto::model()->find(array('select'=>'precio, nombre, id_producto', 'order'=>'rand()'));
			$precio = $producto->precio * $alea;

			$persona = Persona::model()->find(array('select'=>'rut', 'order'=>'rand()'));
			$fecha = '2012-'.$mes.'-'.$dia.' '.'14:26:36';
			
			$venta = new Venta;
			$venta->setAttribute('rut', $persona->rut);
			$venta->setAttribute('fecha', '2012-'.$mes.'-'.$dia.' 00:00:00');
			$venta->setAttribute('id_regiones', $region);
			$venta->setAttribute('id_comunas', $comuna);
			$venta->setAttribute('total', $precio);
			$venta->save();

			$dv = new DetalleVenta;
			$dv->setAttribute('id_venta', $venta->id_venta);
			$dv->setAttribute('id_producto', $producto->id_producto);
			$dv->setAttribute('cantidad', $alea);
			$dv->setAttribute('total', $precio);
			$dv->save();
		}
		
	}


	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				if(!isset($_GET['red'])){
					$this->redirect(Yii::app()->user->returnUrl);
				}else{
					$this->redirect(array('/carro'));
				}
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}