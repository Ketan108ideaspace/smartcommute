function open_settings(evt, cityName) {
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
jQuery(document).ready(function(){
	
	jQuery("#general_settings_tab").addClass('active');
	
	
	
	//fill the region contact detail
	jQuery("select[name='regions_footer_contact_details[contact_region]']").on('change', function() {
		var region = jQuery(this).val();
		jQuery.ajax({
			url: obj.admin_url,
			data:{ 'action': 'load_region_contact_data','region': region},
			type: "POST",
			dataType: "json",
			success: function(response){
				if(response!=null){
				for (var key in response)
				{
		if(key=='address')
			jQuery("textarea[name='regions_footer_contact_details[contact_address]']").val(response[key]);
		if(key=='email')
			jQuery("input[name='regions_footer_contact_details[contact_email]']").val(response[key]);
		if(key=='phone')
			jQuery("input[name='regions_footer_contact_details[contact_phone]']").val(response[key]);
				}
				}
				else{
					
						jQuery("textarea[name='regions_footer_contact_details[contact_address]']").val('');
						jQuery("input[name='regions_footer_contact_details[contact_email]']").val('');
						jQuery("input[name='regions_footer_contact_details[contact_phone]']").val('');


	
				}
				
			}
			
		});
	});
	
	
	
	//On page load also fill the region contact details
	jQuery("#footer_settings_link").on('click',function(){
	var region = jQuery("select[name='regions_footer_contact_details[contact_region]'] option:selected").val();
		jQuery.ajax({
			url: obj.admin_url,
			data:{ 'action': 'load_region_contact_data','region': region},
			type: "POST",
			dataType: "json",
			success: function(response){
				if(response!=null){
				for (var key in response)
				{
		if(key=='address')
			jQuery("textarea[name='regions_footer_contact_details[contact_address]']").val(response[key]);
		if(key=='email')
			jQuery("input[name='regions_footer_contact_details[contact_email]']").val(response[key]);
		if(key=='phone')
			jQuery("input[name='regions_footer_contact_details[contact_phone]']").val(response[key]);
				}
				}
				else{
					
						jQuery("textarea[name='regions_footer_contact_details[contact_address]']").val('');
						jQuery("input[name='regions_footer_contact_details[contact_email]']").val('');
						jQuery("input[name='regions_footer_contact_details[contact_phone]']").val('');


	
				}
				
			}
			
		});
		});
});

