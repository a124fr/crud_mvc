//alert('Foi carregado!');

function myFunction($id) {
    alert('Olá! Codigo_Func: '+$id);
    $.ajax({
        'url': '<?=BASE_URL;?>',        
    });
};