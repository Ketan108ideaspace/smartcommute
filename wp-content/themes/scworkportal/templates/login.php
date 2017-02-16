<?php 
/*
Template Name: Login
*/


get_header();

?>
<section id="home-section" class="home-information green">
<?php if(have_posts()): while(have_posts()):the_post();?>
<h3><?php the_title();?></h3>
<?php the_content();?>
<?php endwhile;endif;?>
<div class="section-top">
<?php wp_login_form(); ?>
</div>
</section>