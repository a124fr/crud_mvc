<div class="row">
    <div class="col-12">
        <h2>Funcionários</h2>
    </div>
</div>
<div class="row" style="margin-top:10px;">    
    <div class="col-12">
    <?php foreach($lista_funcs as $func):?>        
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">                
                    <img src="<?=BASE_URL.'assets/images/funcionarios/'.$func['foto'];?>" class="card-img" width="300" alt="" />
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?=$func['nome_completo'];?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Data de Nascimento: <?=$func['data_nascimento'];?></small></p>
                </div>
                </div>
            </div>
        </div>    
    <?php endforeach;?>
    </div>
</div>