$(function(){
	
    //abre menu
	$('html, body').on('click', function(e){
		if(e.target == document.documentElement){
			$('html').removeClass('open-sidebar');
		}
	});
	
	$('.js-open-sidebar').on('click', function (){
		$('html').addClass('open-sidebar');
	});
    //abre menu fim
    
    
    //listagem
    $('.js-icone-quadrado').on('click', function (){
		$('.listagem').addClass('js-quadrado');
	});
    
     $('.js-icone-listagem').on('click', function (){
		$('.listagem').removeClass('js-quadrado');
	});
    //listagem fim
    
    
    //ícones listagem
    $('.js-icone-quadrado').on('click', function (){
		$('.js-icone-quadrado').addClass('ativo');
        $( ".js-icone-listagem" ).removeClass( "ativo" );
	});
    
    $('.js-icone-listagem').on('click', function (){
		$('.js-icone-listagem').addClass('ativo');
        $( ".js-icone-quadrado" ).removeClass( "ativo" );
        
	});
    //ícones listagem fim
    
    //paginação    
    $('.paginacao ul li a').click(function(){
        $('.paginacao li a').removeClass("ativo");
        $(this).addClass("ativo");
    });
    //paginação fim
    
    //modal
    $('.bts strong, .bt-editar').on('click', function (){
        $( ".modal-body" ).addClass( "visivel" );
	});
    //modal fim

     $('#estados-brasileiros').modal('show');
});