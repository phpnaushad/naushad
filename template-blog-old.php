<?php
/*
Template Name:  Blog Page Content
*/

get_header(); ?>
<div class="mt_manacourleft">
  <hgroup class="mtbloghd">
   <h3>management Blog</h3>
  </hgroup>
   
    <?php query_posts('posts_per_page=5'); ?>
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); 
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
$thumbnailSrc = $src[0];
?>



    <div class="mt_blog">
   <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
   <i><?php the_time('F j, Y'); ?></i>  
<div class="clear"></div>   
    <div class="mt_blosection">
    <img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $thumbnailSrc; ?>&h=200&w=300&zc=1q=100" alt="">
      
     <p><?php the_excerpt(); ?></p>
     <div class="mt_learn mt_sec_btn"><a href="<?php the_permalink(); ?>">Read More</a></div>    
  
    <div class="clear"></div>
    </div>
    
   <div class="clear"></div>  
    </div>
    
    
<?php endwhile; ?>

<?php endif; ?>
    
      
<div class="clear"></div>
</div>

<div class="mt_rightpanl">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
    
<div class="clear"></div>
</div>


<div class="clear"></div>
</div>


<?php get_footer(); ?>
