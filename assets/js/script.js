console.log(BASE_URL);

$(document).ready(function(){
    $('.data_nasc').mask('00/00/0000');
    $('.cpf').mask('000.000.000-00', {reverse: true})
    $('.telefone').mask('(00) 0000-0000');
    $('.rg').mask('000.000.000');

    // PÁGINA FUNCIONÁRIO -SELECIONAR OS TELEFONES
    $('.selecione_func').change(function() {        
        var funcionario = $(this).parents('td').attr('data-id');
        funcionario = JSON.parse(funcionario);
        
        if($(this).is(':checked')) {
            requisitar_telefones(funcionario);            
        } else {
            //$('#body_telefone').empty();
            $('#tabela-'+funcionario.codigo).remove();
        }
    });

});


function requisitar_telefones(funcionario) {
    var url = BASE_URL + 'Ajax/pesquisarTelefonesDeFuncionario/'+funcionario.codigo;
    
    $.ajax({
        'url': url,
        'type' : 'POST',
        'dataType': 'json',
        success: function(data) {            
            //$('#body_telefone').empty();
            var div = $('<div id="tabela-'+funcionario.codigo+'">');
            var tabela = $('<table class="table">');
            var h2 = $('<h2>');
            h2.text(funcionario.nome);

            var linha = $("<tr>");
                var colunas = "";
                    colunas += '<th>Telefones</th>';
                    colunas += '<th>Ações</th>';
                linha.append(colunas);
            tabela.append(linha);

            for(indice in data) {                
                tabela.append(criar_linha(data[indice]['codigo_tel'], data[indice]['tel_contato']));
            }

            div.append(h2);
            div.append(tabela);           
            $('#body_telefone').append(div);
        }
    });
}

function criar_linha(id_tel, telefone) {
    var novaLinha = $("<tr>");        
    var colunas = "";	
        colunas += '<td>'+telefone+'</td>';	            	    
        colunas += '<td data-id_tel="'+id_tel+'">';	    
        colunas += '<button onclick="RemoverLinha(this)" type="button" class="btn btn-danger">Remover</button>';	    
        colunas += '</td>';	
        novaLinha.append(colunas);

        return novaLinha;
}

function RemoverLinha(linha) {
    console.log(linha);
}

	    