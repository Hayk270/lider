$(document).ready(function() {
loadcart();
loadcartbasket();
itog_price();
	
$("#style-grid") .click(function(){
	
$("#block-tovar-list") .hide();
$("#block-tovar-grid") .show();
	
$("#style-grid") .attr("src","/Images/grid-icon-active.png");
$("#style-list") .attr("src","/Images/List-icon.png");
$.cookie('select_style','grid');
})	
	
$("#style-list") .click(function(){
	
$("#block-tovar-grid") .hide();
$("#block-tovar-list") .show();
	
$("#style-list") .attr("src","/Images/List-icon-active.png");
$("#style-grid") .attr("src","/Images/grid-icon.png");
$.cookie('select_style','list');
});
	
if ($.cookie('select_style') == 'grid' )
{
$("#block-tovar-list") .hide();
$("#block-tovar-grid") .show();
	
$("#style-grid") .attr("src","/Images/grid-icon-active.png");
$("#style-list") .attr("src","/Images/List-icon.png");
}
else
{$("#block-tovar-grid") .hide();
$("#block-tovar-list") .show();
	
$("#style-list") .attr("src","/Images/List-icon-active.png");
$("#style-grid") .attr("src","/Images/grid-icon.png");
}
	
$("#select-sort").click(function(){
	$("#sorting-list").slideToggle;
})
	

$('#block-category ul li a').click(function(){
 if ($(this).attr('class') !='active'){
  $('#block-category ul li ul').slideUp(400); 
  $(this).next().slideToggle(400); 
 $('#block-category ul li a').removeClass('active'); 
 $(this).addClass('active');
 }else
 {
  $('#block-category ul li a').removeClass('active');
  $('#block-category ul li ul').slideUp(400);
 }
});

$("#select-sort").click(function(){
	
$("#sorting-list").slideToggle(200);
	
});
	
$('#parameter').click(function(){
 if ($(this).attr('class') !='active'){
  $('#block-parameter').slideUp(400); 
  $(this).next().slideToggle(400); 
 $('#parameter').removeClass('active'); 
 $(this).addClass('active');
 }else
 {
  $('#parameter').removeClass('active');
  $('#block-parameter').slideUp(400);
 }
});
	$('#reloadcaptcha').click(function(){
$('#block-captcha > img').attr("src","/reg/reg_captcha.php?r="+ Math.random());
});
	
	$('.top-auth').toggle(
       function() {
           $(".top-auth").attr("id","active-button");
           $("#block-top-auth").fadeIn(200);
		   $('.email-label').removeClass('active-label');
		   $('.pass-label').removeClass('active-label');	
       },
       function() {
           $(".top-auth").attr("id","");
           $("#block-top-auth").fadeOut(200); 
		   $('.email-label').removeClass('active-label');
		   $('.pass-label').removeClass('active-label');
       }
    )
	$('#button-pass-show-hide').click(function(){
 var statuspass = $('#button-pass-show-hide').attr("class");
  
    if (statuspass == "pass-show")
    {
       $('#button-pass-show-hide').attr("class","pass-hide");
       
     			            var $input = $("#auth_pass");
			                var change = "text";
			                var rep = $("<input type='" + change + "' >")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
        
    }else
    {
        $('#button-pass-show-hide').attr("class","pass-show");
        
     			            var $input = $("#auth_pass");
			                var change = "password";
			                var rep = $("<input type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;        
       
    }
   
  }); 
	
$("#button-auth").click(function() {
        
 var auth_email = $("#auth_email").val();
 var auth_pass = $("#auth_pass").val();

 
 if (auth_email == "" )
 {
    $("#auth_email").css("borderColor","#FDB6B6");
    send_email = 'no';
 }else {
    
   $("#auth_email").css("borderColor","#DBDBDB");
   send_email = 'yes'; 
      }

 
if (auth_pass == "" )
 {
    $("#auth_pass").css("borderColor","#FDB6B6");
    send_pass = 'no';
 }else { $("#auth_pass").css("borderColor","#DBDBDB");  send_pass = 'yes'; }
	
 if ($("#rememberme").prop('checked'))
 {
    auth_rememberme = 'yes';

 }else { auth_rememberme = 'no'; }

 if ( send_email == 'yes' && send_pass == 'yes' )
 { 
  $("#input-email-pass").hide();
  $("#block_please_wait").show();
    
    $.ajax({
  	type: "POST",
  	url: "/include/auth.php",
  	data: "email="+auth_email+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
  	dataType: "html",
	cache: false,
  	success: function(data) {

  if (data == 'yes_auth')
  {
	  $("#please_wait").hide();
	  $("#please").fadeIn(200);
      location.reload();
  }else
  {
      $("#message-auth").slideDown(400);
      $("#block_please_wait").hide();
      $("#input-email-pass").show();
      
  }
  
}
});  
}
}); 
	$('#remindpass').click(function(){
    
			$('#input-email-pass').fadeOut(200, function() {  
            $('#block-remind').fadeIn(300);
			});
});

$('#prev-auth').click(function(){
    
			$('#block-remind').fadeOut(200, function() {  
            $('#input-email-pass').fadeIn(300);
			});
});
	$('#button-remind').click(function(){
    
 var recall_email = $("#remind-email").val();
 
 if (recall_email == "" )
 {
    $("#remind-email").css("borderColor","#FDB6B6");

 }else 
 {
   $("#remind-email").css("borderColor","#DBDBDB");
   
   $("#remind-block").hide();
   $("#block_please_wait").show();
    
  $.ajax({
  type: "POST",
  url: "/include/remind-pass.php",
  data: "email="+recall_email,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'yes')
  {
     $("#block_please_wait").hide();
     $("#remind-block").show();
     $('#message-remind').attr("class","message-remind-success").html("Ձեր էլ. փոստի ուղարկվել է նոր գաղտնաբառ").slideDown(400);
     
     setTimeout("$('#message-remind').html('').hide(),$('#block-remind').hide(),$('#input-email-pass').show()", 2500);
 
  }else
  {
      $("#block_please_wait").hide();
      $("#remind-block").show();
      $('#message-remind').attr("class","message-remind-error").html(data).slideDown(400);
      
  }
  }
}); 
  }
  }); 
	 $('#auth-user-info').toggle(
       function() {
           $("#block-user").fadeIn(100);
       },
       function() {
           $("#block-user").fadeOut(100);
       }
    );
	$('#logout').click(function(){
    
    $.ajax({
  type: "POST",
  url: "/include/logout.php",
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'logout')
  {
      location.reload();
  }
  
}
}); 
});
	$('#input-search').bind('textchange', function () {
                 
 var input_search = $("#input-search").val();

if (input_search.length >= 2 && input_search.length < 150 )
{
 $.ajax({
  type: "POST",
  url: "/include/search.php",
  data: "text="+input_search,
  dataType: "html",
  cache: false,
  success: function(data) {

 if (data > '')
 {
     $("#result-search").show().html(data); 
 }else{
    
    $("#result-search").hide();
 }

      }
}); 

}else
{
  $("#result-search").hide();    
}

});
	
    //Шаблон проверки email на правильность
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }
 // Контактные данные
  $('#confirm-button-next').click(function(e){   
	  
	  var order_name = $("#order_name").val();
	  var order_surname = $("#order_surname").val();
	  var order_email = $("#order_email").val();
	  var order_street = $("#order_street").val();
	  var order_house = $("#order_house").val();
	  var order_enter = $("#order_enter").val();
	  var order_flat = $("#order_flat").val();
	  var order_floar = $("#order_floar").val();
	  var order_phone = $("#order_phone").val();
   
 if (!$(".order_delivery").is(":checked"))
 {
    $(".label_delivery").css("color","#E07B7B");
    send_order_delivery = '0';

 }else { $(".label_delivery").css("color","black"); send_order_delivery = '1';

  
  // Проверка ФИО 
 if (order_name == "" || order_name.length > 50 )
 {
    $("#order_name").css("borderColor","#FDB6B6");
   send_order_name = '0';
   
 }else { $("#order_name").css("borderColor","#DBDBDB");  send_order_name = '1';}

// Проверка enter 
  if (order_surname == "" || order_surname.length > 50)
 {
    $("#order_surname").css("borderColor","#FDB6B6");
    send_order_surname = '0';   
 }else { $("#order_surname").css("borderColor","#DBDBDB"); send_order_surname = '1';}
  
 //проверка email
 if (isValidEmailAddress(order_email) == false)
 {
    $("#order_email").css("borderColor","#FDB6B6");
  send_order_email = '0';   
 }else { $("#order_email").css("borderColor","#DBDBDB"); send_order_email = '1';}
  
 // Проверка телефона
 
  if (order_phone == "" || order_phone.length > 50)
 {
    $("#order_phone").css("borderColor","#FDB6B6");
    send_order_phone = '0';   
 }else { $("#order_phone").css("borderColor","#DBDBDB"); send_order_phone = '1';}
		
// Проверка улицы
 
  if (order_street == "" || order_street.length > 50)
 {
    $("#order_street").css("borderColor","#FDB6B6");
    send_order_street = '0';   
 }else { $("#order_street").css("borderColor","#DBDBDB"); send_order_street = '1';}	
  
} 
 // Глобальная проверка
 if (send_order_delivery == "1" && send_order_name == "1" && send_order_surname == "1" && send_order_email == "1" && send_order_street == "1" && send_order_phone == "1")
 {
    // Отправляем форму
   return true;
 }

e.preventDefault();

});
$('.add-cart-style-list, .add-cart-style-grid, .add-cart, .view_category_add_cart').click(function(){
 
 var  tid = $(this).attr("tid");

 $.ajax({
  type: "POST",
  url: "/include/addtocart.php",
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) { 
  loadcart();
  location.reload();
}
});
});
	
$('.add-random-cart, .add-random-cart-sale').click(function(){
 
 var  tid = $(this).attr("tid");

 $.ajax({
  type: "POST",
  url: "/include/addtocart.php",
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
  url: "/include/loadcart.php",
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
	
function loadcartbasket(){
     $.ajax({
  type: "POST",
  url: "/include/loadcart-basket.php",
  dataType: "html",
  cache: false,
  success: function(data) {
    
  if (data == "0")
  {
    $("#block_basket > a").html("Զամբյուղը դատարկ է");
  }else
  {
    $(".itog-price-basket #itog-count").html(data);
  } 
      }
});    
       
}	

function fun_group_price(intprice) {  
    // Группировка цифр по разрядам
  var result_total = String(intprice);
  var lenstr = result_total.length;
  
    switch(lenstr) {
  case 4: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4);
    break;
  }
  case 5: {
  groupprice = result_total.substring(0,2)+" "+result_total.substring(2,5);
    break;
  }
  case 6: {
  groupprice = result_total.substring(0,3)+" "+result_total.substring(3,6); 
    break;
  }
  case 7: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4)+" "+result_total.substring(4,7); 
    break;
  }
  case 8: {
  groupprice = result_total.substring(0,2)+" "+result_total.substring(2,5)+" "+result_total.substring(5,8); 
    break;
  }
  case 9: {
  groupprice = result_total.substring(0,3)+" "+result_total.substring(3,6)+" "+result_total.substring(6,9); 
    break;
  }		
  default: {
  groupprice = result_total;  
  }
}  
    return groupprice;
    }
	
	$('.count-minus').click(function(){

  var iid = $(this).attr("iid");      
 
 $.ajax({
  type: "POST",
  url: "/include/count-minus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();
  
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դրամ");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});
	
$('.count-minus-basket').click(function(){

  var iid = $(this).attr("iid");      
 
 $.ajax({
  type: "POST",
  url: "/include/count-minus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();
  
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դր");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});

$('.count-plus').click(function(){

  var iid = $(this).attr("iid");      
  
 $.ajax({
  type: "POST",
  url: "/include/count-plus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();	  
  
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դրամ");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});
	
$('.count-plus-basket').click(function(){

  var iid = $(this).attr("iid");      
  
 $.ajax({
  type: "POST",
  url: "/include/count-plus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();	  
  
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դր");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});
	$('.count-input').keypress(function(e){
    
 if(e.keyCode==13) {
	   
 var iid = $(this).attr("iid");
 var incount = $("#input-id"+iid).val();        
 
 $.ajax({
  type: "POST",
  url: "/include/count-input.php",
  data: "id="+iid+"&count="+incount,
  dataType: "html",
  cache: false,
  success: function(data) {
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();	   
    
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);


  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դրամ");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  itog_price();

      }
}); 
  }
});
	
$('.count-input-basket').keypress(function(e){
    
 if(e.keyCode==13){
	   
 var iid = $(this).attr("iid");
 var incount = $("#input-id"+iid).val();        
 
 $.ajax({
  type: "POST",
  url: "/include/count-input.php",
  data: "id="+iid+"&count="+incount,
  dataType: "html",
  cache: false,
  success: function(data) {
  $("#input-id"+iid).val(data);  
  loadcart();
  loadcartbasket();	   
    
  // переменная с ценной продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на колличество
  result_total = Number(priceproduct) * Number(data);


  $("#tovar"+iid+" > p").html(fun_group_price(result_total)+" դր");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  itog_price();

      }
}); 
  }
});

function  itog_price(){
 
 $.ajax({
  type: "POST",
  url: "/include/itog_price.php",
  dataType: "html",
  cache: false,
  success: function(data) {
  $(".itog-price > strong").html(data);
  $(".itog-price-basket #itog").html(data);
}
}); 
       
}
$('#block-category_header ul li a').click(function(){
 if ($(this).attr('class') !='active'){
  $('#block-category_header ul li div').hide(); 
  $(this).next().toggle(); 
 $('#block-category_header ul li a').removeClass('active'); 
 $(this).addClass('active');
 }else
 {
  $('#block-category_header ul li a').removeClass('active');
  $('#block-category_header ul li div').hide();
 }
});
	$("#random-image").jCarouselLite({
		horizantal: true,
  		btnPrev: "#tovar-prev",
  		btnNext: "#tovar-next",		
	  	visible: 4,
	  	speed: 700,
		scroll: 4,
 });
	$("#random-image-sale").jCarouselLite({
		horizantal: true,
  		btnPrev: "#tovar-prev-sale",
  		btnNext: "#tovar-next-sale",
	  	visible: 4,
	  	speed: 700,
		scroll: 4,
});
	function backToTop() {
		let button = $('.back-to-top');
		
	$(window).on('scroll', () => {
		if($(this).scrollTop() >= 285) {
			button.fadeIn();
		}else {
			button.fadeOut();
		}
	});	
		
	button.on('click', (e) => {
		e.preventDefault();
		$('html').animate({scrollTop: 0}, 500);
	})	
	} 
	backToTop()
	
	$(".enter-input").keypress(function(e){
    
 if(e.keyCode==13) {
        
 var auth_email = $("#auth_email").val();
 var auth_pass = $("#auth_pass").val();

 
 if (auth_email == "" )
 {
    $("#auth_email").css("borderColor","#FDB6B6");
    send_email = 'no';
 }else {
    
   $("#auth_email").css("borderColor","#DBDBDB");
   send_email = 'yes'; 
      }

 
if (auth_pass == "" )
 {
    $("#auth_pass").css("borderColor","#FDB6B6");
    send_pass = 'no';
 }else { $("#auth_pass").css("borderColor","#DBDBDB");  send_pass = 'yes'; }
	
 if ($("#rememberme").prop('checked'))
 {
    auth_rememberme = 'yes';

 }else { auth_rememberme = 'no'; }

 if ( send_email == 'yes' && send_pass == 'yes' )
 { 
  $("#input-email-pass").hide();
  $("#block_please_wait").show();
    
    $.ajax({
  	type: "POST",
  	url: "/include/auth.php",
  	data: "email="+auth_email+"&pass="+auth_pass,
  	dataType: "html",
	cache: false,
  	success: function(data) {

  if (data == 'yes_auth')
  {
	  $("#please_wait").hide();
	  $("#please").fadeIn(200);
      location.reload();
  }else
  {
      $("#message-auth").slideDown(400);
      $("#block_please_wait").hide();
      $("#input-email-pass").show();
      
  }
  
}
});  
}
}
}); 
	$('#remind-email').keypress(function(e){
    
 if(e.keyCode==13) {
    
 var recall_email = $("#remind-email").val();
 
 if (recall_email == "" )
 {
    $("#remind-email").css("borderColor","#FDB6B6");

 }else 
 {
   $("#remind-email").css("borderColor","#DBDBDB");
   
   $("#remind-block").hide();
   $("#block_please_wait").show();
    
  $.ajax({
  type: "POST",
  url: "/include/remind-pass.php",
  data: "email="+recall_email,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'yes')
  {
     $("#block_please_wait").hide();
     $("#remind-block").show();
     $('#message-remind').attr("class","message-remind-success").html("Ձեր էլ. փոստի ուղարկվել է նոր գաղտնաբառ").slideDown(400);
     
     setTimeout("$('#message-remind').html('').hide(),$('#block-remind').hide(),$('#input-email-pass').show()", 2500);
 
  }else
  {
      $("#block_please_wait").hide();
      $("#remind-block").show();
      $('#message-remind').attr("class","message-remind-error").html(data).slideDown(400);
      
  }
  }
}); 
  }
	}
  });
});