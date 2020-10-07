<?php

class AjaxController extends controller
{
    public function pesquisarTelefonesDeFuncionario($codigo_func)
    {
        $funcionario = new Funcionario();
        $telefones = $funcionario->pesquisarTelefonesPorIdFuncionario($codigo_func);

        echo json_encode($telefones);
        exit;
    }

    public function excluirTelefoneDeFuncionario($codigo_tel)
    {
        $funcionario = new Funcionario();
        $funcionario->excluirTelefonePorId($codigo_tel);
    }
}