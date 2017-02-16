		<?php
		$data = get_option('regions_footer_contact_details');
		$region_id = get_region_id();
		$address = isset($data[$region_id]['address']) ? $data[$region_id]['address'] : '';
		$email = isset($data[$region_id]['email']) ? $data[$region_id]['email'] : '';
		$phone = isset($data[$region_id]['phone']) ? $data[$region_id]['phone'] : '';
		
		//Footer menu args
		$footer_args = array('menu_name'=>'footer_menu','menu_class'=>'footer-nav','menu_id'=>'','container'=>'');
		?>
		
		<footer>
	<div class="footer-wrap">
		<div class="footer-top">
		<?php wp_nav_menu($footer_args);?>
	
	<ul class="address">
	<li><?php echo $address;?></li>
	<li><?php echo $phone;?> <br /> <a href="mailto:<?php echo $email;?>"><?php echo $email;?> </a></li>
	</ul>
	<ul class="social-footer">
			<li><a class="icon social-media fb" href="<?php echo get_option('facebook_url');?>" target="_blank">Facebook</a> </li>
			<li><a class="icon social-media tw" href="<?php echo get_option('twitter_url');?>" target="_blank">Twitter</a> </li>
			<li><a class="icon social-media in" href="<?php echo get_option('linkedin_url');?>" target="_blank">LinkedIn</a> </li>
			<li><a class="icon social-media yt" href="<?php echo get_option('youtube_url');?>" target="_blank">LinkedIn</a> </li>
	</ul>
	</div>
	  <div class="footer-bottom">
		<span><a href="<?php echo site_url();?>/privacy">Privacy</a></span>
		<span><?php echo get_option('copyright_text');?></span>
		</div>
</div>		
</footer>	
	</main>
	
</div>
<?php wp_footer();?>
</body>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/modernizr-custom.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/main-js.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/placeholders.min.js"></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri();?>/assets/js/picturefill.js'></script>	
<script>
// Picture element HTML shim|v it for old IE (pairs with Picturefill.js)
document.createElement( "picture" );
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover',
} );
</script>	
</html>