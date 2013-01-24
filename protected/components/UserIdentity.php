<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$usuario = Usuario::model();
        $user = $usuario->find('usuario = "'.$this->username.'"');
		if($usuario->count('usuario = "'.$this->username.'"') == 0)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password != sha1($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$user->id_usuario;
			$this->setState('roles', $user->id_tipo);
			$this->errorCode=self::ERROR_NONE;

			$ip = new Ip;
			$ip->setAttribute('id_usuario', $this->_id);
			$ip->setAttribute('ip', $this->GetUserIp());
			$ipn = Ip::model()->find(array(
				'select'=>'count(ip) as contar, empresa ',
				'condition'=>"ip ='".$this->GetUserIp()."'",
			));
			if($ipn->contar > 0){
				$ip->setAttribute('empresa', $ipn->empresa);
			}
			$ip->save();
		}
		return !$this->errorCode;
	}

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

	public function getIds(){
        return $this->_id;
    }
}