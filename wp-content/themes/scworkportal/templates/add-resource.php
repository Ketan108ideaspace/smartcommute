<?php 
/*
Template Name: Add Resource
*/


get_header();

?>

<div class="banner-inside">
	<div class="breadcrumb">
		<!--<span><a href="#">Home</a></span> / <span>Halton News</span>-->
	</div>
	<h2><?php echo get_the_title();?></h2>
	</div>


<section id="inside-section">

<form action="" method="post" enctype="multipart/form-data">
<p>Add information in 4 easy steps</p><br/>

<div class="entry-post">
<div class="entry-date">STEP 1:</div>
<div class="entry-content">
<p><input type="checkbox" name="copyright" value="1">COPYRIGHT MESSAGE: Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et.</p>
</div>
</div>

<div class="entry-post" id="step2">
<div class="entry-date">STEP 2:</div>
<div class="entry-content">
<p>Click "Browse" to upload resources. (Press Ctrl to upload multiple files at once.)
<input type="file" name="resource_file[]" multiple>
<input type="text" placeholder="Video Url" value="" name="video_url" autocomplete="off"></p>
</div>
</div>


<div class="entry-post" id="step3">
<div class="entry-date">STEP 3: </div>
<div class="entry-content"><p>
Under what category would you like the content to appear?</p>
<?php 

$standard_categories = get_standard_folder();

if($standard_categories){
	
	foreach($standard_categories as $standard_cat_value){
		
		?>
		<p><input type="radio" name="folder" value="<?php echo $standard_cat_value->term_id;?>"><?php echo $standard_cat_value->name;?></p>
		<?php
		
	}
}

?>
</div>
</div>

<div class="entry-post" id="step4">
<div class="entry-date">STEP 4: </div>
<div class="entry-content">
<p>Under what tabs would you like the content to appear?</p>
<div id="tabs"></div>
</div>
</div>


<div class="entry-post" id="step5">
<div class="entry-date">STEP 5: </div>
<div class="entry-content">
<p><input type="submit" name="add_resource" value="Save"></p>
</div>
</div>


</form>

</section>