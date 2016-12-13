<?php
/**
 * Template part for displaying single posts.
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<div class="entry-main">

		<?php do_action('vantage_entry_main_top') ?>

		<?php if ( ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) || ( has_post_thumbnail() && siteorigin_setting('blog_featured_image') ) || ( siteorigin_setting( 'blog_post_metadata' ) && get_post_type() == 'post' ) ) : ?>
			<header class="entry-header">

				<?php if( has_post_thumbnail() && siteorigin_setting('blog_featured_image') ): ?>
					<div class="entry-thumbnail"><?php vantage_entry_thumbnail(); ?></div>
				<?php endif; ?>

				<?php if ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php endif; ?>

				<?php if ( siteorigin_setting( 'blog_post_metadata' ) && get_post_type() == 'post' ) : ?>
					<div class="entry-meta">
						<?php vantage_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

			</header><!-- .entry-header -->
		<?php endif; ?>
		<div class='teamdata_before'>
		<?
		 $meta = get_post_meta( get_the_ID() );
        if(isset($meta['wpimprov-team-fb'])){
            ?><?php echo __('Facebook','wpimprov') ?>: <a href="<?php  echo esc_url("https://facebook.com/" .$meta['wpimprov-team-fb'][0]);  ?>"><?php  echo esc_html("https://facebook.com/" .$meta['wpimprov-team-fb'][0]);  ?></a><br><?php  
        }
       if(isset($meta['wpimprov-team-web'])){
            ?><?php echo __('Web','wpimprov') ?>: <a href="<?php  echo esc_url($meta['wpimprov-team-web'][0]);  ?>"><?php  echo esc_html($meta['wpimprov-team-web'][0]);  ?></a><br><?php  
        }
      
       if(isset($meta['wpimprov-team-city'])){
            ?><?php echo __('City','wpimprov') ?>: <?php    echo esc_html($meta['wpimprov-team-city'][0]);  ?><br><?php  
        }
		?>
		</div>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vantage' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<div class='teamdata_after'>
		<?php 
		 if(function_exists("wpimprov_team_calendar")){
                     echo wpimprov_team_calendar(get_the_ID());
                      
                  }
		?>
		</div>
		<?php if( vantage_get_post_categories() && ! is_singular( 'jetpack-testimonial' ) ) : ?>
			<div class="entry-categories">
				<?php echo vantage_get_post_categories() ?>
			</div>
		<?php endif; ?>

		<?php if( is_singular() && siteorigin_setting( 'blog_author_box' ) ) : ?>
			<div class="author-box">
				<div class="avatar-box">
					<div class="avatar-wrapper"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ) ?></div>
				</div>
				<div class="box-content entry-content">
					<h3 class="box-title"><?php echo esc_html( get_the_author_meta( 'display_name' ) ) ?></h3>
					<div class="box-description">
						<?php if( get_the_author_meta( 'description' ) ) : ?>
							<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ) ?>
						<?php elseif( current_user_can( 'edit_users', $post->post_author ) ) : ?>
							<a href="<?php echo get_edit_user_link( $post->post_author ); ?>"><?php _e( 'Add author biographical info.', 'vantage' ) ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>


		<?php do_action('vantage_entry_main_bottom') ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
