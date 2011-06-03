// JavaScript Document
$(document).ready(function(){
						
	$('.add_user').css('display','none');//hide the add section
	$('.hide').css('cursor','pointer');
   $('#menu').click(function(){
									 //  event.preventdefault();
				$('.add_user').slideDown(800);	
				
									  
									  });						   
	$('.hide').click(function(){
							  
					$('.add_user').fadeOut(400);			  
							  
							  });
	
	
	
	$('.delete').click(function(event){
		event.preventDefault();
		myid = $(this).attr('href');
		$("#dialog").dialog("destroy");

		$("#dialog-confirm").dialog({
								
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'Delete': function() {
					//ajax called in css
					
					$.post("deleteparcel.php",{id:myid},
						   
						   function(data) {
							  if(data==1)
							  {
								 
								
								 //success hide record
								 $("#dialog-confirm").dialog('close');
								$('.tr_'+myid).css("display","none");
								
							  }
							  else{
								//error 
								$(this).dialog('close');
								  }}
							);
					//$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});

		
		});
});

