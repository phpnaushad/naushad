<?php
/**
 Template Name: All Gallery
 */

global $lambda_meta_data;
get_header(); ?>

<div class="cat-container">

<?php

$taxonomy = 'galleries';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
//echo '<pre>';
//print_r($terms); die;
if ( $terms && !is_wp_error( $terms ) ) :
?>
    <ul>
        <?php foreach ( $terms as $term ) { //echo $term->term_id ?>
            <li>
           <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"> <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" /></a>
            <!--<img src="<?php echo get_template_directory_uri(); ?>/images/default-avatar.jpg" />-->
            <p><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></p>
            <p><?php echo $term->count; ?></p>
            </li>
        <?php } ?>
    </ul>
<?php endif;?>

</div>

<?php get_footer();  ?>