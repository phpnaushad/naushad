<?php
/**
 * Locations taxonomy archive
 */
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
<div class="wrapper">
  <div class="cat-container">
    <h1 class="archive-title"><?php echo apply_filters( 'the_title', $term->name ); ?> </h1>

    <?php if ( !empty( $term->description ) ): ?>
    <div class="archive-description">
      <?php echo esc_html($term->description); ?>
    </div>
    <?php endif; ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); 
	
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
     // thumbnail url

	?>

    <div class="galleries-post" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
    <p><a href="<?php echo $thumb[0]; ?>" rel="prettyPhoto" data-rel="prettyPhoto[slides]" title="<?php the_title(); ?>"><?php the_post_thumbnail();  ?></a></p>
    <!--<a class="example-image-link" href="<?php echo get_template_directory_uri(); ?>/img/demopage/image-3.jpg" data-lightbox="example-set" title="">
    <img class="example-image" src="<?php echo get_template_directory_uri(); ?>/img/demopage/thumb-3.jpg"  width="150" height="150"/></a>-->
      <p>&nbsp;</p>      
    </div><!--// end #post-XX -->
   
   
    
    <?php endwhile; ?>
    
    <div class="navigation clearfix">
      <div class="alignleft"><?php next_posts_link('« Previous Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Next Entries »') ?></div>
    </div>

    <?php else: ?>

    <h2 class="post-title">No News in <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
    <div class="content clearfix">
      <div class="entry">
        <p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
      </div>
    </div>

    <?php endif; ?>
  </div>
  
  <!--// end .primary-content -->

</div>
<?php get_footer(); ?>