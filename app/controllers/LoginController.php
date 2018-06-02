<?php



namespace App\Controllers;

use FrameworkAULA\Http\Controller;

//controller Login
class LoginController extends Controller{

	//action
	public function telaInicial(){

		$this->service->render('login/index.login.phtml');
	}

}
