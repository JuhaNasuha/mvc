<?php
/**
* 
*/
class load
{
	
	function __construct()
	{} 
		public function view($fileName, $data = false){
			if ($data == true) {
				extract($data); 
			} 
			
			include 'views/'.$fileName.'.php';
		}
		public function model($modelName){
			include 'models/'.$modelName.'.php';
			return new $modelName();
		}
		public function validation($modelName){
			include 'validation/'.$modelName.'.php';
			return new $modelName();
		}
	
}




?>