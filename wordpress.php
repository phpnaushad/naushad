<?php
//Plugin: Featured Video Plus
/*
Show Custom post type code:
*/
	$args = array( 'post_type' => 'home_section', 'posts_per_page' => 10 );
	//query_posts(array('post_type' => 'services', 'orderby'=>'date','order'=>'ASC') );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
		echo wp_trim_words( get_the_content(), 25 );
	endwhile; wp_reset_query();
	
/*
Show post of particular category code:
*/
	$posts = get_posts('category=3&numberposts=10'); 
	foreach($posts as $post) {
		the_title();
	} 
	wp_reset_query();  

/*
Show all post code:
*/
	 if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
				the_category(" ");
				echo wp_trim_words( get_the_title(), 20 ); 
				the_author();
				wp_trim_words( get_the_content(), 50 );
		endwhile; 
	endif;


/*
Show particular post code:
*/
	query_posts('p=37'); 
	while (have_posts()) : the_post(); 
		the_post_thumbnail();
		the_title();
		echo wp_trim_words( get_the_content(), 50 );
	endwhile; wp_reset_query(); 
	
/*
Show particular page code:
*/    
    $recent = new WP_Query("page_id=34"); 
	while($recent->have_posts()) : $recent->the_post();
		the_title();
		the_content();
	endwhile;

/* 
retrieve one post with an ID of 1
*/
query_posts('post_type=home_section&p=17150');
while (have_posts()) : the_post();
the_title();
the_content();
 endwhile;
/* 
how to display multiple custom fields of a posts
*/	
foreach ( $custom_fields as $field_key => $field_values ) {
				
	if(!isset($field_values[0])) continue;
	if(in_array($field_key,array("_edit_lock","_edit_last"))) continue;		
	  echo $field_key . '=>' . $field_values[0];		
}	
	
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$query_string = 'paged=' . $paged;
	query_posts($query_string); 
	if (have_posts()) : while (have_posts()) : the_post();
		
/*
Link to particular page code:
*/	
  get_page_link(41);

 bloginfo('url');'/?page_id=6';

/*
Link to home url & logo code:
*/	 
 echo home_url();
 echo site_url(); //For site path Exp http://www.example.com/wordpress
/*
Add Custom Post Type Option in WP Admin code:
*/	 
function my_custom_post_youtube() {
	$labels = array(
		'name'               => _x( 'Youtube Video', 'post type general name' ),
		'singular_name'      => _x( 'Youtube Video', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Youtube Video' ),
		'add_new_item'       => __( 'Add New Youtube video' ),
		'edit_item'          => __( 'Edit Youtube Video' ),
		'new_item'           => __( 'New Youtube Video' ),
		'all_items'          => __( 'All Youtube Video' ),
		'view_item'          => __( 'View Youtube Video' ),
		'search_items'       => __( 'Search Youtube Video' ),
		'not_found'          => __( 'No Youtube Video found' ),
		'not_found_in_trash' => __( 'No Youtube Video found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Youtube Video Home Page'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Youtube and Youtube Video specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'youtube', $args );	
}
add_action( 'init', 'my_custom_post_youtube' );


/*
Add Custom Post Type Option in WP Admin code:
*/
function custom_page_approach() {
  $labels = array(
  'name'               => _x( 'Our Approach', 'post type general name' ),
  'singular_name'      => _x( 'Our Approach', 'post type singular name' ),
  'add_new'            => _x( 'Add New', 'Section' ),
  'add_new_item'       => __( 'Add New Section' ),
  'edit_item'          => __( 'Edit Section' ),
  'new_item'           => __( 'New Section' ),
  'all_items'          => __( 'All Section' ),
  'view_item'          => __( 'View Section' ),
  'search_items'       => __( 'Search Section' ),
  'not_found'          => __( 'No section found' ),
  'not_found_in_trash' => __( 'No section found in the Trash' ), 
  'parent_item_colon'  => '',
  'menu_name'          => 'Our Approach'
  );
  $args = array( 
  'labels'              => $labels,
  'hierarchical'        => false,
  'description'         => 'description',
  'taxonomies'          => array( ),
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'menu_position'       => 3,
  'show_in_nav_menus'   => true,
  'publicly_queryable'  => true,
  'exclude_from_search' => false,
  'has_archive'         => true,
  'query_var'           => true,
  'can_export'          => true,
  'rewrite'             => true,
  'capability_type'     => 'page', 
  'supports'            => array( 'title', 'editor'),
  );
  register_post_type( 'approach', $args ); 
  }
  
 add_action( 'init', 'custom_page_approach' ); 



/*
Add menu code:
*/	
echo wp_nav_menu(array('menu' => 'top_menu', 'menu_class' => '', 'menu_id' => '')); 

/*
Remove html tag from comment.php in post code:
*/	

comment_form(); 
//Replace to
 comment_form(array('comment_notes_after' => '')); 

/*
Featured Image Show code:
*/ 

the_post_thumbnail();                  // without parameter -> 'post-thumbnail'
the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Full resolution (original size uploaded)
the_post_thumbnail( array(100,100) );  // Other resolutions

/*
Attachment Image Show code:
*/ 

wp_get_attachment_image( $attachment->ID);

/*
Set path to Image & js code:
*/ 
get_template_directory_uri();
bloginfo('template_directory');

/*
Set title attribute code:
*/ 

the_title_attribute();

/*
Set particular widgets code:
*/ 

the_widget('WP_Widget_Archives');

/*
Increase the Maximum File Upload Size in WordPress:
*/	

/*
1.Increase the Maximum File Upload Size in WordPress:
*/	
	
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/*
2.Create or Edit an existing PHP.INI file:
*/	
'upload_max_filesize = 64M';
'post_max_size = 64M';
'max_execution_time = 300';

/*
3.Create or Edit an existing PHP.INI file:
*/

'php_value upload_max_filesize 64M';
'php_value post_max_size 64M';
'php_value max_execution_time 300';
'php_value max_input_time 300';
?>
<?php 

// Display custom terms of taxonomy
$taxonomies = 'category';
$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => true, 
    'exclude'           => array(), 
    'exclude_tree'      => array(), 
    'include'           => array(13,5,9,6,11,12),
    'number'            => '', 
    'fields'            => 'all', 
    'slug'              => '',
    'parent'            => '',
    'hierarchical'      => true, 
    'child_of'          => 0,
    'childless'         => false,
    'get'               => '', 
    'name__like'        => '',
    'description__like' => '',
    'pad_counts'        => false, 
    'offset'            => '', 
    'search'            => '', 
    'cache_domain'      => 'core'
); 

$terms = get_terms($taxonomies, $args);

if ( $terms && !is_wp_error( $terms ) ) :
foreach( $terms as $term) {
$term_link = get_term_link($term); ?>

<img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
<a href="<?php echo esc_url( $term_link ); ?>"><?php echo $term->name; ?></a>

<?php } else :				
	print('No posts found'); 
endif;
/*Change Prefix of wordpress table*/
change prefix in wp-config file:  _pec
RENAME table `wp_commentmeta` TO `pec_commentmeta`;
RENAME table `wp_comments` TO `pec_comments`;
RENAME table `wp_links` TO `pec_links`;
RENAME table `wp_options` TO `pec_options`;
RENAME table `wp_postmeta` TO `pec_postmeta`;
RENAME table `wp_posts` TO `pec_posts`;
RENAME table `wp_termmeta` TO `pec_termmeta`;
RENAME table `wp_terms` TO `pec_terms`;
RENAME table `wp_term_relationships` TO `pec_term_relationships`;
RENAME table `wp_term_taxonomy` TO `pec_term_taxonomy`;
RENAME table `wp_usermeta` TO `pec_usermeta`;
RENAME table `wp_users` TO `pec_users`;


 SELECT * FROM `pec_options` WHERE `option_name` LIKE '%wp_%'
 
 SELECT * FROM `pec_usermeta` WHERE `meta_key` LIKE '%wp_%'
 _________________________________________________________________________________________________________________________

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', TEXT_DOMAIN ); ?>"/>
    <input type="submit" name="submit" id="searchsubmit" class="inpubtn" value="" /> 
</form> 

<!--Put the full image path-->

<img src="<?php bloginfo('template_url'); ?>/images/image.jpg">
Add editor in responsive slider:

In responsive-slider.php (for version 0.1.8):

- Find :
'supports' => array( 'title', 'thumbnail', 'page-attributes' )
and change it by
'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )

- Then find :
get_the_title().'</a>';
write just after
$slider .= '<p class="excerpt">'. get_the_content() . '</p>'; 

OR

$title = explode( ' | ', the_title, 2 );

http://www.phpro.org/tutorials/Introduction-to-PHP-PDO.html