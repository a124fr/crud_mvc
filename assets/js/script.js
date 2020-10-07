//alert('Foi carregado!');

function myFunction($id) {
    alert('Olá! Codigo_Func: '+$id);
    $.ajax({
        'url': '<?=BASE_URL;?>',        
    });
};

$(document).ready(function(){
    $('.data_nasc').mask('00/00/0000');
    $('.cpf').mask('000.000.000-00', {reverse: true})
    $('.telefone').mask('(00) 0000-0000');
    $('.rg').mask('000.000.000');
});