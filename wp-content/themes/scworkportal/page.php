<?php get_header();?>
<div class="banner-inside">
<div class="breadcrumb">
		<!--<span><a href="#">Home</a></span> / <span>Halton News</span>-->
	</div>
<?php if(have_posts()): the_post();?>

<h2><?php the_title();?></h2>
</div>
<section id="inside-section">
<?php the_content();?>
</section>
<?php endif;?>


<?php get_footer();?>