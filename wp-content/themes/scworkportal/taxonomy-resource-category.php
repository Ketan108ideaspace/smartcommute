<?php
get_header();
if(isset($_GET['tab_id']))
$highlight_tab_id = 	$_GET['tab_id'];
else
	$highlight_tab_id = '';
?>
<?php
$folder_name ='';
 $queried_object = get_queried_object();
 $folder_term_id = isset($queried_object->term_id) ? $queried_object->term_id : '';
 $standard_tabs = get_standard_tabs($folder_term_id);
 $custom_tabs = get_custom_tabs($folder_term_id);

$folder_details =  get_term_by('id',$folder_term_id,'resource-category');

$folder_name = isset($folder_details->name) ? $folder_details->name : '';
 ?>
 <div class="banner-inside">
	<div class="breadcrumb">
		<!--<span><a href="#">Home</a></span> / <span>Halton News</span>-->
	</div>
	<h2><?php echo $folder_name;?></h2>
	</div>
<section id="inside-section">
 <?php
 echo '<ul id="tabs">';
	display_tabs_html($standard_tabs,$highlight_tab_id);
	display_tabs_html($custom_tabs,$highlight_tab_id,1);
 echo '</ul>';
  
display_tabs_content_html($standard_tabs,$highlight_tab_id);
display_tabs_content_html($custom_tabs,$highlight_tab_id,1);

 ?>
 </section>