<?php get_header();
 $region = get_region(get_region_id());
$region_name = isset($region['name']) ? $region['name'] : '';

$news_region_id = isset($_GET['region_id']) ? $_GET['region_id'] : get_region_id();
query_posts(array('post_type'=>'news','posts_per_page'=>-1,'meta_query' => array(
    array(
        'key' => 'news_region_id',
        'value' => $news_region_id,  
		'compare' => '=',		
		'type' => 'numeric'
    )
)));

?>
<div class="banner-inside">
	<div class="breadcrumb">
		<!--<span><a href="#">Home</a></span> / <span>Halton News</span>-->
	</div>
	<h2><?php echo $region_name;?> News <span class="sub-heading"><a href="<?php echo site_url();?>/post-news"><span class="sub-head-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/post-icon.png" alt="Add Resource" ></span>Post News</a></span></h2>
	</div>
	
<section id="inside-section">
<?php if(have_posts()): while(have_posts()): the_post();
 $content = get_the_content();?>
<div class="entry-post">
<div class="entry-date">
	<?php echo strtoupper(get_the_date('M d'));?>
</div>
<div class="entry-content">
<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>	
<p><?php echo substr($content,0, 300);?>…<a href="<?php the_permalink();?>">More</a></p>
</div>
</div>
<?php endwhile;endif;wp_reset_query();?>


<a href="#" class="more-bt">Load More</a>
	
</section>
		
	
<?php get_footer()?>
