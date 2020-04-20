<!-- start content container -->
<?php if ( has_post_thumbnail() && get_theme_mod( 'featured-img-check', 1 ) == 1 ) : ?>                                
	<div class="single-thumbnail row" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
		<?php echo get_the_post_thumbnail( $post->ID, 'firstmag-single', array( 'itemprop' => 'Url' ) ); ?>
		<?php firstmag_set_image_microdata(); ?>
	</div>                                     
	<div class="clear"></div>                            
<?php endif; ?> 
<div class="row rsrc-content">    
	<?php //left sidebar ?>    
	<?php get_sidebar( 'left' ); ?>    
	<article class="col-md-<?php firstmag_main_content_width(); ?> rsrc-main <?php echo get_theme_mod( 'theme-style', 'basic-layout' ) ?>">        
		<link itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" />
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>         
				<?php
				if ( function_exists( 'firstmag_breadcrumb' ) && get_theme_mod( 'breadcrumbs-check', 1 ) != 0 ) {
					firstmag_breadcrumb();
				}
				?>                 
				<div <?php post_class( 'rsrc-post-content' ); ?>>                            
					<header>                              
						<h1 class="entry-title page-header" itemprop="headline">
							<?php the_title(); ?>
						</h1>                              
						<?php get_template_part( 'template-part', 'postmeta' ); ?>                            
					</header>                                                                                    
					<div class="ad-before">  
						<?php
						if ( get_theme_mod( 'banner-single-before', '' ) != '' ) {
							echo get_theme_mod( 'banner-single-before' );
						}
						?> 
					</div>  
					<?php if ( get_theme_mod( 'float-banner-enable', 0 ) != 0 && get_theme_mod( 'float-banner-single', '' ) != '' ) : ?>
						<div class="entry-content row" itemprop="articleBody">  
							<div class="col-md-9 col-xs-12">
								<?php
									if(have_rows('meta')){
										get_template_part('template-parts/field', 'meta');
									}
									if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
										the_excerpt();
									} else {
										the_content( __( 'Continue reading', 'twentytwenty' ) );
									}
									if(have_rows('images')){
										get_template_part('template-parts/field', 'images');
									}
									if(have_rows('videos')){
										get_template_part('template-parts/field', 'videos');
									}
								?>
							</div>
							<div class="col-md-3 sticky-ad hidden-xs td-sticky">
								<?php echo get_theme_mod( 'float-banner-single' ); ?>
							</div>
						</div> 
					<?php else: ?>
						<div class="entry-content" itemprop="articleBody">
						<?php
							if(have_rows('meta')){
								get_template_part('template-parts/field', 'meta');
							}
							if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
								the_excerpt();
							} else {
								the_content( __( 'Continue reading', 'twentytwenty' ) );
							}
							if(have_rows('images')){
								get_template_part('template-parts/field', 'images');
							}
							if(have_rows('videos')){
								get_template_part('template-parts/field', 'videos');
							}
						?>
						</div>   
					<?php endif; ?> 
					<div class="ad-after">
						<?php
						if ( get_theme_mod( 'banner-single-after', '' ) != '' ) {
							echo get_theme_mod( 'banner-single-after' );
						}
						?> 
					</div>
					<div id="custom-box"></div>                         
					<?php wp_link_pages(); ?>                                                         
					<?php get_template_part( 'template-part', 'posttags' ); ?>
					<?php if ( get_theme_mod( 'post-nav-check', 1 ) == 1 ) : ?>                            
						<div class="post-navigation row">
							<div class="post-previous col-md-6"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( 'Previous:', 'firstmag' ) . '</span> %title' ); ?></div>
							<div class="post-next col-md-6"><?php next_post_link( '%link', '<span class="meta-nav">' . __( 'Next:', 'firstmag' ) . '</span> %title' ); ?></div>
						</div>
					<?php endif; ?>                            
					<?php if ( get_theme_mod( 'related-posts-check', 1 ) == 1 ) : ?>
						<?php get_template_part( 'template-part', 'related' ); ?>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'author-check', 1 ) == 1 ) : ?>                               
						<?php get_template_part( 'template-part', 'postauthor' ); ?> 
					<?php endif; ?>                             
					<?php comments_template(); ?>                         
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</article> 
	<?php if ( get_theme_mod( 'content-slider-enable', 0 ) != 0 ) : ?>
		<div id="slidebox">
			<?php $category	 = get_the_category( $post->ID ); ?>
			<a class="close-me"></a>
			<div class="slidebox-header"><?php echo $category[ 0 ]->category_count; ?><?php esc_html_e( ' More posts in', 'firstmag' ); ?> <?php if ( $category ) echo '<a href="' . esc_url( get_category_link( $category[ 0 ]->term_id ) ) . '">' . esc_html( $category[ 0 ]->cat_name ) . '</a>'; ?> <?php esc_html_e( 'category', 'firstmag' ); ?></div>
			<div class="slidebox-recomended"><?php _e( 'Recommended for you', 'firstmag' ); ?></div>
			<?php
			$related_cat = get_posts( array( 'category__in' => $category[ 0 ]->term_id, 'numberposts' => '1', 'post__not_in' => array( $post->ID ) ) );
			if ( $related_cat )
				foreach ( $related_cat as $post ) {
					setup_postdata( $post );
					?>
					<div class="slidebox-thumb">
						<?php the_post_thumbnail(); ?>
					</div>  
					<a class="slidebox-title" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<p><?php
						$content = get_the_content();
						echo wp_trim_words( strip_shortcodes( $content ), '15', $more	 = '...' );
						?>
					</p>
				<?php } wp_reset_postdata(); ?>
		</div> <!-- End Content Slider -->
	<?php endif; ?>     
	<?php //get the right sidebar   ?>    
	<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->