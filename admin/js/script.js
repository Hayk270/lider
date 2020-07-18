$(document).ready(function() {

	$('.delete').click(function(){
		
		var rel = $(this).attr("rel");
		
		$.confirm({
			'title'		: 'Հաստատել հեռացումը',
			'message'	: 'Հեռացնելուց հետո Դուք չեք կարողանա այն վերականգնել: Շարունակե՞լ',
			'buttons'	: {
				'Այո'	: {
					'class'	: 'blue',
					'action': function(){
						location.href = rel;
					}
				},
				'Ոչ'	: {
					'class'	: 'gray',
					'action': function(){}
				}
			}
		});
		
	});
	$('#select-links').click(function(){
	$('#list-links').slideToggle(500);	
	});
	$('.delete-cat').click(function(){
    
   var selectid = $("#cat_type option:selected").val();
     
   if (!selectid)
   {
       $("#cat_type").css("borderColor","#F5A4A4");
   }else
   {
  $.ajax({
  type: "POST",
  url: "actions/delete-category.php",
  data: "id="+selectid,
  dataType: "html",
  cache: false,
  success: function(data) {
    
  if (data == "delete")
  {
     $("#cat_type option:selected").remove();
  }
                          }
         });       
   }
              
});
	 $('.block-clients').click(function(){

 $(this).find('ul').slideToggle(300);
   
 });
	$('#select-all').click(function(){
    $(".privilege input:checkbox").attr('checked', true);           
});

$('#remove-all').click(function(){
    $(".privilege input:checkbox").attr('checked', false);           
});
	$('#select-links').click(function(){
	$('#list-links-sort').slideToggle(200);	
	});
	});