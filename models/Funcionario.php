<?php

class Funcionario extends Model 
{
    public function listarTodos() 
    {
        $lista_funcs = array();
        $resultado = $this->db->query("SELECT codigo_func, nome_completo, cpf, rg, data_nascimento, foto FROM funcionario");
        
        if($resultado && $resultado->rowCount() > 0) {
            $lista_funcs = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $lista_funcs;
    }

    public function pesquisarFuncionarioPorId($id)
    {
        $func = array();
        $sql = $this->db->prepare("SELECT codigo_func, primeiro_nome, nome_completo, email, cpf, rg, data_nascimento, foto FROM funcionario WHERE codigo_func = :codigo_func");
        $sql->bindValue(':codigo_func', $id);
        $sql->execute();

        if($sql && $sql->rowCount() > 0) {
            $func = $sql->fetch(PDO::FETCH_ASSOC);
            $sql = $this->db->query("SELECT codigo_tel, tel_contato FROM telefone WHERE Funcionario_codigo_func = '$id'");            
            $func['telefones'] = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $func;
    }

    public function cadastrar(array $func)
    {
        $sql = $this->db->prepare("INSERT INTO funcionario(
            primeiro_nome, nome_completo, email, cpf, rg, data_nascimento, foto)VALUES(
                :primeiro_nome, :nome_completo, :email, :cpf, :rg, :data_nascimento, :foto)");

        $sql->bindValue(':primeiro_nome', $func['nome']);              
        $sql->bindValue(':nome_completo', $func['nome_completo']);
        $sql->bindValue(':email', $func['email']);
        $sql->bindValue(':cpf', $func['cpf']);
        $sql->bindValue(':rg', $func['rg']);
        $sql->bindValue(':data_nascimento', $func['data_nascimento']);
        $sql->bindValue(':foto', $func['foto']);               
        $sql->execute();
        $ultimo_func_id = $this->db->lastInsertId();
                
        foreach($func['telefones'] as $telefone) {
            $sql = $this->db->prepare('INSERT INTO telefone(tel_contato, Funcionario_codigo_func)VALUES(:tel_contato, :Funcionario_codigo_func)');
            $sql->bindValue(':tel_contato', $telefone);
            $sql->bindValue(':Funcionario_codigo_func', $ultimo_func_id);
            $sql->execute();
        }
    }
}