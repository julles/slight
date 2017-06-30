<?php

class Route
{
	protected $controller = 'home';

	protected $method = 'index';

	protected $param = [];

	protected $urls;

	public function __construct()
	{

		$this->controller = $this->controllerFile($this->controller);
		
		if(isset($_GET['url']))
		{
			$this->urls = $this->urls($_GET['url']);	

			$this->controller =  $this->controllerFile($this->urls[0]);
		}

		include $this->controller;
	}

	public function sanitizeUrl($varUrl)
	{
   		$url = trim($varUrl);

   		$url = filter_var($url, FILTER_SANITIZE_URL);

		return $url;
	}

	public function urls(String $urls)
	{
		return explode($this->sanitizeUrl($urls));
	}

	public function controllerFile($controller)
	{
		$controller = trim($controller);

		$controllerName = ucwords($controller."Controller.php");
		
		$fileName = "../protected/Controllers/".$controllerName;

		if(!file_exists($fileName))
		{
			throw new Exception("Controller ".$controllerName.' tidak terdeteksi', 1);
		}

		return $fileName;
	}
}