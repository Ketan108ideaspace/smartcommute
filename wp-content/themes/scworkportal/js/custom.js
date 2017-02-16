jQuery(document).ready(function(){
	
	jQuery("input[name='copyright']").click(function(){
	if( jQuery("input[name='copyright']").is(":checked")){
		jQuery('div#step2').css("display","block");
		
	}
	else{
		
		jQuery('div#step2').css("display","none");
		 jQuery('div#step3').css("display","none");
		  jQuery('div#step4').css("display","none");
		  jQuery('div#step5').css("display","none");
	}
	
	});
	 jQuery("input[name='resource_file[]']").change(function (){
       var resource_file = jQuery(this).val();
       if(resource_file!=''){
		  jQuery('div#step3').css("display","block");
	   }
	   else{
		  jQuery('div#step3').css("display","none");
		  jQuery('div#step4').css("display","none");
		  jQuery('div#step5').css("display","none");
	   }
     });
	 
	 jQuery("input[name='video_url']").keyup(function(){
		 var video_url = jQuery(this).val();
		  if(video_url!=''){
		  jQuery('div#step3').css("display","block");
	   }
	   else{
		  jQuery('div#step3').css("display","none");
		  jQuery('div#step4').css("display","none");
		  jQuery('div#step5').css("display","none");
	   }
	 });
	 
	 
	jQuery("input[name='folder']").click(function(){
	if( jQuery("input[name='folder']").is(":checked")){
		
		var category_id = jQuery(this).val();
var tab_html  = '';
		jQuery('div#step4').css("display","block");
		jQuery.ajax({
			url: obj.ajax_url,
			data:{ action: 'load_tabs',category_id: category_id},
			type: "POST",
		   dataType: "json",
			success: function(response){
				
				for (var key in response)
				{
					tab_html =tab_html+'<input type="checkbox" name="tab[]" value="'+response[key].term_id+'">'+response[key].name+'<br/>';
				}
					jQuery("#tabs").html(tab_html);
			}
				
			
		});
		
	}
	else{
		
		
		  jQuery('div#step4').css("display","none");
		  jQuery('div#step5').css("display","none");
	} 
	
	});
	
	jQuery("input[name='tab[]']").live("click",function(){
		if( jQuery("input[name='tab[]']").is(":checked")){
			 jQuery('div#step5').css("display","block");
			
		}else{
					  jQuery('div#step5').css("display","none");

		}
	});
	
	
	//On submit form check tabs is checked or not
	jQuery("input[name='add_resource']").click(function(){
		if (jQuery("input[name='tab[]']:checked").length > 0){
			return true;
		}else{
			alert("Please select Tab to add Resource.");
			return false;
		}
		
});


//Jquery ajax for mark resource featured
jQuery(".mark_as_featured").live("click",function(){
	var resource_id = jQuery(this).attr("rel");
	jQuery.ajax({
			url: obj.ajax_url,
			data:{ action: 'mark_resource_featured',resource_id: resource_id},
			type: "POST",
			success: function(response){
				
				if(response==false){
					alert("Sorry, you have reached the limit of 6 featured items. To set another item as featured, please unmark from the 6 featured items. ");
				}
				else{
					jQuery("label.featured_label"+resource_id).html('<a href="#" class="remove_featured" rel="'+resource_id+'"><img src="'+obj.theme_url+'/img/featured2.jpg"></a>');
				}
			}	
			
		});
		});
		
		//Jquery ajax for remove resource featured
jQuery(".remove_featured").live("click",function(){
	var resource_id = jQuery(this).attr("rel");
	jQuery.ajax({
			url: obj.ajax_url,
			data:{ action: 'remove_featured_resource',resource_id: resource_id},
			type: "POST",
			success: function(response){
				
				if(response==false){
					alert("No any featured resource to remove.");
				}
				else{
					jQuery("label.featured_label"+resource_id).html('<a href="#" class="mark_as_featured" rel="'+resource_id+'"><img src="'+obj.theme_url+'/img/featured1.jpg"></a>');
				}
			}	
			
		});
		});
		
		//Jquery ajax for deleting resource
		jQuery(".delete_resource").click(function(){
	var resource_id = jQuery(this).attr("rel");
	jQuery.ajax({
			url: obj.ajax_url,
			data:{ action: 'delete_resource',resource_id: resource_id},
			type: "POST",
			success: function(response){
			
				if(response==true){
					alert("Resource Deleted successfully.");
					location.reload() ;
				}
				else
				alert("Due to some error, Resource delete");			}	
			
		});
		});
});

function open_tabs(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}