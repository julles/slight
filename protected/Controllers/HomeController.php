<?php 

class HomeController
{
	public function __construct()
	{
		echo "Hai Ini Home Controller <br/>";
	}

	public function index()
	{
		echo "ini index <br/>";
	}

	public function tes($param1="",$param2="")
	{
		echo "ini tes <br/>";
	}

	public function loremIpsum($var="")
	{
		echo "param : " . $var.'<br/>';
	}
}