  $(document).ready(function(){
  
   $( ".cross_uslugi" ).hide();
  //$( ".menu-top" ).hide();
  $( ".hamburger_uslugi" ).click(function() {
  $( ".right-td" ).slideToggle( "slow", function() {
  $( ".hamburger_uslugi" ).hide();
  $( ".cross_uslugi" ).show();
  });
  });

  $( ".cross_uslugi" ).click(function() {
  $( ".right-td" ).slideToggle( "slow", function() {
  $( ".cross_uslugi" ).hide();
  $( ".hamburger_uslugi" ).show();
  });
  });
     
  
});