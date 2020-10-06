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
        $primeiro_nome          = $_POST['primeiro_nome'];
        $nome_completo          = $_POST['nome'];
        $email                  = $_POST['email'];
        $cpf                    = $_POST['cpf'];
        $rg                     = $_POST['rg'];
        $data_nasc              = $_POST['data_nasc'];
        $telefone_celular       = $_POST['telefone_celular'];
        $telefone_whatsapp      = $_POST['telefone_whatsapp'];
        $telefone_contato       = $_POST['telefone_contato'];
        $telefone_residencial   = $_POST['telefone_residencial'];
        $foto                   = $_FILES['foto'];
        $foto_nome              = 'foto.jpg';
        
        if($foto && $foto['tmp_name'] != '') {
            $foto_nome = md5(time().rand(0,9999).$foto['name']);
            $foto_tipo = $foto['type'];        
            $foto_caminho = 'assets/images/funcionarios/';

            $lista_tipos = array('image/png', 'image/jpg', 'image/jpeg');

            if(in_array($foto_tipo, $lista_tipos)) {
                $foto_extensao = explode('/', $foto_tipo);
                $foto_extensao = $foto_extensao[1];

                $foto_nome = $foto_nome.'.'.$foto_extensao;
                move_uploaded_file($foto['tmp_name'], $foto_caminho.$foto_nome);
            }
        }

        $funcionario = new Funcionario();

        $func = [
            'nome' => $primeiro_nome,
            'nome_completo' => $nome_completo,
            'email' => $email,
            'cpf' => $cpf,
            'rg' => $rg,
            'data_nascimento' => $data_nasc,
            'telefones' => [],            
            'foto' => $foto_nome
        ];

        if(!empty($telefone_celular)) {
            array_push($func['telefones'], $telefone_celular);
        }

        if(!empty($telefone_contato)) {
            array_push($func['telefones'], $telefone_contato);
        }
        
        if(!empty($telefone_whatsapp)) {
            array_push($func['telefones'], $telefone_whatsapp);
        }

        if(!empty($telefone_residencial)) {
            array_push($func['telefones'], $telefone_residencial);
        }

        $funcionario->cadastrar($func);
    }

    public function exibe($codigo)
    {
        $array = [
            'codigo' => $codigo
        ];

        $this->loadTemplate('funcionario_detalhes', $array);
    }
}