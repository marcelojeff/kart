$(document).ready(function(){
    $('a[data-type="simulation-btn"]').click(function(e){
        e.preventDefault();
        var modalContainer = $('div[data-type="simulation-modal"]');
        $.get($(this).attr('href'), function(page){
            $('div[data-type="modal-content"]').html(page);
            modalContainer.modal('show');
        }, 'html');
    });

    $('.btn-remove-kart').click(function(){
        if (! confirm('Tem certeza que deseja excluir esse kart?'))
        {
            return false;       
        }
    });
    $('.btn-remove-race').click(function(){
    	if (! confirm('Tem certeza que deseja excluir essa corrida?'))
    	{
    		return false;		
    	}
    });

});
