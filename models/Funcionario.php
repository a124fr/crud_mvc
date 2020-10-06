<?php

class Funcionario extends Model 
{
    public function listarTodos() 
    {
        $lista_funcs = array();
        $resultado = $this->db->query("SELECT codigo_func, nome_completo, cpf, rg, data_nascimento, foto FROM funcionario");
        
        if($resultado && $resultado->rowCount() > 0) {
            $lista_funcs = $resultado->fetchAll();
        }
        
        return $lista_funcs;
    }

    public function cadastrar($func)
    {

    }
}