<?php
/**
* 
*/
class main
{
	public $url;
	public $controllerName = "Index" ;
	public $methodName = "Index" ;
	public $controllerPath = "controllers/";
	public $controller;
	public function __construct()
	{
		$this->getUrl();
		$this->loadController();
		$this->callMethod();
	}
	
	public function getUrl(){
		$this->url = isset($_GET['url']) ? $_GET['url'] : NULL ;
	    if ($this->url!= NULL) {
		    $this->url = rtrim($this->url,'/');
		   //rtrim() This function returns a string with whitespace (or other characters) stripped from the end of str.
			$this->url = explode("/", $this->url);
			//explode() Returns an array of strings, each of which is a substring of string formed by splitting it on boundaries formed by the string delimiter.
			} 
		else {
		unset($this->url);
		}
	}
	public function loadController(){
		if (!isset($this->url[0])) {
			include $this->controllerPath.$this->controllerName.".php";
			$this->controller = new $this->controllerName();
		}
		else{
			$this->controllerName = $this->url[0];
			$fileName = $this->controllerPath . $this->controllerName.".php";
			if (file_exists($fileName)) {
				include $fileName;
				if (class_exists($this->controllerName)) {
					$this->controller = new $this->controllerName();
				}
				else{ header("location:".BASE_URL."/Index");}
			}else{ header("location:".BASE_URL."/Index");}
		}
	} 
	
	public function callMethod(){
		if (isset($this->url[2])){
			$this->methodName = $this->url[1];
			if (method_exists($this->controller, $this->methodName)) {
				$this->controller->{$this->methodName}($this->url[2]);
			} else {
				header("location:".BASE_URL."/Index");
			}
			
		}else{
			if (isset($this->url[1])){
			$this->methodName = $this->url[1];
			if (method_exists($this->controller, $this->methodName)) {
				$this->controller->{$this->methodName}();
			} else {
				header("location:".BASE_URL."/Index");
			}
			
		}else{
			if (method_exists($this->controller, $this->methodName)) {
			$this->controller->{$this->methodName}();
			} else {
			header("location:".BASE_URL."/Index");
			}
		   }
		  
		}


	}




}


?>