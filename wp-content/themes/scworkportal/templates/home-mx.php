<?php
/*
Template Name: MX Home page
*/
get_header();
?>
<div>
<h2>Metrolinx News</h2>
<?php 
query_posts(array('post_type'=>'news','posts_per_page'=>3,'meta_query' => array(
    array(
        'key' => 'news_region_id',
        'value' => 1,  
		'compare' => '=',		
		'type' => 'numeric'
    )
)));
 if(have_posts()): while(have_posts()): the_post();
 $content = get_the_content();?>
<div>
<p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
<?php echo get_the_date('F j, Y');?>-<?php echo substr($content,0, 300);?>...<a href="<?php the_permalink();?>">More</a>
</div>

<?php endwhile;endif;wp_reset_query();?>
<a href="<?php echo site_url();?>/news?region_id=1">learn More</a>