<?php
// Stop WordPress from modifying .htaccess permalink rules
add_filter('flush_rewrite_rules_hard','__return_false');

//Default .htaccess permissions   = 644 (rw- r-- r--)
Read-only .htaccess permissions = 444 (r-- r-- r--)

# Always use https for secure connections
# Replace 'www.example.com' with your domain name
# (as it appears on your SSL certificate)
RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://www.example.com/$1 [R=301,L]
_________________________________________________________________________________________
# Redirect non-www urls to www
RewriteEngine on
RewriteCond %{HTTP_HOST} !^www\.yoursite\.com
RewriteRule (.*) http://www.yoursite.com/$1 [R=301,L]

#Redirect subdomain http to https
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}/%{REQUEST_URI} [L,R=301]


# Redirect a particular page
Redirect 301 /index.php/homepage/2-uncategorised/ http://www.airlinkshuttle.co.nz/

# Redirect http to https entire site
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{SERVER_PORT} !^443$
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
//block all attempts to access your WordPress username via the ?author parameter 
RewriteEngine On
RewriteCond %{REQUEST_URI} !^/wp-admin [NC]
RewriteCond %{QUERY_STRING} author=\d
RewriteRule ^ /? [L,R=301]

OR

function redirect_to_home_if_author_parameter() {

	$is_author_set = get_query_var( 'author', '' );
	if ( $is_author_set != '' && !is_admin()) {
		wp_redirect( home_url(), 301 );
		exit;
	}
}
_____________________________________________________________________________________________
https://www.cloudways.com/blog/custom-dashboard-using-woocommerce-php-rest-api/

______________________________________________________________________________________________
//Keep priority 9 so we can remove WordPress action that is on 10
add_action( 'login_head', 'custom_no_robots', 9);
/**
 * Custom robot tags
 */
function custom_no_robots() {
    remove_action( 'login_head', 'wp_no_robots' );
    echo "<meta name='robots' content='noindex, nofollow' />\n";
}

	
add_action( 'template_redirect', 'redirect_to_home_if_author_parameter' );
/*image attachment page, then they will be redirected to the parent post*/
add_action( 'template_redirect', 'wpsites_attachment_redirect' );
function wpsites_attachment_redirect(){
global $post;
if ( is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent != 0) ) :
    wp_redirect( get_permalink( $post->post_parent ), 301 );
    exit();
    wp_reset_postdata();
    endif;
}
/*Set temp dir path via cpanel in php.ini*/
upload_tmp_dir = on
upload_tmp_dir = /var/www/vhosts/domainname.com/httpdocs/wp-content/temp/
//Plugin: Featured Video Plus
/*
Get unattach image from posts
*/
 select * from wp_posts where post_parent='0' and post_type='attachment'
/*Delete transient data from wp_options (Garbage values)*/
DELETE FROM `wp_options` WHERE `option_name` LIKE ('%\_transient\_%');	
/*Display post image*/ 
$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true); 
$imgID  = get_post_thumbnail_id($post->ID);
$img    = wp_get_attachment_image_src($imgID,'full', false, ''); 
$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true); 
<img src="<?php echo $img[0]; ?>"alt="<?php echo $imgAlt; ?>" />

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
/*Add custom pagination for Blog page*/
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
		
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

/*Add cart page redirect to direct checkout page*/
add_filter ('woocommerce_add_to_cart_redirect', 'woo_redirect_to_checkout');
function woo_redirect_to_checkout() {	
	$checkout_url = WC()->cart->get_checkout_url();	
	return $checkout_url;
}
/*Direct Products ID addtocart page*/
http://domainname.com/?add-to-cart=697
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

/*Create a file without via wp-admin details*/
paste this code in hedear file then you will be 
touch('wp-content/themes/YOUR_THEME_DIR/FILE_NAME.php');


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
 
 
 dismissed_wp_pointers
 _________________________________________________________________________________________________________________________
 Remove website comment form field
 function crunchify_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');
 
 
 
 
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

/* Get User list datda with custom post type*/
$profile_post = get_posts(array('post_type' => PROFILE,'author' => $post_author_ID));
$profile_post = $profile_post[0];
$current = $post_object->convert( $profile_post );

/**
 * Disable front page from search
 */
function wpb_filter_query( $query, $error = true ) {
if ( is_search() ) {
$query->is_search = false;
$query->query_vars[s] = false;
$query->query[s] = false;
if ( $error == true )
$query->is_404 = true;
}
}
add_action( 'parse_query', 'wpb_filter_query' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
function remove_search_widget() {
    unregister_widget('WP_Widget_Search');
 
add_action( 'widgets_init', 'remove_search_widget' );
}
 ?>  
<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );

/*No of Post view code start here*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//echo getPostViews(get_the_ID());

// create shortcode to display Most Popular Posts
add_shortcode( 'list-popular-posts', 'custom_popular_post_code' );
function custom_popular_post_code() {
    ob_start();
    $query = new WP_Query( 
	array( 
		'post_type' => 'post', 
		'posts_per_page' => 2, 
		'meta_key' => 'wpb_post_views_count', 
		'orderby' => 'meta_value_num', 
		'order' => 'DESC'		
	) ) ;
	
    if ( $query->have_posts() ) { 
	//echo $count = get_post_meta( $post->ID, 'wpb_post_views_count', true );
	?>
        <div class="ft-news">
            <?php while ( $query->have_posts() ) : $query->the_post(); 
			
			?>
            <div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( array(100, 75), false, array('alt' => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ))
				) ); ?>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<p><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('F j, Y') ?></p>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</div>
			</div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

/*Custom Category List*/
add_shortcode( 'cat-list', 'getCatList' );
function getCatList(){
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
	'exclude' => '1',
	'show_count' => 0
) );?>
<h4 class="cat-list">Categories</h4>
<ul>
<?php foreach( $categories as $category ) {
	echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';   
} ?>
</ul>
<?php
}
//Display posts by current author:
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
//echo $author->ID;			
$args = array(
'post_type' => 'post',
'author'    => $author->ID,			
'orderby'   =>  'post_date',
'order'     =>  'ASC',
'posts_per_page' => -1
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
		
		
		
echo off
command
echo on

save as in notepad cmdopen.bat


run on cmdopen
tracert www.facebook.com
__________________________

hot shield addons
