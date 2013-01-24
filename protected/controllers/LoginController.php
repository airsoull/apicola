<?php
class LoginController extends Controller
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
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                         
		);
    }
    
    public function actionIndex()
    {
    	if(Yii::app()->user->isGuest){
    		echo "login";
    	}else{
    		echo "No login";
    	}
    }
}
?>