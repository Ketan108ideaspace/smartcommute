<?php
/*
Plugin Name: Theme settings
Plugin URI: http://www.google.com
Description: This plugins provides support for general settings of a website 
Author: Poonam Kesharvani
Author URI: http://www.google.com
Version: 1.0.0
*/
$theme_settings  = new theme_settings();
class theme_settings{
	public function __construct(){
		
		
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'add_js_css' ) );
        add_action( 'wp_ajax_load_region_contact_data', array( $this, 'load_region_contact_data' ) );
	}
	
	 public function add_js_css(){
		 
		wp_register_style( 'plugin_css', plugins_url('css/theme-settings.css', __FILE__));
        wp_enqueue_style( 'plugin_css' );
		wp_register_script( 'plugin_js', plugins_url('js/theme-settings.js', __FILE__));
		wp_localize_script( 'plugin_js', 'obj', array('admin_url'=>admin_url().'admin-ajax.php') );

        wp_enqueue_script( 'plugin_js' );
	 }
    public function add_plugin_page()
    {
       
       add_menu_page('Theme Settings','Theme Settings', 'manage_options', 'theme-settings', array($this,'create_theme_page'));
		
    }

	 public function create_theme_page()
    {
       
        ?>
        <div class="wrap">
            <h1>Theme Settings</h1>
			<ul class="tab">
			  <li><a href="javascript:void(0)" class="tablinks" onclick="open_settings(event, 'general_settings');" id="general_settings_tab">General Settings</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="open_settings(event, 'social_media_settings');">Social media settings</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="open_settings(event, 'contact_info_settings');" id="footer_settings_link">Footer settings</a></li>
			 
			</ul>
		<div id="general_settings" class="tabcontent">
		 <form method="post" action="<?php echo admin_url();?>/options.php" enctype="multipart/form-data">
		
					<?php
               
                settings_fields( 'general_group' );
                do_settings_sections( 'theme-general-options' );
                submit_button();
            ?>
            </form>
		</div>

		<div id="social_media_settings" class="tabcontent">
		  <form method="post" action="<?php echo admin_url();?>/options.php" >
		
					<?php
               
               settings_fields( 'social_group' );
                do_settings_sections( 'theme-social-options' );
                submit_button();
            ?>
            </form>
		</div>

		<div id="contact_info_settings" class="tabcontent">
		  <form method="post" action="options.php">
		
					<?php
               settings_fields( 'contact_group' );
                do_settings_sections( 'contact-settings');	
                submit_button();
            ?>
            </form>
		</div>
			
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
      
	  
        add_settings_section("general-section", "General Settings", null, "theme-general-options");
		 add_settings_field("logo", "Logo", array($this,"logo_call_back"), "theme-general-options", "general-section");  
		register_setting("general_group", "logo", array($this,"handle_logo_upload"));	
		add_settings_field("fav_icon", "Fav Icon", array($this,"fav_icon_callback"), "theme-general-options", "general-section");  
		register_setting("general_group", "fav_icon",array($this, "handle_favicon_upload"));
		 add_settings_field("copyright_text", "Copyright Text", array($this,"copyright_text_call_back"), "theme-general-options", "general-section");  
		register_setting("general_group", "copyright_text");	
		
	
	
	add_settings_section("social-section", "Social Profile Settings", null, "theme-social-options");
	add_settings_field("twitter_url", "Twitter Profile Url", array($this,"twitter_callback"), "theme-social-options", "social-section");
    add_settings_field("facebook_url", "Facebook Profile Url", array($this,"facebook_callback"), "theme-social-options", "social-section");
    add_settings_field("linkedin_url", "Linkedin Profile Url",array($this,"linkedin_callback"), "theme-social-options", "social-section");
    add_settings_field("youtube_url", "Youtube Url", array($this,"youtube_callback"), "theme-social-options", "social-section");
	 register_setting("social_group", "twitter_url");
    register_setting("social_group", "facebook_url");
    register_setting("social_group", "linkedin_url");
    register_setting("social_group", "youtube_url");  
	
	
		add_settings_section("contact-section", "Footer contact details", null, "contact-settings");
	/* add_settings_field("contact_region", "Region", array($this,"contact_region"), "contact-settings", "contact-section");
	register_setting("contact_group", "contact_region");  
	
	add_settings_field("contact_address", "Address", array($this,"contact_address"), "contact-settings", "contact-section");
	register_setting("contact_group", "contact_address");   */
	
	add_settings_field("regions_footer_contact_details", "", array($this,"regions_footer_contact_details"), "contact-settings", "contact-section");
	register_setting("contact_group", "regions_footer_contact_details",array($this,'save_contact'));  
	
	
    }
	
	public function logo_call_back(){
		?>
		<input type="file" name="logo">
		<img src="<?php echo get_option('logo'); ?>">
		<?php
	}
	
 public function handle_logo_upload()
{
	
	$option=get_option('logo');
	if(!empty($_FILES["logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = isset($urls["url"]) ? $urls["url"] : '';
	    return $temp;   
	}
	  else
	return $option;
}
	public function fav_icon_callback(){
		
		?>
		<input type="file" name="fav_icon">
		<img src="<?php echo get_option('fav_icon'); ?>">
		<?php
	}
	public function handle_favicon_upload()
{
	$option=get_option('fav_icon');
	if(!empty($_FILES["fav_icon"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["fav_icon"], array('test_form' => FALSE));
	   $temp = isset($urls["url"]) ? $urls["url"] : '';
	    return $temp;   
	}
	  else
	return $option;
}

public function copyright_text_call_back(){
	?>
		<input type="text" name="copyright_text" value="<?php echo get_option('copyright_text');?>" size="30">
		<?php
	
}

	public function facebook_callback(){
	
		?>
		<input type="text" name="facebook_url" value="<?php echo get_option('facebook_url');?>" size="30">
		<?php
	}public function twitter_callback(){
		
		?>
		<input type="text" name="twitter_url" value="<?php echo get_option('twitter_url');?>" size="30">
		<?php
	}public function linkedin_callback(){
		
		?>
		<input type="text" name="linkedin_url" value="<?php echo get_option('linkedin_url');?>" size="30">
		<?php
	}
	public function youtube_callback(){
		
		?>
		<input type="text" name="youtube_url" value="<?php echo get_option('youtube_url');?>" size="30">
		<?php
	}
	
	public function save_contact(){
		$data = get_option('regions_footer_contact_details');
		if(!$data)
			 $data = array();
		 
		 if(isset($_POST['regions_footer_contact_details'])){
			
			  $data[$_POST['regions_footer_contact_details']['contact_region']]= array('address'=>$_POST['regions_footer_contact_details']['contact_address'],'email'=>$_POST['regions_footer_contact_details']['contact_email'],'phone'=>$_POST['regions_footer_contact_details']['contact_phone']);
			
	  }
	  remove_filter( "sanitize_option_regions_footer_contact_details", array($this,'save_contact' ));
	  $this->save_data($data);
	  die;
	  
	  
		
	}
	
	public function save_data($data){
		update_option('regions_footer_contact_details',$data);
		wp_redirect('admin.php?page=theme-settings');
		
	}
	
	
	public function load_region_contact_data(){
		$regions_footer_contact_details = get_option('regions_footer_contact_details');
		$region_detail= array();
		if (array_key_exists($_POST['region'],$regions_footer_contact_details)){
			foreach($regions_footer_contact_details as $region_key=>$region_data){
				
				if($region_key==$_POST['region']){
					
					$region_detail = $region_data;
				}
			}
		die(json_encode($region_detail));
		}
		else{
			die(null);
		}
		
	}
	public function regions_footer_contact_details(){
		//echo '<pre>';
	//print_r(get_option('regions_footer_contact_details'));
	?>
		
		
		<tr><th scope="row">Region</th><td><?php $this->contact_region();?></td></tr>
		<tr><th scope="row">Address</th><td><?php $this->contact_address();?></td></tr>
		<tr><th scope="row">Email</th><td><?php $this->contact_email();?></td></tr>
		<tr><th scope="row">Phone</th><td><?php $this->contact_phone();?></td></tr>
		
	
			
	 <?php
	}
	public function contact_region(){
		$regions = get_region();
		echo '<select name="regions_footer_contact_details[contact_region]">';
		foreach($regions as $region){
		?>
		<option value="<?php echo $region->id;?>"><?php echo $region->name;?></option>
		
		<?php
		}
		echo '</select>';
	}
	public function contact_address(){
		
		?>
		<textarea name="regions_footer_contact_details[contact_address]" rows="5" cols="30"><?php //echo get_option('contact_address');?></textarea>
		<?php
	}
	public function contact_email(){
		
		?>
		<input type="text" name="regions_footer_contact_details[contact_email]" value="<?php //echo get_option('contact_email');?>" size="30">
		<?php
	}public function contact_phone(){
		
		?>
		<input type="text" name="regions_footer_contact_details[contact_phone]" value="<?php //echo get_option('contact_email');?>" size="30">
		<?php
	}
	
	//Edit the detail
}
?>