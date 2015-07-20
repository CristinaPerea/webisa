	$(document).ready(function(){
            $('#qs_tableTotal').after('<div id="nav"></div>');
            var rowsShown = 10;
            var rowsTotal = $('#qs_tableTotal tbody tr').length;
            var numPages = rowsTotal/rowsShown;
            for(i = 0;i < numPages;i++) {
                var pageNum = i + 1;
                $('#nav').append('<a href="#pagina" rel="'+i+'">'+pageNum+'</a> ');
            }
            $('#qs_tableTotal tbody tr').hide();
            $('#qs_tableTotal tbody tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');
            $('#nav a').bind('click', function(){
 
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#qs_tableTotal tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                        css('display','table-row').animate({opacity:1}, 300);
            });
        });