$(document).ready(function() {
$('.add-search').click(function(){
 
 var  tid = $(this).attr("tid");

 $.ajax({
  type: "POST",
  url: "../include/addtocart.php",
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) { 
  loadcart();
}
});
	
});

function loadcart(){
     $.ajax({
  type: "POST",
  url: "../include/loadcart.php",
  dataType: "html",
  cache: false,
  success: function(data) {
    
  if (data == "0")
  {
  
    $("#block_basket > a").html("Զամբյուղը դատարկ է");
	
  }else
  {
    $("#block_basket > a").html(data);

  }  
    
      }
});    
       
}
});