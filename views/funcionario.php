<div class="row">
    <div class="col-12">
        <div><h1>Lista de Funcionários </h1></div>
    </div>
</div>
<div class="row">    
    <div class="col-12">
        <div>
            <a href="<?=BASE_URL;?>funcionario/cadastro" class="btn btn-primary">Cadastrar</a>
        </div>
        <table class="table">
            <tr>     
                <th># selecione</th>           
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data Nasc.</th>
                <th>Ações</th>
            </tr>
            <?php if(count($lista_funcs) > 0):?>            
                <?php foreach($lista_funcs as $func):?>                
                <tr>
                    <td data-id='{"codigo": <?=$func["codigo_func"];?>, "nome": "<?=$func['nome_completo'];?>"}'>
                        <input type="checkbox" name="selecione_func" class="selecione_func" />
                    </td>
                    <td>
                        <a href="<?=BASE_URL;?>funcionario/exibe/<?=$func['codigo_func'];?>"><?=$func['nome_completo'];?></a>
                    </td>
                    <td><?=$func['cpf'];?></td>
                    <td><?=$func['rg'];?></td>
                    <td><?=$func['data_nascimento'];?></td>
                    <td>
                        <a href="<?=BASE_URL;?>funcionario/altera/<?=$func['codigo_func'];?>" class="btn btn-primary">Alterar</a>    
                        <a href="<?=BASE_URL.'funcionario/exclui/'.$func['codigo_func'];?>" onclick="return confirm('Deseja Excluir o Funcionário código: <?=$func['codigo_func'];?>?')" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach;?>
            <?php else: ?>
            <tr>
                <td colspan="6"><?php echo "Nenhum funcionário cadastrado";?></td>
            </tr>
            <?php endif;?>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
    <div id="body_telefone">                
    </div>
    </div>
</div>