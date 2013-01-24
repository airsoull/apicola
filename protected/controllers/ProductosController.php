<?php
class ProductosController extends Controller
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
    	$model = Producto::model()->find('id_producto = '.$id.' and id_activo = 1');

		//Agregar visitas por IP
		$visitasUnicas = new VisitasUnicas;
		$visitasUnicas->setAttribute('id_producto', $id);
		$visitasUnicas->setAttribute('ip', $this->GetUserIp());
		$visitasUnicas->save();
		
		//Agregar visitas generales
		$visitasGeneral = new VisitasGeneral;
		$visitasGeneral->setAttribute('id_productos', $id);
		$visitasGeneral->save();

		$this->render('index', array(
			'model'=>$model, 
		));
    }
}
?>