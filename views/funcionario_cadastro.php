<div class="row justify-content-center">
    <h2>Cadastro de Funcionário</h2>
</div>
<div class="row justify-content-center">    
    <div class="col-6">
            <form method="POST" action="<?=BASE_URL;?>funcionario/cadastro_func" enctype="multipart/form-data">          
            <div class="form-group row">
                <label for="primeiro_nome" class="col-sm-3 col-form-label">Primeiro Nome:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome"  required />
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-3 col-form-label">Nome Completo:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nome" name="nome"  required />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-sm-3 col-form-label">CPF:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="rg" class="col-sm-3 col-form-label">RG:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="rg" name="rg" maxlength="14" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="data_nasc" class="col-sm-3 col-form-label">Data Nasc:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="data_nasc" name="data_nasc" maxlength="14" required />
                </div>
            </div>
            
            <div class="form-group row">
                <label for="telefone_celular" class="col-sm-3 col-form-label">Celular:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_whatsapp" class="col-sm-3 col-form-label">Celular(Whatsapp):</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="telefone_whatsapp" name="telefone_whatsapp" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_contato" class="col-sm-3 col-form-label">Telefone Contato:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="telefone_contato" name="telefone_contato" />
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone_residencial" class="col-sm-3 col-form-label">Telefone Residencial:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="telefone_residencial" name="telefone_residencial" />
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
        
    </div>
</div>