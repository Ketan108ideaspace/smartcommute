<?php
add_action( 'init', 'news_post_type' );
add_action( 'init', 'resource_post_type' );
add_action( 'init', 'create_resource_category_taxonomies');
/*
@Function Name: news_post_type
@param: null
@return: null
@Usage: for creating news cpt
*/
function news_post_type() {

	$labels = array(
		'name'               =>'News',
		'singular_name'      =>'News',
		'menu_name'          => 'News',
		'name_admin_bar'     =>'News',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New News',
		'new_item'           =>'New News',
		'edit_item'          =>'Edit News',
		'view_item'          => 'View News',
		'all_items'          =>  'All News',
		'search_items'       =>  'Search News',
		'parent_item_colon'  =>'Parent News:',
		'not_found'          => 'No news found.',
		'not_found_in_trash' => 'No news found.'
	);

	$args = array(
		'labels'             => $labels,
         'description'        =>'Description',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'news', $args );
}
/*
@Function Name: resource_post_type
@param: null
@return: null
@Usage: for creating resources cpt
*/
function resource_post_type() {

	$labels = array(
		'name'               =>'Resources',
		'singular_name'      =>'Resources',
		'menu_name'          => 'Resources',
		'name_admin_bar'     =>'Resources',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Resource',
		'new_item'           =>'New Resources',
		'edit_item'          =>'Edit Resource',
		'view_item'          => 'View Resources',
		'all_items'          =>  'All Resources',
		'search_items'       =>  'Search Resources',
		'parent_item_colon'  =>'Parent Resources:',
		'not_found'          => 'No Resource found.',
		'not_found_in_trash' => 'No Resources found.'
	);

	$args = array(
		'labels'             => $labels,
         'description'        =>'Description',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'resources' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author')
	);

	register_post_type( 'resources', $args );
}
/*
@Function Name: create_resource_category_taxonomies
@param: null
@return: null
@Usage: for creating resource category taxonomy with resources cpt
*/
function create_resource_category_taxonomies() {
	
	$labels = array(
		'name'                       => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Categories', 'textdomain' ),
		'popular_items'              => __( 'Popular Categories', 'textdomain' ),
		'all_items'                  => __( 'All Categories', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category', 'textdomain' ),
		'update_item'                => __( 'Update Category', 'textdomain' ),
		'add_new_item'               => __( 'Add New Category', 'textdomain' ),
		'new_item_name'              => __( 'New Category Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories', 'textdomain' ),
		'not_found'                  => __( 'No categories found.', 'textdomain' ),
		'menu_name'                  => __( 'Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'resource-category' ),
	);

	register_taxonomy( 'resource-category', 'resources', $args );
}
/*
@Function Name: get_user_id
@param: null
@return: user id
@Usage: for getting logged in user id
*/
function get_user_id(){
	
	global $user_ID;
	return $user_ID;
}
/*
@Function Name: get_region_id
@param: null
@return: region id
@Usage: for getting logged in user region id
*/
function get_region_id(){
	
	$region_id = get_user_meta(get_user_id(),'region_id',true);
	return $region_id;
}
/*
@Function Name: get_region
@param: region_id optional
@return: array
@Usage: for getting regions list
*/
function get_region($region_id=''){
	
	global $wpdb;
	$region_table = $wpdb->prefix.'regions';
	if(!$region_id){
		$regions = $wpdb->get_results("SELECT * FROM $region_table");
		
	}else{
		
		$regions = $wpdb->get_row($wpdb->prepare("SELECT * FROM $region_table WHERE id=%d ",$region_id),ARRAY_A);
	}
	return $regions ;
}
/*
@Function Name: get_region_name
@param: region_id
@return: region_name
@Usage: for getting name of region
*/
function get_region_name($region_id=''){
	global $wpdb;
	$region_table = $wpdb->prefix.'regions';
	if(!$region_id)
		$region_id = get_region_id();
	else
		$region_id = $region_id;

	$region_name = $wpdb->get_var($wpdb->prepare("SELECT name FROM $region_table WHERE id=%d ",$region_id));
	return $region_name;
}
/*
@Function Name: save_news
@param: null
@return: null
@Usage: Create news in DB when submit a form of post news
*/
function save_news(){
	
	if(isset($_POST['add_news'])){
		
	$news_id= wp_insert_post(array('post_author'=>get_user_id(),'post_content'=>$_POST['news_description'],'post_title'=>$_POST['news_title'],'post_type'=>'news','post_status'=>'publish'));
	if($news_id){
		
		update_post_meta($news_id,'news_region_id',get_region_id());
		wp_safe_redirect(site_url().'/post-news?success=1');
	}
	
	}

}
add_action('init','save_news');
/*
@Function Name: add_js
@param: null
@return: null
@Usage: adding js/css to the page
*/
function add_js(){
	
	 wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js');
	 wp_localize_script('custom-js', 'obj', array('ajax_url'=>admin_url('admin-ajax.php'),'theme_url'=>get_stylesheet_directory_uri())); 
	 
}
add_action( 'wp_enqueue_scripts', 'add_js' );
/*
@Function Name: load_tabs_callback
@param: null
@return: null
@Usage: ajax callback for loading tabs of a folder in add resource form
*/
add_action('wp_ajax_load_tabs','load_tabs_callback');
function load_tabs_callback(){
	
	//Standard tabs
	$tabs= array();
	$parent_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
	$standard_tab = get_standard_tabs($parent_id);
	 $custom_tab = get_custom_tabs($parent_id);
	$tabs = array_merge($tabs,$standard_tab);
	$tabs = array_merge($tabs,$custom_tab);
	die(json_encode($tabs));
}
/*
@Function Name: get_standard_folder
@param: region_id
@return: array
@Usage: for getting standard folder
*/
function get_standard_folder(){
	
	$standard_categories =array();
	$parent_term  = get_term_by('name','Standard Folder','resource-category');
	$parent_term_id = isset($parent_term->term_id) ? $parent_term->term_id : '';
	$standard_categories = get_terms( 'resource-category', array(
    'hide_empty' => false,
    'parent' => $parent_term_id 
	) );
	
	//Remove SC in a box folder for other regional user except mx user
	if($standard_categories){
	
		foreach($standard_categories as $standard_key=>$standard_cat_val){
			if(in_array(strtolower($standard_cat_val->name),folder_to_exclude() ) && get_region_id()!=1){
				
				unset($standard_categories[$standard_key]);
			}
			
		}
	}
	$standard_categories = array_merge($standard_categories,get_custom_folder());
	return $standard_categories;
}
/*
@Function Name: get_custom_folder
@param: region_id
@return: array
@Usage: for getting custom folder of a region based on logged in user regions id
*/
function get_custom_folder($region_id=''){
	
	
	$custom_categories = array();
	if(!$region_id)
		$region_id = get_region_id();
	else
	$region_id = $region_id;

	
	$logged_in_user_region = get_region($region_id);
	$logged_in_user_region_name = isset($logged_in_user_region['name']) ? $logged_in_user_region['name'] : '';
	$slug_name_of_custom_folder = strtolower($logged_in_user_region_name).'-custom-folder';
	$parent_region_term  = get_term_by('slug',$slug_name_of_custom_folder,'resource-category');
	$parent_region_term_id = isset($parent_region_term->term_id) ? $parent_region_term->term_id : '';
	
	if($parent_region_term_id){
		$custom_categories = get_terms( 'resource-category', array(
		'hide_empty' => false,
		'parent' => $parent_region_term_id 
		
		) );
	}
	return $custom_categories;
}
/*
@Function Name: get_standard_tabs
@param: parent_category_id
@return: array
@Usage: for getting standard tabs of a folder 
*/
function get_standard_tabs($parent_category_id){
	
	$sub_categories=array();
	if($parent_category_id){
		$sub_categories = get_terms( 'resource-category', array(
		'hide_empty' => false,
		'parent'=> $parent_category_id 
		
		) );
	}
	if($sub_categories ){
		foreach($sub_categories as $sub_key=>$sub_value){
			
			if(in_array(strtolower($sub_value->name),regions_to_exclude())){
				
				unset($sub_categories[$sub_key]) ;
			}
			
		}
	}
	return $sub_categories;
}
/*
@Function Name: get_custom_tabs
@param: parent_category_id
@return: array
@Usage: for getting custom tabs of a folder
*/
function get_custom_tabs($parent_category_id){
	$standard_tabs = get_standard_tabs($parent_category_id);
	$tab_id = '';
	$sub_categories= $all_custom_tabs = array();
	if($parent_category_id){
		$sub_categories = get_terms( 'resource-category', array(
		'hide_empty' => false,
		'parent' => $parent_category_id 
		
		) );
	
	}
	if($sub_categories){
		foreach($sub_categories as $key=>$tab){
			if($standard_tabs){

			foreach($standard_tabs as $tab_key=>$tab_val){

			$array = json_decode(json_encode($tab_val), true);

			if(!in_array($tab->term_id,$array)){
				 if($tab->name==get_region_name()){
					$tab_id = isset($tab->term_id) ? $tab->term_id :'' ;
				}
			}
			
			}
		}
		else{
			if($tab->name==get_region_name()){
					$tab_id = isset($tab->term_id) ? $tab->term_id :'' ;
				}
		}
	}
		
	}

	if($tab_id){
		$all_custom_tabs = get_terms( 'resource-category', array(
		'hide_empty' => false,
		'parent'=> $tab_id 
		
		) );
	}

	return $all_custom_tabs;
}
/*
@Function Name: regions_to_exclude
@param: null
@return: array
@Usage: for getting custom folder based on returned array of this function 
*/
function regions_to_exclude(){
	
	$regions = array('toronto','peel','durham','halton','hamilton','markham');
	return $regions;
}
/*
@Function Name: folder_to_exclude
@param: null
@return: array
@Usage: for keeping list of folder not to show region user
*/
function folder_to_exclude(){
	
	$folder_arr = array('sc in a box');
	return $folder_arr;
}
/*
@Function Name: add_resource
@param: null
@return: null
@Usage: for creating resource when submit a form of add resource
*/
function add_resource(){
	if(isset($_POST['add_resource'])){
		$folder = isset($_POST['folder']) ? $_POST['folder'] : '';
		$tab = isset($_POST['tab']) ? $_POST['tab'] : '';
		$tab[] = $folder; 
		$files = $_FILES["resource_file"];
		 $video_url = isset($_POST['video_url']) ? $_POST['video_url'] : '';
		 $user_id = get_current_user_id();
		
    foreach ($files['name'] as $key => $value) {
		 $resource_id=	$attachment_id ='';
			 if ($files['name'][$key]!='') {
				$name = explode('.', $files['name'][$key]);
				$resource_title = isset($name[0]) ? $name[0] : 'New Resource';
					$defaults = array(
				'post_author' => $user_id,
				'post_content' => $resource_title,
				'post_title' =>$resource_title,
				'post_excerpt' => '',
				'post_status' => 'publish',
				'post_type' => 'resources',
			
				);
				$resource_id = wp_insert_post($defaults);
				
				
				//If resource added upload file in media add meta row also
			
			if($resource_id){
				
				wp_set_post_terms( $resource_id, $tab, 'resource-category' );
				update_post_meta($resource_id,'resource_region_id',get_region_id());

				
						$file = array(
							'name' => $files['name'][$key],
							'type' => $files['type'][$key],
							'tmp_name' => $files['tmp_name'][$key],
							'error' => $files['error'][$key],
							'size' => $files['size'][$key]
						);
						require_once( ABSPATH . 'wp-admin/includes/image.php' );
						require_once( ABSPATH . 'wp-admin/includes/file.php' );
						require_once( ABSPATH . 'wp-admin/includes/media.php' );
						$_FILES = array("resource_file" => $file);
						$attachment_id = media_handle_upload("resource_file", $resource_id);
				
				//redirction to tresource list page
				 $tab_array = isset($_POST['tab']) ? $_POST['tab'] : '';
				$tab_rand_key = array_rand($tab_array,1);
				$tab_id_val = isset($tab_array[$tab_rand_key])? $tab_array[$tab_rand_key] : '';
				$folder = (int)$folder;
				$folder_link = get_term_link($folder).'?tab_id='.$tab_id_val;
				wp_safe_redirect($folder_link);
				
				
			}
			 }
			 
			
		} 
		
		//If third party video url i entered in the text fields add it as a seperate resource
		if( $video_url!=''){
			
			$resource_title =  get_video_title($video_url);
			$defaults = array(
			'post_author' => $user_id,
			'post_content' => $resource_title,
			'post_title' =>$resource_title,
			'post_excerpt' => '',
			'post_status' => 'publish',
			'post_type' => 'resources',
		
		);
		
		$resource_id = wp_insert_post($defaults);
		if($resource_id){
			update_post_meta($resource_id,'resource_video_url',$video_url);
			update_post_meta($resource_id,'resource_region_id',get_region_id());
			wp_set_post_terms( $resource_id, $tab, 'resource-category' );
			
			//redirction to tresource list page
			 $tab_array = isset($_POST['tab']) ? $_POST['tab'] : '';
			$tab_rand_key = array_rand($tab_array,1);
			$tab_id_val = isset($tab_array[$tab_rand_key])? $tab_array[$tab_rand_key] : '';
			$folder = (int)$folder;
			$folder_link = get_term_link($folder).'?tab_id='.$tab_id_val;
			wp_safe_redirect($folder_link);
			
		}
		}
		exit;
	}
	
	
}
add_action('init','add_resource');

/*
@Function Name: get_resource_by_term_id
@param: region_id,term_id,sort_by
@return: array
@Usage: for getting resource of a tabs
*/
function get_resource_by_term_id($region_id='',$term_id,$sort_by=''){
	
	if(!$region_id)
		$region_id = get_region_id();
	
	$args = array(
		'post_type' => 'resources',
		'posts_per_page'=>'-1',
		'tax_query' => array(
			array(
			'taxonomy' => 'resource-category',
			'field' => 'id',
			'terms' => $term_id
			 )
		  )
		 
		);
		 if(get_region_id()!=1){
			 $args['meta_query' ]= array(
			array(
			'key' => 'resource_region_id',
			'value' =>array($region_id,1),
			'compare' => 'IN'
			 )
		  );
			 
		 }
		 
		 if($sort_by){
			 $args['orderby' ]=$sort_by;
			 $args['order' ]='ASC';
			 
		 }
		 
		 
		$resources = get_posts($args);
		return $resources;
}
/*
@Function Name: get_icon_for_resource
@param: file_type
@return: imgage url
@Usage: for getting icon of a file based on type of a file
*/
function get_icon_for_resource($file_type=''){
	
	switch($file_type){
		
		case "application/pdf":
		return get_stylesheet_directory_uri().'/img/pdf.jpg';
		break;
		case "application/msword":
		return get_stylesheet_directory_uri().'/img/word.png';
		break;
		case "text/plain":
		return get_stylesheet_directory_uri().'/img/txt.jpg';
		break;
		default:
		return get_stylesheet_directory_uri().'/img/video.jpg';
	}
}
/*
@Function Name: get_video_title
@param: url
@return: title
@Usage: for getting title of the page from url
*/
function get_video_title($url){
	 $contents =   @file_get_contents($url);($url);
	 $title = null;
       
       
        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );

        if (isset($match) && is_array($match) && count($match) > 0)
        {
            $title = strip_tags($match[1]);
        }
		return $title;
}

/*
@Function Name: display_tabs_content_html
@param: Tabs array of a folder, active_tab_id,custom tab or standard tab
@return: null
@Usage: for displaying all tabs in a folder
*/
function display_tabs_html($tabs,$active_tab_id,$is_custom_tab=''){
	
 if($tabs){
	 $tab_count = 1;
	 foreach($tabs as $tab){
		 
			if($active_tab_id == $tab->term_id ||  ($tab_count==1 && !$is_custom_tab && $active_tab_id=='')){
				
				$active_class = 'active';
			}
			else{
				$active_class = '';
			}
		 $div_id = "div".$tab->term_id;
		 echo "<li><a class='tablinks ".$active_class."' onclick=\"open_tabs(event,'".$div_id."');\" href='javascript:void(0)' rel='".$tab->term_id."'>".$tab->name."</a></li>";
		  $tab_count++;
	 }
 } 
	
}
/*
@Function Name: display_tabs_content_html
@param: Tabs array of a folder, active_tab_id,custom tab or standard tab
@return: null
@Usage: for displaying resources of a tab
*/

function display_tabs_content_html($tabs,$active_tab_id,$is_custom_tab=''){
	
	 if($tabs){
	 $tab_count = 1;
	
	 foreach($tabs as $tab){
		  $tab_id= isset( $tab->term_id) ?  $tab->term_id : '';
		  $get_tab_id= isset( $_GET['tab_id']) ? $_GET['tab_id'] : '';
		  if($tab_id==$get_tab_id)
		   $sort_by= isset($_GET['sortBy']) ? $_GET['sortBy'] : '';
	   else
		    $sort_by='';
		 if($active_tab_id == $tab->term_id || ($tab_count==1 && !$is_custom_tab && $active_tab_id=='')){
				
				$style_css = 'style="display:block"';
			}
			else{
				$style_css = '';
			}
		 
		 
		 $resources = get_resource_by_term_id(get_region_id(),$tab->term_id,$sort_by);
		 $div_id = "div".$tab->term_id;
		  echo '<div class="tabcontent" id="'.$div_id.'"'.$style_css.' > ';
		  echo '<table border="1"> ';
		  if($resources){
			  echo 'Sort by <a href="'.add_query_arg( array('tab_id'=>$tab_id,'sortBy'=>'title')).'">File Name</a>  &nbsp; <a href="'.add_query_arg( array('tab_id'=>$tab_id,'sortBy'=>'date')).'">Upload Date</a>';
			  $resource_count =1;
		 foreach( $resources as $resource){
			 $get_icon= $get_attach_url='';
			 $attachment= get_children( 'post_type=attachment&post_parent='. $resource->ID );
			 foreach($attachment as $attach){
				 
			$attachment_id = isset($attach->ID) ? $attach->ID : '';
			$attachment_type = isset($attach->post_mime_type) ? $attach->post_mime_type : '';
			if($attachment_type)
			$get_icon = get_icon_for_resource($attachment_type);
			if($attachment_id)
			$get_attach_url = wp_get_attachment_url($attachment_id);
		
			 }
			
			    if( $resource_count%4==1)
				 echo "<tr>";
				 echo "<td>";
				 if(get_post_meta($resource->ID,'resource_video_url',true)){
					echo '<img src="'.get_icon_for_resource().'" width="25" height="32"><br>';
					echo '<a href="'.get_post_meta($resource->ID,'resource_video_url',true).'" target="_blank">'.$resource->post_title.'</a>';
				 }
				 else{
					 
					 echo '<img src="'.$get_icon.'" width="25" height="32"><br>';
					echo '<a href="'.$get_attach_url.'" target="_blank">'.$resource->post_title.'</a>';
				 }
				 if(get_region_id()==get_post_meta($resource->ID,'resource_region_id',true)){
					 if(!get_post_meta($resource->ID,'featured_resource',true))
				 echo '<label class="featured_label'.$resource->ID.'"><a href="#" class="mark_as_featured" rel="'.$resource->ID.'"><img src="'.get_stylesheet_directory_uri().'/img/featured1.jpg"></a></label>';
			 else
				 echo '<label class="featured_label'.$resource->ID.'"><a href="#" class="remove_featured" rel="'.$resource->ID.'"><img src="'.get_stylesheet_directory_uri().'/img/featured2.jpg"></a></label>';
			 
			 
				//Delete resource 
				echo '<a href="#" class="delete_resource" rel="'.$resource->ID.'"><img src="'.get_stylesheet_directory_uri().'/img/delete.png"></a>';
				 }
				 echo "</td>";
				  if( $resource_count/3==0)
				 echo "</tr>";
			  $resource_count ++;
			}
		 }
		 else{
			 echo '<tr>';
			 echo '<td>No Content or resources uploaded yet.</td>';
			 echo '</tr>';
		 }
		  echo '</table>';
		  echo '</div>';
		$tab_count++;  
	 }
 } 
}
/*
@Function Name: set_resource_as_featured_callback
@param: null
@return: null
@Usage: Ajax callback function to mark resource as a featured
*/
add_action('wp_ajax_mark_resource_featured','set_resource_as_featured_callback');

function set_resource_as_featured_callback(){
	
	$resource_id = isset($_POST['resource_id']) ? $_POST['resource_id'] : '';
	$success= '';
	if($resource_id){
		$args['post_type']='resources';
		$args['posts_per_page']='-1';
		 $args['meta_query']= array(
		   'relation'=>'AND',
			array(
			'key' => 'resource_region_id',
			'value' =>array(get_region_id(),1),
			'compare' => 'IN'
			 ),
			 array(
			'key' => 'featured_resource',
			'value' =>1,
			'compare' => '='
			 )
		  );
		 /*  	if(get_region_id()!=1){
	
		  $args['tax_query'] = array(
    array(
        'taxonomy' => 'resource-category',
        'terms' => 'sc-in-a-box',
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'NOT IN'
    )
);
			} */

		
		  if(count(get_posts($args))<6){
				$success = update_post_meta($resource_id,'featured_resource',1);
				die(true);
				
		  }
		else
		die(false);
		
		
	}
	
}
/*
@Function Name: remove_featured_resource_callback
@param: null
@return: null
@Usage: Ajax callback function to remove featured resource
*/
add_action('wp_ajax_remove_featured_resource','remove_featured_resource_callback');

function remove_featured_resource_callback(){
	
	$resource_id = isset($_POST['resource_id']) ? $_POST['resource_id'] : '';
	$success= '';
	if($resource_id){
		$args['post_type']='resources';
		$args['posts_per_page']='-1';
		 $args['meta_query']= array(
		   'relation'=>'AND',
			array(
			'key' => 'resource_region_id',
			'value' =>array(get_region_id(),1),
			'compare' => 'IN'
			 ),
			 array(
			'key' => 'featured_resource',
			'value' =>1,
			'compare' => '='
			 )
		  );
		
		  if(count(get_posts($args))>0){
				$success = update_post_meta($resource_id,'featured_resource',0);
				die(true);
				
		  }
		else
		die(false);
		
		
	}
	
}
/*
@Function Name: delete_resource_callback
@param: null
@return: null
@Usage: Ajax callback function to delete a resource
*/
add_action('wp_ajax_delete_resource','delete_resource_callback');

function delete_resource_callback(){
	
	$result = wp_delete_post($_POST['resource_id'],true);
	if($result)
		die(true);
	else
		die(false);
}
/*
@Function Name: get_featured_resource
@param: null
@return: null
@Usage: Getting list of all featured resources for a region
*/
function get_featured_resource(){
	$args['post_type']='resources';
		$args['posts_per_page']='-1';
		 $args['meta_query']= array(
		   'relation'=>'AND',
			array(
			'key' => 'resource_region_id',
			'value' =>array(get_region_id(),1),
			'compare' => 'IN'
			 ),
			 array(
			'key' => 'featured_resource',
			'value' =>1,
			'compare' => '='
			 )
		  );
		  
		/* 	if(get_region_id()!=1){
		   $args['tax_query'] = array(
    array(
        'taxonomy' => 'resource-category',
        'terms' => 'sc-in-a-box',
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'NOT IN'
    )
			
);
} */
		  $resources = get_posts($args);
		  return $resources;
	
}
/*
@Function Name: add_new_category_form_fields
@param: term array
@return: null
@Usage: for creating image and archive option with term create page in resource-category
*/
function add_new_category_form_fields( $term ) {  ?>
   <div class='form-field term-image-wrap'>
	<label for='image'>Image</label>
	<img src="" id="cat_img"><br/>
	<input class='imagefield' value='' size='40' type='hidden' name='cat_imagefield'/>
	<a href="#" class="cat_image button">Add Image</a>

	</div>
	<div class='form-field term-image-wrap'>
	<label for='archive_a_category'>Archive a Category?</label>
	<input type="radio" name="archive_category" value="1">Yes  <input type="radio" name="archive_category" value="0">No
	</div>
 <?php
 }
 add_action( 'resource-category_add_form_fields','add_new_category_form_fields', 10, 2);
 
 /*
@Function Name: save_category_fields
@param: term_id
@return: null
@Usage: for savig custom fields in the term of resource-category
*/
 add_action( 'create_resource-category' ,'save_category_fields' );
 add_action( 'edited_resource-category', 'save_category_fields', 10, 2 );

 function save_category_fields($termID ){
	 if(isset($_POST['cat_imagefield'])){
		 
		 update_term_meta($termID,'category_image',$_POST['cat_imagefield']);
	 }
	 
	 if(isset($_POST['archive_category'])){
		 
		 update_term_meta($termID,'category_archive',$_POST['archive_category']);
	 }
	 else{
		 
		  update_term_meta($termID,'category_archive',0);
	 }
	 
 }
 /*
@Function Name: pro_scripts_method
@param: null
@return: null
@Usage: Add media upload required js
*/
 function pro_scripts_method() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');

    
}
 /*
@Function Name: pro_scripts_method
@param: null
@return: null
@Usage: Add media upload required css
*/
function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_styles', 'my_admin_styles');
add_action('admin_enqueue_scripts', 'pro_scripts_method');
/*
@Function Name: add_custom_js
@param: null
@return: null
@Usage: Add wp media for image upload
*/
add_action('admin_head', 'add_custom_js');
function add_custom_js(){ ?>
	<script type="text/javascript" language="javascript">
	jQuery(document).ready(function(){
	jQuery('.cat_image').click(function() {
		targetfield = jQuery(this).prev("input[name='cat_imagefield']");
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	window.send_to_editor = function(html) {
		//alert(html);
		img_url = jQuery(html).attr('src');
		jQuery(targetfield).val(img_url);
		jQuery("#cat_img").attr('src',img_url);
		tb_remove();
	}
	
	
	//Remove category image
	jQuery(".remove_image").click(function(){
		jQuery("input[name='cat_imagefield']").val('');
		jQuery("#cat_img").attr('src','');
		return false;
	});
	
	
	 jQuery('#addtag #submit').click(function () {
		if (!jQuery('#addtag .form-invalid').length) {
		  jQuery("input[name='cat_imagefield']").css('display','none')
		   jQuery("#cat_img").attr('src','');
		   jQuery("input[name='archive_category']").attr('checked',false);
		}
	});
	
	});


	</script>
	<?php
}
/*
@Function Name: edit_category_form_fields
@param: term array
@return: null
@Usage: Add image and archive option when editing a term of a resource-category
*/
add_action( 'resource-category_edit_form_fields', 'edit_category_form_fields', 10, 2 );
function edit_category_form_fields($term){ 
		$term_id = $term->term_id;
		$category_image = get_term_meta($term->term_id,'category_image',true);
		$category_archive = (get_term_meta($term->term_id,'category_archive',true)!='') ? get_term_meta($term->term_id,'category_archive',true) : 0;
		
?>
	
	<tr class="form-field">
	<th scope='row'>Image</th>
	<td>
	
	<img src="<?php echo $category_image;?>" id="cat_img"><br/>
	<input class='imagefield' value='<?php echo $category_image;?>' size='40' type='hidden' name='cat_imagefield'/>
		
		<?php if($category_image) { ?>
		<a href="#" class="cat_image button">Change Image</a>
		<a href="#" class="remove_image button">Remove Image</a>
		<?php } else { ?>
		<a href="#" class="cat_image button">Add Image</a>
		<?php }?>
		
	
	</td>
	</tr>
	
		<tr class="form-field">
	<th scope='row'>Archive a Category?</th>
	<td><input type="radio" name="archive_category" value="1" <?php checked($category_archive,1,true);?>>Yes  <input type="radio" name="archive_category" value="0" <?php checked($category_archive,0,true);?>>No</td>
	</tr>
	<?php
}
/*
@Function Name: get_archive_folder
@param: null
@return: object array of all archive folders
@Usage: get list of all archive folders
*/
function get_archive_folder(){
	
	$all_folders = get_standard_folder();
	if($all_folders){
		foreach($all_folders as $folder_key=>$folder){
			
			$is_archive = get_term_meta($folder->term_id,'category_archive',true);
			if($is_archive){
				unset($all_folders[$folder_key]);
			}
		}
	}
	return $all_folders;
}

/*
@Function Name: restrict_page_access
@param: null
@return: bool
*/
function restrict_page_access(){
	
	if(is_page_template('templates/home-region.php') || is_page_template('templates/add-news.php') || is_page_template('templates/add-resource.php') || is_post_type_archive(array('news','resources')) || is_singular( 'news' ) || is_tax('resource-category') || basename(get_page_template()) === 'page.php'){
			if(!is_user_logged_in()){
			wp_safe_redirect(site_url().'/login');
			exit;
		}
		else{
			if(is_tax('resource-category')){
				
				$all_folder = get_standard_folder();
				$all_nonarchive_folder_ids= array();
				$all_folder_ids= array();
				$queried_object = get_queried_object();
				$folder_term_id = isset($queried_object->term_id) ? $queried_object->term_id : '';
				foreach($all_folder as $folder_key=>$folder_arr){
				
						$all_folder_ids[] = $folder_arr->term_id;
					
				}
				
				//Restrict access to non authorized user from access to other's region folder from url
				if(!in_array($folder_term_id,$all_folder_ids) && get_region_id()!=1)
				{
					wp_safe_redirect(site_url().'/sorry-you-are-not-authorized');
					exit;
				} 
				//Restrict access to archive folder
				if(get_term_meta($folder_term_id,'category_archive',true))
					
					
				{
					wp_safe_redirect(site_url().'/folder-is-archived');
					exit;
				}  
			}
			
		}
	}
	
	
}

add_action('template_redirect','restrict_page_access');
?>