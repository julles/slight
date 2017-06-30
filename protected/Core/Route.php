<?php

class Route
{
	protected $controller = 'home';

	protected $method = 'index';

	protected $param = [];

	protected $urls;

	protected $controllerClass;

	public function __construct()
	{

		$this->controller = $this->controllerFile($this->controller);
		
		$this->init();
	}

	public function init()
	{
		if(isset($_GET['url']))
		{
			$this->urls = $this->urls($_GET['url']);	
			$this->controller =  $this->controllerFile($this->urls[0]);
			
			if(!empty($this->urls[1]))
			{
				$this->method = $this->toCamelCase($this->urls[1]);
			}	
		}

		include "../protected/Controllers/".$this->controller.'.php';

		$this->controllerClass = new $this->controller();
		
		$this->runMethod();
	}


	public function runMethod()
	{
		$this->methodNotFound();

		unset($this->urls[0]);
		
		unset($this->urls[1]);

		call_user_func_array([$this->controllerClass, $this->method],$this->urls);
	}

	public function methodNotFound()
	{
		if(!method_exists($this->controllerClass, $this->method))
		{
			throw new Exception("Method ".$method.' Tidak di temukan');
		}
	}

	public function sanitizeUrl($varUrl)
	{
   		$url = trim($varUrl);

   		$url = filter_var($url, FILTER_SANITIZE_URL);

		return $url;
	}

	public function urls(String $urls)
	{
		return explode("/",$this->sanitizeUrl($urls));
	}

	public function controllerClass($controller)
	{
		return $controllerClass = ucwords($controller."Controller");
	}

	public function controllerFile($controller)
	{
		$controller = trim($controller);

		$controllerName = $this->controllerClass($controller);
		
		$fileName = "../protected/Controllers/".$controllerName.'.php';

		if(!file_exists($fileName))
		{
			throw new Exception("Controller ".$controllerName.' tidak terdeteksi', 1);
		}

		return $controllerName;
	}

	public function toCamelCase($value){
	    $value = ucwords(str_replace(array('-', '_'), ' ', $value));
	    
	    $value = str_replace(' ', '', $value);
	    
	    return lcfirst($value);
	}

	public function getMethod($controller,$method)
	{

	}
}