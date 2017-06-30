<?php 

class HomeController extends Controller
{
	public function index()
	{
		return $this->view('home',[
			'words' => 'Welcome Home Bro!',
		]);
	}

	public function loremIpsum($var="")
	{
		echo "param : " . $var.'<br/>';
	}
}