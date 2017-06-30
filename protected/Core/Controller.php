<?php namespace Slight\Core;

class Controller
{
	public function __construct()
	{

	}

	public function view($view,$data=[])
	{
		extract($data);

		include "../protected/Views/".$view.'.php';
	}
}