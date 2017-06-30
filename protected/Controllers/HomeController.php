<?php 

class HomeController
{
	public function __construct()
	{
		echo "Hai Ini Home Controller <br/>";
	}

	public function index()
	{
		echo "ini index";
	}

	public function tes($param1="",$param2="")
	{
		echo "ini param : ".$param2;
	}
}