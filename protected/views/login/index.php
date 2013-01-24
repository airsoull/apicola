<?PHP
	if(Yii::app()->user->isGuest){
    	echo "No login";
    }else{
    	echo "login";
    }
?>