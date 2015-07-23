$("#searcher").on('input', function(){
    _this = this;

    // Show only matching TR, hide rest of them
    if($(this).val() != "") {
        $('#qs_tableTotal').hide();
        $('#navPagination').remove();
        $('#qs_tableTotalBusquedas').show();
        contador = 0;
	    $.each($("#qs_tableTotalBusquedas tbody").find("tr"), function() {
	        //console.log($(this).text());
	        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
	            $(this).hide();
	        else {
                contador=1;
	            $(this).show();                
	        }
	    });
        if(contador == 0) {
            if($('#resultadosBusquedaPublicaciones').length == 0) {
                $('#qs_tableTotalBusquedas').after('<div id="resultadosBusquedaPublicaciones" style="padding-top: 10px;">No existen resultados</div>');
            }
            $('#qs_tableTotalBusquedas').hide();
        } else {
            $('#resultadosBusquedaPublicaciones').remove();
        }

    }
/*
    var rowsShown = 10;
    var rowsTotal = $('#qs_tableTotal tbody tr').length - cuenta_hides($('#qs_tableTotal tbody tr'));
    var numPages = rowsTotal/rowsShown;
            for(i = 0;i < numPages;i++) {
                var pageNum = i + 1;
                $('#navPagination').append('<a href="#pagina" rel="'+i+'">'+pageNum+'</a> ');
            }

    $('#qs_tableTotal tbody tr').hide();
            $('#qs_tableTotal tbody tr').slice(0, rowsShown).show();
            $('#navPagination a:first').addClass('active');
            $('#navPagination a').bind('click', function(){
 
                $('#navPagination a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#qs_tableTotal tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                        css('display','table-row').animate({opacity:1}, 300);
                    });*/
}); 

/*function cuenta_hides(miElemento) {
	contador = 0;

	$.each($("#qs_tableTotal tbody").find("tr"), function(){
		if(($(this).attr('display')) == "none")
			contador++;
	});
	console.log("contador " + contador);
	return contador;
}*/

