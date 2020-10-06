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

    public function cadastrar(array $func)
    {
        echo "<pre>";
        print_r($func);
        
        $sql = $this->db->prepare('INSERT INTO login(nome, email, senha)VALUES(:nome, :email, :senha)');
        $sql->bindValue(':nome', $func['nome']);
        $sql->bindValue(':email', $func['email']);
        $sql->bindValue(':senha', md5('123'));
        $sql->execute();        
        $ultimo_login_id = $this->db->lastInsertId();
        echo "LOGIN INSERIDO: ".$ultimo_login_id;
        
        $sql = $this->db->prepare("INSERT INTO funcionario(cpf, nome_completo, rg, data_nascimento, foto, Login_codigo)VALUES(:cpf, :nome_completo, :rg, :data_nascimento, :foto, :Login_codigo)");        
        $sql->bindValue(':nome_completo', $func['nome_completo']);
        $sql->bindValue(':cpf', $func['cpf']);
        $sql->bindValue(':rg', $func['rg']);
        $sql->bindValue(':data_nascimento', $func['data_nascimento']);
        $sql->bindValue(':foto', $func['foto']);
        $sql->bindValue(':Login_codigo', $ultimo_login_id);        
        $sql->execute();
        $ultimo_func_id = $this->db->lastInsertId();
        echo "<br/>Funcionário INSERIDO: ".$ultimo_func_id;
        
        foreach($func['telefones'] as $telefone) {
            $sql = $this->db->prepare('INSERT INTO telefone(tel_contato, Funcionario_codigo_func)VALUES(:tel_contato, :Funcionario_codigo_func)');
            $sql->bindValue(':tel_contato', $telefone);
            $sql->bindValue(':Funcionario_codigo_func', $ultimo_func_id);
            $sql->execute();

            echo "<br/>Telefone: ".$this->db->lastInsertId();
        }

        #$this->db->prepare('INSERT INTO telefone()VALUES()');
    }
}