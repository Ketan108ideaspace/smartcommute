<?php 
/*
Template Name: Add news
*/


get_header();
$new_desc = $new_title = $news_title_error = $news_desc_error = '';
if(isset($_POST['add_news'])){

if(trim($_POST['news_title'])==''){
		
		$news_title_error = 'Please enter News Title.';
		
	}
	else
		$new_title = isset($_POST['news_title']) ?  $_POST['news_title'] : '';
	if(trim($_POST['news_description'])==''){
		
		$news_desc_error = 'Please enter News Description.';
		
	}else
		$new_desc = isset($_POST['news_description']) ?  $_POST['news_description'] : '';
}
if(isset($_GET['success'])){
	
	echo '<div class="success">News added successfully.</div>';
}
?>
<section id="home-section" class="home-information green">
<?php if(have_posts()): the_post();?>
<h3><?php the_title();?></h3>
<?php endif;?>
<div class="section-top">
<form action="" method="post">
<label><strong>News Title:</strong> </label>
<input type="text" name="news_title" value="<?php echo $new_title;?>" size="60"><label class="error"><?php echo $news_title_error;?></label><br/><br/><br/>
<label><strong>News Description: </strong></label>
<textarea name="news_description" rows="10" cols="20"><?php echo $new_desc;?></textarea><label class="error"><?php echo $news_desc_error;?></label><br/><br/><br/>

<input type="submit" name="add_news" value="Submit">
</form>
</div>
</section>
<?php get_footer();?>