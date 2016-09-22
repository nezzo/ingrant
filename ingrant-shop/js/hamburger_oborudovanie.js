  $(document).ready(function(){
  
   $( ".cross_oborudovanie" ).hide();
  //$( ".menu-top" ).hide();
  $( ".hamburger_oborudovanie" ).click(function() {
  $( ".ochen-left-td" ).slideToggle( "slow", function() {
  $( ".hamburger_oborudovanie" ).hide();
  $( ".cross_oborudovanie" ).show();
  });
  });

  $( ".cross_oborudovanie" ).click(function() {
  $( ".ochen-left-td" ).slideToggle( "slow", function() {
  $( ".cross_oborudovanie" ).hide();
  $( ".hamburger_oborudovanie" ).show();
  });
  });
     
  
});