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
            $telefones = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($telefones as $telefone) {
                $func['telefones'][] = $telefone['tel_contato'];
            }
        }

        return $func;
    }

    public function pesquisarNomeFuncionario($id)
    {
        $sql = $this->db->prepare("SELECT primeiro_nome FROM funcionario WHERE codigo_func = :codigo_func");
        $sql->bindValue(':codigo_func', $id);
        $sql->execute();
        $nome = $sql->fetch(PDO::FETCH_ASSOC);

        return $nome;
    }

    public function pesquisarCPFFuncionario($id)
    {
        $sql = $this->db->prepare("SELECT cpf FROM funcionario WHERE codigo_func = :codigo_func");
        $sql->bindValue(':codigo_func', $id);
        $sql->execute();
        $sql = $sql->fetch(PDO::FETCH_ASSOC);

        return $sql['cpf'];
    }

    public function verificarCpfExiste($cpf)
    {
        $sql = $this->db->prepare("SELECT count(*) as contador FROM funcionario WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        
        return intval($sql['contador']) > 0;        
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

    public function alterar(array $func)
    {
        $sql = $this->db->prepare("UPDATE funcionario SET   primeiro_nome   = :primeiro_nome, 
                                                            nome_completo   = :nome_completo, 
                                                            email           = :email, 
                                                            cpf             = :cpf, 
                                                            rg              = :rg, 
                                                            data_nascimento = :data_nascimento, 
                                                            foto            = :foto
                                                        WHERE codigo_func   = :codigo_func");
        $sql->bindValue(':primeiro_nome', $func['nome']);
        $sql->bindValue(':nome_completo', $func['nome_completo']);
        $sql->bindValue(':email', $func['email']);
        $sql->bindValue(':cpf', $func['cpf']);
        $sql->bindValue(':rg', $func['rg']);
        $sql->bindValue(':data_nascimento', $func['data_nascimento']);
        $sql->bindValue(':foto', $func['foto']);
        $sql->bindValue(':codigo_func', $func['codigo']);
        $sql->execute();
        
        if(!empty($func['telefones']) && count($func['telefones']) > 0) {                
            $telefones = $this->pesquisarTelefonesPorIdFuncionario($func['codigo']);

            if(count($telefones) >= count($func['telefones'])) {                
                for($i = 0; $i < count($func['telefones']); $i++) {                
                    $codigo_tel = $telefones[$i]['codigo_tel'];

                    $sql = $this->db->prepare("UPDATE telefone SET tel_contato = :tel_contato WHERE codigo_tel = :codigo_tel");
                    $sql->bindValue(':tel_contato', $func['telefones'][$i]);
                    $sql->bindValue(':codigo_tel', $codigo_tel);

                    $sql->execute();
                }                 
            } else {
                $total = 0;
                for($i = 0; $i < count($telefones); $i++) {
                    $codigo_tel = $telefones[$i]['codigo_tel'];

                    $sql = $this->db->prepare("UPDATE telefone SET tel_contato = :tel_contato WHERE codigo_tel = :codigo_tel");
                    $sql->bindValue(':tel_contato', $func['telefones'][$i]);
                    $sql->bindValue(':codigo_tel', $codigo_tel);
                    $sql->execute();

                    $total++;
                }

                for($i = $total; $i < count($func['telefones']); $i++) {
                    $sql = $this->db->prepare("INSERT INTO telefone(tel_contato, Funcionario_codigo_func) VALUES (:tel_contato, :Funcionario_codigo_func)");
                    $sql->bindValue(':tel_contato', $func['telefones'][$i]);                    
                    $sql->bindValue(':Funcionario_codigo_func', $func['codigo']);
                    $sql->execute();
                }
            }
        }        
    }

    public function excluir($codigo) {
        $sql = $this->db->prepare("DELETE FROM telefone WHERE Funcionario_codigo_func = :codigo_func");
        $sql->bindValue(':codigo_func', $codigo);
        $sql->execute();

        $sql = $this->db->prepare("DELETE FROM funcionario WHERE codigo_func = :codigo_func");
        $sql->bindValue(':codigo_func', $codigo);
        $sql->execute();
    }
    
    public function excluirTelefonePorId($codigo)
    {
        $sql = $this->db->prepare("DELETE FROM telefone WHERE codigo_tel = :codigo_tel");
        $sql->bindValue(':codigo_tel', $codigo);
        $sql->execute();
    }

    public function pesquisarTelefonesPorIdFuncionario($id)
    {
        $sql = $this->db->prepare("SELECT codigo_tel, tel_contato FROM telefone WHERE Funcionario_codigo_func = :Funcionario_codigo_func");            
        $sql->bindValue(':Funcionario_codigo_func', $id);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}