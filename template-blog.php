<?php
/**
 * Template Name: Blog Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
 get_header(); ?>    
    <div class="inner-banner-section">
        <div class="container">
            <div class="row">
                <div class="page-title col-sm-12">
                    <h1>Blog</h1>
                    <!---<p class="page-subtitle">Money Doesn’t Come Without Guidence...</p>--->
                </div>
            </div>
        </div>
    </div>

    <div id="main" class="middle-wrapper full-width page-gapping">
        <div class="container">
            <div class="row">
				
				
                <div class="site-content col-md-9 col-sm-9 col-xs-9">
				<?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array('post_type' => 'post', 'posts_per_page' => 2, 'paged' => $paged );

                    $post_type_data = new WP_Query($args);

                    set_query_var('page',$paged);
                    while ($post_type_data->have_posts()): $post_type_data->the_post();
                    global $more;
                        $more = 0; ?>
                        <div class="blog-item">
                            
                            <div class="feature-image img-overlay">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php $default = array('class' => 'img-responsive');
                                    the_post_thumbnail('wl_blog_img', $default); ?>
                                <?php endif; ?>
                            </div>
                            
                            <div class="feature-content">
                                <h3 class="h3-blog-title">
                                    <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                </h3>
                                <span><i class="icon-picture"></i></span>
                                <span><i class="icon-time"></i><?php echo get_the_date('j'); ?> <?php echo the_time('M'); ?>, <?php echo the_time('Y'); ?></span>                              

                                <p><?php the_excerpt(); ?></p>
                                <a class="btn" href="<?php echo the_permalink(); ?>">Read More</a>
                            </div>

                        </div>
                    <?php endwhile; ?>
					<div class="nav-previous alignleft"><?php previous_posts_link('&laquo; Newer posts');?></div>
                        <div class="nav-next alignright"><?php next_posts_link( 'Older posts &raquo;', $post_type_data->max_num_pages ); ?></div>
                    
                </div>	
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer();
