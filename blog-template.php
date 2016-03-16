<?php
/*
Template Name: Blog
Description: This template for blog
*/
get_header(); ?>
<section class="au_innerall au_abt">
     <aside class="na_aside animated fadeInLeft">
   <h3>Blog</h3>
   <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$query_string = 'paged=' . $paged;
	query_posts($query_string); 
	if (have_posts()) : while (have_posts()) : the_post();
	?>

    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
   <h6><?php the_time('F j, Y'); ?></h6>
	<div class="clear"></div>   
    
    <?php the_post_thumbnail(); ?>
      
     <p><?php the_excerpt(); ?></p>
     <div class="aura_learnmore_btn"><a href="<?php the_permalink(); ?>">Read More</a></div>    

		<div class="na_hr"></div>    
    
	<?php endwhile; ?>

	<?php endif;  ?>
    
      <?php 
	  echo wpbeginner_numeric_posts_nav(); wp_reset_query(); ?> 

	<div class="clear"></div> 
	</aside>
   
  <div class="clear"></div>
</section>
<?php get_footer(); ?>