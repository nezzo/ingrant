  $(document).ready(function(){
    // Returns width of browser viewport
  var browser = $(window).width();
    
  $( ".cross" ).hide();
  //$( ".menu-top" ).hide();
  $( ".hamburger" ).click(function() {
  $( ".menu-top" ).slideToggle( "slow", function() {
  $( ".hamburger" ).hide();
  $( ".nivo-prevNav" ).hide();
  $( ".nivo-nextNav" ).hide(); 
  $( ".vertical_button" ).hide(); 
  $( ".cross" ).show();
  });
  });

  $( ".cross" ).click(function() {
  $( ".menu-top" ).slideToggle( "slow", function() {
  $( ".cross" ).hide();
  $( ".hamburger" ).show();
  $( ".nivo-prevNav" ).show();
  $( ".nivo-nextNav" ).show(); 
  $( ".vertical_button" ).show();
  });
  });
  });
    
  
    
    
  