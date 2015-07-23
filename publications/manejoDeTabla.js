function miPaginado() {
            $('#qs_tableTotal').after('<div id="navPagination"></div>');
            var rowsShown = 10;
            var rowsTotal = $('#qs_tableTotal tbody tr').length;
            var numPages = rowsTotal/rowsShown;
            for(i = 0;i < numPages;i++) {
                var pageNum = i + 1;
                $('#navPagination').append('<a href="#pagina'+pageNum+ '" rel="'+i+'">'+pageNum+'</a> ');
            }
            $('#qs_tableTotal tbody tr').hide();
            $('#qs_tableTotal tbody tr').slice(0, rowsShown).show();
            $('#navPagination a:first').addClass('paginaActiva');
            $('#navPagination a').bind('click', function(){
 
                $('#navPagination a').removeClass('paginaActiva');
                $(this).addClass('paginaActiva');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#qs_tableTotal tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                        css('display','table-row').animate({opacity:1}, 300);
            });
        }

function showAllRows() {
    $('#qs_tableTotal tbody tr').css('opacity','0.0').hide().slice(0, 10).
                        css('display','table-row').animate({opacity:1}, 300);

}


$(document).ready(function(){
    $('#qs_tableTotalBusquedas').hide();
    miPaginado();
});

$(document).ready(function() {
    $('#searcher').on('input', function (){
        //console.log("Entro en el change");
        //console.log($('#searcher').val());
        if($("#searcher").val() == "") {
            //console.log("Me ejecuto");
            $('#qs_tableTotalBusquedas').hide();
            showAllRows();
            $('#qs_tableTotal').show();
            miPaginado();
        }
    });
})


