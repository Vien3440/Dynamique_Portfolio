/*****header*****/

 $(window).on('resize',function() { 
 }); 
 $("#fond1").css("height", window.innerHeight );
 
 $(document).ready(function() {
  // $(window).resize() est appelée chaque fois que la fenêtre est redimensionnée par l'utilisateur.
  
    $("#blockLogo").css({
      position:'absolute',
      right:($(window).width() - $("#blockLogo").outerWidth()) / 2,
      top:($(window).height() - $("#blockLogo").outerHeight()) / 2
    });
  
});
 
//window.innerWidth
//window.innerHeight
//window.outerWidth
//window.outerHeight


/*******Barnav*****/


 
/*******Nav Reponsivie*****/





