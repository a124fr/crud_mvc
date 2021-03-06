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
        
        for($i = 0; $i < count($array['lista_funcs']); $i++) {
            $dat_nasc = $array['lista_funcs'][$i]['data_nascimento'];
            $array['lista_funcs'][$i]['data_nascimento'] = DataHelpers::converterDataParaTela($dat_nasc);
        }        

        $this->loadTemplate('funcionario', $array);
    }

    public function cadastro()
    {   
        $array = [
            'msg' => [],
            'func' => []
        ];

        if(isset($_SESSION['msg'])) {
            $array['msg'] = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        if(isset($_SESSION['func'])) {
            $array['func'] = $_SESSION['func'];
            unset($_SESSION['func']);
        }
        
        $this->loadTemplate('funcionario_cadastro', $array);
    }

    public function cadastro_func()
    {
        $_SESSION['msg'] = [];
        $_SESSION['func'] = [];
        
        $primeiro_nome          = $_POST['primeiro_nome'];
        $nome_completo          = $_POST['nome'];
        $email                  = $_POST['email'];
        $cpf                    = $_POST['cpf'];
        $rg                     = $_POST['rg'];
        $data_nasc              = $_POST['data_nasc'];
        $telefone1              = $_POST['telefone1'];
        $telefone2              = $_POST['telefone2'];
        $telefone3              = $_POST['telefone3'];
        $telefone4              = $_POST['telefone4'];
        $foto                   = $_FILES['foto'];
        $foto_nome              = '';

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

        if(!empty($telefone1)) {
            array_push($func['telefones'], $telefone1);
        }

        if(!empty($telefone2)) {
            array_push($func['telefones'], $telefone2);
        }
        
        if(!empty($telefone3)) {
            array_push($func['telefones'], $telefone3);
        }

        if(!empty($telefone4)) {
            array_push($func['telefones'], $telefone4);
        }
        
        $_SESSION['func'] = $func;

        if(!CPFHelpers::validaCPF($func['cpf'])) {
            $_SESSION['msg'][] = ['CPF' => "foi digitado um valor inválido!"];
            header("Location: ".BASE_URL."funcionario/cadastro/".$func['codigo']);
            exit;
        }

        $funcionario = new Funcionario();
        // IMPLEMENTAR REGRA DE NEGÓCIO ONDE O CPF TEM QUE SER ÚNICO.
        if($funcionario->verificarCpfExiste($func['cpf'])) {
            $_SESSION['msg'][] = ['CPF' => "Existe um cadastro com esse cpf!"];
            header("Location: ".BASE_URL."funcionario/cadastro/".$func['codigo']);
            exit;
        }

        if($foto && $foto['tmp_name'] != '') {
            $foto_nome = md5(time().rand(0,9999).$foto['name']);
            $foto_tipo = $foto['type'];        
            $foto_caminho = 'assets/images/funcionarios/';

            $lista_tipos = array('image/png', 'image/jpg', 'image/jpeg');

            if(in_array($foto_tipo, $lista_tipos)) {
                $foto_extensao = explode('/', $foto_tipo);
                $foto_extensao = $foto_extensao[1];

                $foto_nome = $foto_nome.'.'.$foto_extensao;
                $func['foto'] = $foto_nome;
                move_uploaded_file($foto['tmp_name'], $foto_caminho.$foto_nome);                
            } else {                
                $_SESSION['msg'][] = ['foto' => "Não é possível fazer upload desse tipo de arquivo."];
                header("Location: ".BASE_URL."funcionario/cadastro");
                exit;
            }
        } else {
            $_SESSION['msg'][] = ['foto' => "É obrigatório."];
            header("Location: ".BASE_URL."funcionario/cadastro");
            exit;
        }
        
        $func['data_nascimento'] = DataHelpers::converterDataParaBanco($func['data_nascimento']);
        $funcionario->cadastrar($func);        

        unset($_SESSION['msg']);
        unset($_SESSION['func']);
        header("Location: ".BASE_URL."funcionario");
    }

    public function altera($codigo) 
    {
        $array = [
            'msg' => [],
            'func' => []
        ];

        if(isset($_SESSION['msg'])) {
            $array['msg'] = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        if(isset($_SESSION['func'])) {
            $array['func'] = $_SESSION['func'];
            unset($_SESSION['func']);
        }
        
        $funcionario = new Funcionario();  
        $array['func'] = $funcionario->pesquisarFuncionarioPorId($codigo);        
        $array['func']['data_nascimento'] = DataHelpers::converterDataParaTela($array['func']['data_nascimento']);

        $this->loadTemplate('funcionario_altera', $array);
    }

    public function altera_func()
    {        
        $_SESSION['msg'] = [];
        $_SESSION['func'] = [];
        
        $codigo                 = $_POST['codigo'];
        $primeiro_nome          = $_POST['primeiro_nome'];
        $nome_completo          = $_POST['nome'];
        $email                  = $_POST['email'];
        $cpf                    = $_POST['cpf'];
        $rg                     = $_POST['rg'];
        $data_nasc              = $_POST['data_nasc'];
        $telefone1              = $_POST['telefone1'];
        $telefone2              = $_POST['telefone2'];
        $telefone3              = $_POST['telefone3'];
        $telefone4              = $_POST['telefone4'];
        $foto                   = $_FILES['foto'];
        $foto_nome              = $_POST['foto_nome'];

        $func = [
            'codigo' => $codigo,
            'nome' => $primeiro_nome,
            'nome_completo' => $nome_completo,
            'email' => $email,
            'cpf' => $cpf,
            'rg' => $rg,
            'data_nascimento' => $data_nasc,
            'telefones' => [],            
            'foto' => $foto_nome
        ];

        if(!empty($telefone1)) {
            array_push($func['telefones'], $telefone1);
        }

        if(!empty($telefone2)) {
            array_push($func['telefones'], $telefone2);
        }
        
        if(!empty($telefone3)) {
            array_push($func['telefones'], $telefone3);
        }

        if(!empty($telefone4)) {
            array_push($func['telefones'], $telefone4);
        }
        
        $_SESSION['func'] = $func;
        $funcionario = new Funcionario();

        if(!CPFHelpers::validaCPF($func['cpf'])) {
            $_SESSION['msg'][] = ['CPF' => "foi digitado um valor inválido!"];
            header("Location: ".BASE_URL."funcionario/altera/".$func['codigo']);
            exit;
        }

        $cpf_banco = $funcionario->pesquisarCPFFuncionario($func['codigo']);
        if($func['cpf'] != $cpf_banco
            && $funcionario->verificarCpfExiste($func['cpf'])) {
            $_SESSION['msg'][] = ['CPF' => "Existe um cadastro com esse cpf!"];
            header("Location: ".BASE_URL."funcionario/altera/".$func['codigo']);
            exit;
        }

        if($foto && $foto['tmp_name'] != '') {
            $foto_nome = md5(time().rand(0,9999).$foto['name']);
            $foto_tipo = $foto['type'];        
            $foto_caminho = 'assets/images/funcionarios/';

            $lista_tipos = array('image/png', 'image/jpg', 'image/jpeg');

            if(in_array($foto_tipo, $lista_tipos)) {
                $foto_extensao = explode('/', $foto_tipo);
                $foto_extensao = $foto_extensao[1];

                $foto_nome = $foto_nome.'.'.$foto_extensao;
                $func['foto'] = $foto_nome;
                move_uploaded_file($foto['tmp_name'], $foto_caminho.$foto_nome);
            } else {                
                $_SESSION['msg'][] = ['foto' => "Não é possível fazer upload desse tipo de arquivo."];
                header("Location: ".BASE_URL."funcionario/altera/".$func['codigo']);
                exit;
            }
        }

        $func['data_nascimento'] = DataHelpers::converterDataParaBanco($func['data_nascimento']);
        $funcionario->alterar($func);        

        unset($_SESSION['msg']);
        unset($_SESSION['func']);
        header("Location: ".BASE_URL."funcionario");
        exit;
    }

    public function exclui($codigo)
    {
        $funcionario = new Funcionario();   
        $funcionario->excluir($codigo);
        header("Location: ".BASE_URL."/funcionario");
        exit;        
    }
    
    public function exibe($codigo)
    {
        $array = [
            'codigo' => $codigo,
            'func' => []
        ];

        $funcionario = new Funcionario();  
        $array['func'] = $funcionario->pesquisarFuncionarioPorId($codigo);
        $data_nasc = $array['func']['data_nascimento'];
        $array['func']['data_nascimento'] = DataHelpers::converterDataParaTela($data_nasc);

        $this->loadTemplate('funcionario_detalhes', $array);
    }
}