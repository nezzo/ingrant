  $(document).ready(function(){
    // Returns width of browser viewport
  var browser = $(window).width();
    
  $( ".cross_vertical" ).hide();
  $( ".menu-left" ).hide();
  $( ".hamburger_vertical" ).click(function() {
  $( ".menu-left" ).slideToggle( "slow", function() {
  $( ".cross_vertical" ).show();
  $( ".hamburger_vertical" ).hide();
  $( ".nivo-prevNav" ).hide();
  $( ".nivo-nextNav" ).hide();
  $( ".left-td" ).css('width','50%'); 
//   $( ".vertical_button" ).hide(); 
  $( ".cross_vertical" ).show();
  });
  });

  $( ".cross_vertical" ).click(function() {
  $( ".menu-left" ).slideToggle( "slow", function() {
  $( ".cross_vertical" ).hide();
  $( ".hamburger_vertical" ).show();
  $( ".nivo-prevNav" ).show();
  $( ".nivo-nextNav" ).show(); 
  $( ".left-td" ).css('width','5%'); 
//   $( ".vertical_button" ).show();
  });
  });
  });
    
  
    
    
  