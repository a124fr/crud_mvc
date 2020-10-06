<div class="row">
    <h2>Funcionário(a): <?=$func['primeiro_nome'];?></h2>
</div>
<div class="row">    
    <table>
        <tr>
            <td colspan="2">
                <img src="<?=BASE_URL.'assets/images/funcionarios/'.$func['foto'];?>" width="300" alt="" />
            </td>
        </tr>
        <tr>
            <td>
                <p><span>Nome</span>: <?=$func['nome_completo'];?></p>
                <p><span>Email</span>: <?=$func['email'];?></p>
                <p><span>CPF</span>: <?=$func['cpf'];?></p>
                <p><span>RG</span>: <?=$func['rg'];?></p>
                <p><span>Data de Nasc.</span>: <?=$func['data_nascimento'];?></p>
            </td>
            <td>
                <?php foreach($func['telefones'] as $tel):?>
                    <p><span>Telefone </span>: <?=$tel;?></p>
                <?php endforeach;?>
                <p></p>
            </td>
        </tr>
    </table>
</div>
<div  class="row">
    <a href="<?=BASE_URL;?>funcionario" class="btn btn-primary">Voltar</a>
</div>