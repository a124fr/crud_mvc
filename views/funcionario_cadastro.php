<div class="row justify-content-center">
    <h2>Cadastro de Funcionário</h2>
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
            <form method="POST" action="<?=BASE_URL;?>funcionario/cadastro_func" enctype="multipart/form-data">          
            <div class="form-group row">
                <label for="primeiro_nome" class="col-sm-3 col-form-label">Primeiro Nome:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="<?= isset($func['nome'])?$func['nome']:'';?>"  required />
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
                    <input type="text" class="form-control" id="email" name="email" value="<?= isset($func['email'])?$func['email']:'';?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-sm-3 col-form-label">CPF:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= isset($func['cpf'])?$func['cpf']:'';?>" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="rg" class="col-sm-3 col-form-label">RG:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="rg" name="rg" value="<?= isset($func['rg'])?$func['rg']:'';?>" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="data_nasc" class="col-sm-3 col-form-label">Data Nasc:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="<?= isset($func['data_nascimento'])?$func['data_nascimento']:'';?>" maxlength="14" required />
                </div>
            </div>
            
            <div class="form-group row">
                <label for="telefone_celular" class="col-sm-3 col-form-label">Celular:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" value="<?= isset($func['telefones'][0])?$func['telefones'][0]:'';?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_whatsapp" class="col-sm-3 col-form-label">Celular(Whatsapp):</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="telefone_whatsapp" name="telefone_whatsapp" value="<?= isset($func['telefones'][1])?$func['telefones'][1]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_contato" class="col-sm-3 col-form-label">Telefone Contato:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="telefone_contato" name="telefone_contato" value="<?= isset($func['telefones'][2])?$func['telefones'][2]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_residencial" class="col-sm-3 col-form-label">Telefone Residencial:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="telefone_residencial" name="telefone_residencial" value="<?= isset($func['telefones'][3])?$func['telefones'][3]:'';?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto:</label>
                <div class="col-sm-9">
                <input type="file" class="form-control-file" id="foto" name="foto" required />
                </div>
            </div>
            <p>		  
                <input type="submit" value="Cadastrar Funcionário" class="btn btn-primary"/>
            </p>    
        </form>
        
        <a href="<?=BASE_URL;?>funcionario" class="btn btn-danger">Voltar</a>
    </div>
</div>