<?php

get_header();
?>
<div class="banner">
	<h1>Smart Commute Workplace Portal</h1>
	<p>Smart Commute is a program of Metrolinx in partnership with regions in the GTHA</p>
	</div>
		
	<div id="news-resources">
		<div class="home-news">
		<div class="metrolix-news white">
		
		
		
		<h3>Metrolinx News</h3>	
		<ul>
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
		 <li>
		 <h6><a href="<?php the_permalink();?>"><?php the_title();?> <span><?php echo strtoupper(get_the_date('M d'));?></span></a></h6>	
		 <p><?php echo substr($content,0, 120);?>…<a href="<?php the_permalink();?>">More</a></p> 
		 </li>	
		 <?php endwhile;endif;wp_reset_query();?>
				
		</ul>	
			<a href="<?php echo site_url();?>/news?region_id=1" class="more-bt">More News</a>
		</div>
		<div class="hamilton-news">
		<?php $region = get_region(get_region_id());
$region_name = isset($region['name']) ? $region['name'] : '';
?>
		<h3><?php echo $region_name;?> News</h3>	

		<ul>
				<?php 
query_posts(array('post_type'=>'news','posts_per_page'=>3,'meta_query' => array(
    array(
        'key' => 'news_region_id',
        'value' => get_region_id(),  
		'compare' => '=',		
		'type' => 'numeric'
    )
)));
 if(have_posts()): while(have_posts()): the_post();
 $content = get_the_content();?>
		 <li>
		 <h6><a href="<?php the_permalink();?>"><?php the_title();?> <span><?php echo strtoupper(get_the_date('M d'));?></span></a></h6>	
		 <p><?php echo substr($content,0, 110);?>…<a href="<?php the_permalink();?>">More</a></p> 
		 </li>	
			<?php endwhile;endif;wp_reset_query();?>	
		</ul>	
		<a href="<?php echo site_url();?>/news?region_id=<?php echo get_region_id();?>" class="more-bt">More News</a>	
			
			
		</div>
		</div>
	  <div class="home-resources green">
		<h3>Featured Resources</h3>
		<ul>
		<?php $featured_resources = get_featured_resource();

if($featured_resources){
	
	foreach($featured_resources as $resource){
		
		 $get_icon= $get_attach_url='';
			 $attachment= get_children( 'post_type=attachment&post_parent='.$resource->ID );
			 foreach($attachment as $attach){
				 
			$attachment_id = isset($attach->ID) ? $attach->ID : '';
			$attachment_type = isset($attach->post_mime_type) ? $attach->post_mime_type : '';
			if($attachment_type)
			$get_icon = get_icon_for_resource($attachment_type);
			if($attachment_id)
			$get_attach_url = wp_get_attachment_url($attachment_id);
		
			 }
			 ?>
			<li><a href="<?php echo $get_attach_url;?>"><span><img src="<?php echo $get_icon;?>" alt="PDF" target="_blank" width="25" height="32"></span><?php echo $resource->post_title;?></a></li>	
			<?php
	}
}
?>
		
		 
		 
		</div>
	</div>	
		
<section id="home-section" class="home-information green">
		<h3>Information <span class="sub-heading"><span class="sub-head-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/add-resource-icon.png" alt="Add Resource" ></span>Add Resource</span></h3>
	<div class="section-top">
	<div class="blurb">In this section, you will find information on how to implement Smart Commute programming at your workplace, including how-to guides, campaign materials, and inspiration.</div>
	<div class="search-bar">
	          <input type="search"  class="input-xx" placeholder="Search">
          <input type="image" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/search-bt.jpg" alt="search in the Archive" />
	</div>
	</div>
		<ul>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/word-icon-xl.png" alt="Email Templates">
				</span>
			 <span class="post-heading">Email Templates</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
		 </li>
			<li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/excel-icon-xl.png" alt="Tweets">
				</span>
			 <span class="post-heading">Tweets</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
<li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/video-icon-xl.png" alt="Advertisements">
				</span>
			 <span class="post-heading">Advertisements</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			
		 </li>
		 <li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/image-icon-xl.png" alt="Photos">
				</span>
			 <span class="post-heading">Photos</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			
		 </li>			
		</ul>
		</section>
		
<section id="home-section" class="home-archives green">
		<h3>Archives</h3>

		<ul>
		 <li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li>
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/archive-01.jpg" alt="Bike to School">
				</span>
			 <span class="post-heading">Bike to School</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			 <ul>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/edit-icon.png" alt="edit" ></a>				 
			 </li>
			 <li>
				<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/archive-icon.png" alt="archive" ></a>				 
			 </li>				 
			 </ul>
		 </li>
		 <li class="non-sub">
			<a href="#">
			 <span class="post-image-holder">			
			  <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/word-icon-xl.png" alt="Email Templates">
				</span>
			 <span class="post-heading">Email Templates</span>
			 <span class="post-sub-heading">Subheader</span>	
			</a>
			
		 </li>			
		</ul>
		</section>		
		
<?php get_footer();?>