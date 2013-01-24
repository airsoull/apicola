<?php
class CarroController extends Controller
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
				'actions'=>array('index', 'agregar', 'sumar', 'restar', 'eliminar'),
				'users'=>array('*'),
			),
            array('allow',
                'actions'=>array('comprar', 'comuna'),
                'users'=>array('@'),
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                         
		);
    }
    
    public function actionComuna(){
        $data=Comunas::model()->findAll('id_comunas=:parent_id', array(':parent_id'=>(int) $_POST['id_regiones']));

        $data=CHtml::listData($data,'id_comunas','nombre');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
        }
    }

    public function actionIndex(){
		$this->render('index');
    }
    public function actionComprar(){
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
            $venta = new Venta;
            $venta->attributes=$_POST['Venta'];
            $model->attributes=$_POST['Persona'];
            $model->setAttribute('id_usuario', $usuario->id_usuario);
            $venta->setAttribute('rut', $model->getAttribute('rut'));
            $venta->setAttribute('id_regiones', $model->getAttribute('id_regiones'));
            $venta->setAttribute('id_comunas', $model->getAttribute('id_comunas'));  
            $total = 0;
            foreach($_SESSION['carrito'] as $c){
                $stock = $c['stock']; 
                $precio = $c['precio']; 
                $suma = $stock*$precio; 
                $total = $total + $suma;
            }
            $venta->setAttribute('total', $total);
            $model->save();
            $venta->save();
            $ultimaId = $venta->primaryKey;
            foreach ($_SESSION['carrito'] as $c) {
                $detalle = new DetalleVenta;
                $detalle->setAttribute('id_venta', $ultimaId);
                $detalle->setAttribute('id_producto', $c['id_producto']);
                $detalle->setAttribute('cantidad', $c['stock']);
                $stock = $c['stock'];
                $precio = $c['precio'];
                $suma = $stock*$precio;
                $detalle->setAttribute('total', $suma);
                $detalle->save();
            }
            unset($_SESSION['carrito']);     

        }
        $dato = true;
        $this->render('comprar', array('model'=>$model, 'dato' => $dato));
    }


    /*
    	Agrega Los productos a la sesion del carrito de compras
    */
    public function actionAgregar($id){
		$this->agregar($id);
    	$this->redirect(array('/carro'));
    }

    public function actionSumar($id){
    	$this->agregar($id);
    }
    public function actionRestar($id){
    	$this->restar($id);
    }
    public function actionEliminar($id){
    	foreach ($_SESSION['carrito'] as $key => $value) {
            if($value['id_producto'] == $id){
                unset($_SESSION['carrito'][$key]);
            }
        }
        $this->redirect(array('/carro'));
    }

    public function agregar($id){
    	$contar = Producto::model()->count('id_producto = '.$id.' and id_activo = 1');
    	if($contar != 0){
    		$model = Producto::model()->find('id_producto = '.$id.' and id_activo = 1');
    	
    		$pro = array(
    			'id_producto'=>$model->id_producto,
    			'nombre'=>$model->nombre,
    			'precio'=>$model->precio,
    			'stock'=>1,
    		);
            $cantidad = true;
            if(isset($_SESSION['carrito'])){
                foreach ($_SESSION['carrito'] as $key => $value) {
                    if($value['id_producto'] == $id){
                        $_SESSION['carrito'][$key]['stock']++;
                        $cantidad = false;
                        break;
                    }
                }
            }
            if($cantidad){
                $_SESSION['carrito'][] = $pro;
            }

    	}
    }
    public function restar($id){
    	foreach ($_SESSION['carrito'] as $key => $value) {
			if($value['id_producto'] == $id){
				$_SESSION['carrito'][$key]['stock']--;
                break;
			}
		}
    }

}
?>