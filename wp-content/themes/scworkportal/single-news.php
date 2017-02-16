<?php get_header()?>
<?php if(have_posts()): while(have_posts()): the_post();?>
<div class="banner-inside">
<div class="breadcrumb">
		<!--<span><a href="#">Home</a></span> / <span>Halton News</span>-->
	</div>

<h2><?php the_title();?><span class="sub-heading"><a href="<?php echo site_url();?>/post-news"><span class="sub-head-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/post-icon.png" alt="Add Resource" ></span>Post News</a></span></h2>
</div>
<section id="inside-section">
<?php the_content();?>

<?php $news_region_id = get_post_meta(get_the_ID(),'news_region_id',true);?>
<a href="<?php echo site_url();?>/news?region_id=<?php echo $news_region_id;?>">Back to Archive</a>
</section>
<?php endwhile;endif;?>

<?php get_footer()?>
