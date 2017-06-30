<?php namespace Slight\Controllers;

use Slight\Core\Controller;

use Slight\Models\{Blog};

class HomeController extends Controller
{
	public function index()
	{

		$model = Blog::all();

		return $this->view('home',[
			'words' => 'Welcome Home!',
			'model'=>$model,
		]);
	}

	public function loremIpsum($var="")
	{
		echo "param : " . $var.'<br/>';
	}
}