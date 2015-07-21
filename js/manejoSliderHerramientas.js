$(document).ready(function() {
      $("#owl-demo-herramientas").owlCarousel({
       singleItem:true,
       slideSpeed : 300,
       paginationSpeed : 400,
       autoPlay: 5000,
       loop:true,  
       autoplayTimeout:1000,
       autoplayHoverPause:true, 
       navigation:true,
       navigationText:false,
       pagination: false
     });
});

$('.botonFlipHerramientas').click(function(event) {
      var opcion = $(this).text();

      if(opcion == "All tools"){
            $("div.span12").slideUp(function() {
                  //$(".owl-wrapper-outer").css({'display':'false'});
                  $(".lista-herramientas-totales").css({'display':'true'});
                  $(".lista-herramientas-totales").slideDown(1000);

            });
            $(this).text("Back");
      }
      else {
            $(this).text("All tools");
            $(".lista-herramientas-totales").slideUp(1000, function() {
                  $("div.span12").css({'display':'true'});
                  $("div.span12").slideDown();
            });   
      }
      event.preventDefault();
});