<?php

class GaleriaController extends Controller
{
	public function index()
	{	
		$array = [
			'lista_funcs' => []
		];
		
		$funcionario = new Funcionario();
		$array['lista_funcs'] = $funcionario->listarTodos();

		for($i = 0; $i < count($array['lista_funcs']); $i++) {
            $dat_nasc = $array['lista_funcs'][$i]['data_nascimento'];
            $array['lista_funcs'][$i]['data_nascimento'] = DataHelpers::converterDataParaTela($dat_nasc);
        }

		$this->loadTemplate('galeria', $array);
	}	
}