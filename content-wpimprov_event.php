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
					<div class="entry-thumbnail"><?php the_post_thumbnail("w_800"); ?></div>
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
		<div class="content-custom"><?php
		 $meta = get_post_meta( get_the_ID() );

        if(isset($meta['wpimprov-event-start-time'])){
            ?><?php   ?><?php

        if(isset($meta['wpimprov-event-end-time'])){
            if (wpimprov_date_dmy($meta['wpimprov-event-start-time'][0])!=wpimprov_date_dmy($meta['wpimprov-event-end-time'][0])){
                echo __('Start time','wpimprov') ?>: <?php  echo wpimprov_date_nice($meta['wpimprov-event-start-time'][0]);
                echo "<br>";
            ?><?php echo __('End time','wpimprov') ?>: <?php  echo wpimprov_date_nice($meta['wpimprov-event-end-time'][0]);  ?><br><?php
        }else{
            echo __('Event time','wpimprov') ?>: <?php  echo wpimprov_date_nice($meta['wpimprov-event-start-time'][0]);
            echo " - ". wpimprov_date_hours($meta['wpimprov-event-end-time'][0]);
        }


            }else{
                echo __('Start time','wpimprov') ?>: <?php  echo wpimprov_date_nice($meta['wpimprov-event-start-time'][0]);
                echo "<br>";

            }


            echo "<br>";
        }else{

        if(isset($meta['wpimprov-event-end-time'])){
            ?><?php echo __('End time','wpimprov') ?>: <?php  echo wpimprov_date_nice($meta['wpimprov-event-end-time'][0]);  ?><br><?php
        }


        }



       if(isset($meta['wpimprov-event-venue']) or isset($meta['wpimprov-event-venue-city']) or isset($meta['wpimprov-event-venue-street']) ){
            ?><?php echo __('Place','wpimprov') ; ?>:
<?php
 $txtt="";
if(isset($meta['wpimprov-event-venue'])) {
    $txtt.= esc_html($meta['wpimprov-event-venue'][0]).', ';
}
if(isset($meta['wpimprov-event-venue-street'])){
    $txtt.=esc_html($meta['wpimprov-event-venue-street'][0]).', ';
}
if(isset($meta['wpimprov-event-venue-city'])) {

    $txtt.= esc_html($meta['wpimprov-event-venue-city'][0]);
}
	echo(trim($txtt,", "));

               ?><br><?php
        }



        if(isset($meta['wpimprov-event-fb'])){
            ?><?php echo __('Facebook','wpimprov') ?>: <a href="<?php  echo esc_url("https://facebook.com/events/" .$meta['wpimprov-event-fb'][0]);  ?>"><?php  echo esc_html("https://facebook.com/events/" .$meta['wpimprov-event-fb'][0]);  ?></a><br><?php
        }

        if(isset($meta['wpimprov-event-ticket-uri'])){
        	if(strlen($meta['wpimprov-event-ticket-uri'][0])>1){
            ?><?php echo __('Tickets','wpimprov') ?>: <a href="<?php  echo esc_url($meta['wpimprov-event-ticket-uri'][0]);  ?>"><?php  echo esc_html($meta['wpimprov-event-ticket-uri'][0]);  ?></a><br><?php
        }
        }

       $tags = wp_get_post_terms($post->ID,"wpimprov_event_team");
       if(count($tags)){
          echo __('Performing','wpimprov').': ';
          foreach($tags as $tag){
              echo '<a href="'.get_permalink($tag->description).'">'.$tag->name.'</a> ';
          }
       }

		?>
		</div>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vantage' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<?php if( vantage_get_post_categories() && ! is_singular( 'jetpack-testimonial' ) ) : ?>
			<div class="entry-categories">
				<?php// echo vantage_get_post_categories()
				?>
			</div>
		<?php endif; ?>

		<?php
		$options=get_option('wpimprov_settings');
		if(isset($options['wpimprov_textarea_disclaimer'])){
			if(strlen($options['wpimprov_textarea_disclaimer'])>0){
			?><hr><p> <?php
				echo $options['wpimprov_textarea_disclaimer'];
		?></p><?php
			}
		}
  do_action('vantage_entry_main_bottom') ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
