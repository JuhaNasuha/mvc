<?php

/**
* 
*/
class DModel{
	protected $db = array();
	function __construct()
	{
		$dsn = 'mysql:dbname=mvc; host=localhost';
		$user = 'root';
		$pass = '';
	  $this->db = new Database($dsn, $user, $pass);
	}
}




?>