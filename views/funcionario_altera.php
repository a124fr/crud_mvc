<div class="row justify-content-center">
    <h2>Alteração de Dados do Funcionário</h2>
</div>
<?php if(!empty($msg)):?>  
  <div class="row justify-content-center">    
    <?php foreach($msg as $array_valor): ?>
        <?php foreach($array_valor as $indice => $valor):?>
            <p class="col-6 alert alert-danger" role="alert"><span style="font-weight:bold;">Campo <?=$indice;?></span> - <?=$valor;?></p>
        <?php endforeach;?>
    <?php endforeach;?>               
  </div>  
  <?php endif;?>
<div class="row justify-content-center">    
    <div class="col-6">
            <form method="POST" action="<?=BASE_URL;?>funcionario/altera_func" enctype="multipart/form-data">          
            <input type="hidden" id="codigo" name="codigo" value="<?=$func['codigo_func'];?>">
            <input type="hidden" id="foto_nome" name="foto_nome" value="<?=$func['foto'];?>">            
            <div class="form-group row">
                <label for="primeiro_nome" class="col-sm-3 col-form-label">Primeiro Nome:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="<?= isset($func['primeiro_nome'])?$func['primeiro_nome']:'';?>"  required />
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-3 col-form-label">Nome Completo:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($func['nome_completo'])?$func['nome_completo']:'';?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?= isset($func['email'])?$func['email']:'';?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-sm-3 col-form-label">CPF:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control cpf" id="cpf" name="cpf" value="<?= isset($func['cpf'])?$func['cpf']:'';?>" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="rg" class="col-sm-3 col-form-label">RG:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control rg" id="rg" name="rg" value="<?= isset($func['rg'])?$func['rg']:'';?>" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="data_nasc" class="col-sm-3 col-form-label">Data Nasc:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control data_nasc" id="data_nasc" name="data_nasc" value="<?= isset($func['data_nascimento'])?$func['data_nascimento']:'';?>" maxlength="14" required />
                </div>
            </div>
            
            <div class="form-group row">
                <label for="telefone1" class="col-sm-3 col-form-label">Telefone 1:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control telefone" id="telefone1" name="telefone1" value="<?= isset($func['telefones'][0])?$func['telefones'][0]:'';?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone2" class="col-sm-3 col-form-label">Telefone 2:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control telefone" id="telefone2" name="telefone2" value="<?= isset($func['telefones'][1])?$func['telefones'][1]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone3" class="col-sm-3 col-form-label">Telefone 3:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control telefone" id="telefone3" name="telefone3" value="<?= isset($func['telefones'][2])?$func['telefones'][2]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone4" class="col-sm-3 col-form-label">Telefone 4:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control telefone" id="telefone4" name="telefone4" value="<?= isset($func['telefones'][3])?$func['telefones'][3]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto:</label>
                <div class="col-sm-9">
                <input type="file" class="form-control-file" id="foto" name="foto" />
                </div>
            </div>
            <p>		  
                <input type="submit" value="Alterar Funcionário" class="btn btn-primary"/>
            </p>    
        </form>
        
        <a href="<?=BASE_URL;?>funcionario" class="btn btn-danger">Voltar</a>
    </div>
</div>