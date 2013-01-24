<?php
class CatalogoController extends Controller
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                         
		);
    }
    
    public function actionView($id)
    {
    	$model = Producto::model()->findAll('id_tipo = '.$id.' and id_activo = 1');
    	$tipo = proTipo::model()->find('id_tipo = '.$id);
    	$tipos = Producto::model()->findAll('id_activo = 1 group by id_tipo');
    	$producto_venta = DetalleVenta::model()->findAll(array(
			'select'=>'id_producto, count(id_producto) as c',
			'group'=>'id_producto',
			'order'=>'c desc',
			'limit'=>'5',
		));

		$this->render('index', array(
			'model'=>$model, 
			'tipo'=>$tipo,
			'tipos'=>$tipos,
			'producto_venta'=>$producto_venta,
		));
    }
}
?>