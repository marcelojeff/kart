$(document).ready(function(){
    $('a[data-type="simulation-btn"]').click(function(e){
        e.preventDefault();
        var modalContainer = $('div[data-type="simulation-modal"]');
        $.get($(this).attr('href'), function(page){
            $('div[data-type="modal-content"]').html(page);
            modalContainer.modal('show');
        }, 'html');
    });
    $('a[data-type="delete-btn"]').click(function(e){
        return confirm('Deseja realmente excluir esse registro?');
    });
});