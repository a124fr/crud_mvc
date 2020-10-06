<?php

class FuncionarioController extends Controller 
{
    public function index() 
    {
        $array = [
            'lista_funcs' => array()
        ];

        $funcionario = new Funcionario();
        $array['lista_funcs'] = $funcionario->listarTodos();
        
        $this->loadTemplate('funcionario', $array);
    }

    public function cadastro()
    {
        $this->loadTemplate('funcionario_cadastro');
    }

    public function cadastro_func()
    {
        echo "<pre>";
        print_r($_POST);

        print_r($_FILES['foto']);
    }

    public function exibe($codigo)
    {
        $array = [
            'codigo' => $codigo
        ];

        $this->loadTemplate('funcionario_detalhes', $array);
    }
}