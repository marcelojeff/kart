$(document).ready(function(){
    $('a[data-type="simulation-btn"]').click(function(e){
        e.preventDefault();
        var modalContainer = $('div[data-type="simulation-modal"]');
        $.get($(this).attr('href'), function(page){
            $('div[data-type="modal-content"]').html(page);
            modalContainer.modal('show');
        }, 'html');
    });
});