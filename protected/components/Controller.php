<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();



	/*
	protected function beforeRender($view)
	{
    	$return = parent::beforeRender($view);
    	Yii::app()->piwik->render();
    	return $return;
	}*/




	 //Obtener Ip
    function GetUserIp() { 
    	$ip = "";
    	if(isset($_SERVER)) { 
    		if(!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    			$ip=$_SERVER['HTTP_CLIENT_IP'];
    		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    			$ip=$_SERVER['HTTP_X_FORWARDED_FOR']; 
    		} else { 
    			$ip=$_SERVER['REMOTE_ADDR']; 
    		} 
    	} else { 
    		if ( getenv( 'HTTP_CLIENT_IP' ) ) { 
    			$ip = getenv( 'HTTP_CLIENT_IP' ); 
    		} elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) { 
    			$ip = getenv( 'HTTP_X_FORWARDED_FOR' ); 
    		} else { 
    			$ip = getenv( 'REMOTE_ADDR' ); 
    		}
    	} 
    	if(strstr($ip,',')) { 
    		$ip = array_shift(explode(',',$ip)); 
    	} 
    	return $ip; 
    }

	public function setTheme(){
        return Yii::app()->theme='administracion';
    }

    public function acceso(){
    	return 'Yii::app()->user->getState("roles") == 1';
    }

    public function dato($tipo, $dato){
		$valor = null;
		//Si es mes
		if($tipo){
			$valor = 'Mes '.$this->mes($dato);
		}else{
			$valor = 'Año '.$dato;
		}
		return $valor;
	}

	public function precio($valor){
		return '$'.number_format($valor);
	}

	public function fecha($fecha){
		$date = strtotime($fecha);
		return date("d/m/y H:i", $date);
	}

	public function rut($rut, $dv){
		return str_replace(',', '.', number_format($rut)).'-'.$dv;
	}

	public function mes($numero){
		$mes = null;
		switch ($numero) {
			case 1:
				$mes = 'Enero';
				break;
			case 2:
				$mes = 'Febrero';
				break;
			case 3:
				$marzo = 'Marzo';
				break;
			case 4:
				$mes = 'Abril';
				break;
			case 5:
				$mes = 'Mayo';
				break;
			case 6:
				$mes= 'Junio';
				break;
			case 7:
				$mes = 'Julio';
				break;
			case 8:
				$mes = 'Agosto';
				break;
			case 9:
				$mes = 'Septiembre';
				break;
			case 10:
				$mes = 'Octubre';
				break;
			case 11:
				$mes = 'Noviembre';
				break;
			case 12:
				$mes = 'Diciembre';
				break;
		}

		return $mes;
	}
}