<?php

class HomeController extends Controller
{
	public function index()
	{
		$usuarios = new Usuarios();

		$dados = array(			
			'nome' => $usuarios->getNome(),
			'idade'=> $usuarios->getIdade()
		);


		$this->loadTemplate('home', $dados);
	}
}