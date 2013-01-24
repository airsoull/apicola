<?php
class AdminController extends Controller
{   
    
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
    
    
    public function accessRules() {
        return array(
			array('allow',
				'actions'=>array('index'),
				#'expression'=>'Yii::app()->user->getState("roles") == 1',
				'expression'=>$this->acceso(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                         
		);
    }
    
    public function actionIndex()
    {
    	$contar_producto = Producto::model()->count();
    	$contar_usuario = Usuario::model()->count();
    	$contar_producto_activo = Producto::model()->count(array('condition'=>'id_activo=:x','params'=>array(':x'=>1)));
		$contar_producto_inactivo = Producto::model()->count(array('condition'=>'id_activo=:x','params'=>array(':x'=>2)));
		$ventas_totales = Venta::model()->count('revisado = 2');
		$ventas_suma_total = Venta::model()->find(array('select'=>'sum(total) as s'));
		
		$this->render('index',array(
			'contar_producto'=>$contar_producto,
			'contar_usuario'=>$contar_usuario, 
			'contar_producto_activo'=>$contar_producto_activo,
			'contar_producto_inactivo'=>$contar_producto_inactivo,
			'ventas_totales'=>$ventas_totales,
			'ventas_suma_total'=>$ventas_suma_total,
			$this->setTheme(),
		));
    }
}
?>