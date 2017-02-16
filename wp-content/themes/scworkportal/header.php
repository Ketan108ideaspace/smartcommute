<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<title>Smart Commute Portal</title>
<!--[if lt IE 9]>
    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/ideaspace-template.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_uri();?>" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/print.css" type="text/css" media="print" />



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>



<?php wp_head(); ?>
</head>
<body>

<aside id="dashboard-sidebar" class="sidebar-admin">
	<div class="logo">
<picture>
  <a href="http://smartcommute.ca">   <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1@2x.png 2x" media="(min-width: 767px)">
            <source srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1@2x.png 2x" media="(min-width: 320px)">
            <!--[if IE 9]></video><![endif]-->
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1.png" alt="Smart Commute logo" srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/smart-commute-main-1@2x.png 2x">
  </a>
	</picture>
	</div>
	<div class="profile">
	<span class="profile-pic">
		<picture>
            <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/ashish.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/ashish@2x.png 2x" media="(min-width: 767px)">
            <source srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/ashish.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/ashish@2x.png 2x" media="(min-width: 320px)">
            <!--[if IE 9]></video><![endif]-->
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ashish.png" alt="Smart Commute logo" srcset="<?php echo get_stylesheet_directory_uri();?>/assets/images/ashish.png, <?php echo get_stylesheet_directory_uri();?>/assets/images/ashish@2x.png 2x">
</picture>
	</span>
	<span class="user-name">Ashish Malik</span>
	</div>
	
	<ul id="admin-nav">
	<li>
		<a href="<?php echo site_url();?>" class="icons"><span></span>Home</a>
	</li>
	<li>
		<a href="<?php echo site_url();?>/add-resource" class="icons"><span></span>Add Resource</a>
	</li>
	<li>
		<a href="<?php echo site_url();?>/post-news" class="icons"><span></span>Post News</a>
	</li>
	<li>
		<a href="#" class="icons"><span></span>Search</a>
	</li>		
	</ul>
	
</aside>

<div id="page" class="hfeed"> <a class="skip-content" target="_self" href="#skip-content" tabindex="1">Skip navigation</a>
	<header>
	
	<nav>
	<?php
	//Footer menu args
		$top_nav_args = array('menu_name'=>'top_menu','menu_class'=>'','menu_id'=>'nav','container'=>'','theme_location'=>'primary');
		wp_nav_menu($top_nav_args);
		?>
	
	<div class="nav-right">
	    <ul id="textsizer" class="font-size">
            <li class="small-font"><a href="#" aria-label="small font size">A</a></li>
            <li class="default-font"><a href="#"  aria-label="default font size">A</a></li>
            <li class="large-font"><a href="#"  aria-label="large font size">A</a></li>
    </ul>
		<ul class="social-top">
		    <li><a class="icon social-media fb" href="<?php echo get_option('facebook_url');?>" target="_blank">Facebook</a> </li>
        <li><a class="icon social-media tw" href="<?php echo get_option('twitter_url');?>" target="_blank">Twitter</a> </li>
        <li><a class="icon social-media in" href="<?php echo get_option('linkedin_url');?>" target="_blank">LinkedIn</a> </li>
			<li><a class="icon social-media yt" href="<?php echo get_option('youtube_url');?>" target="_blank">LinkedIn</a> </li>
		</ul>
		<div class="logout-in">
		<a href="#">LOGOUT</a>
		</div>
	</div>	
	</nav>
	</header>
	<main>