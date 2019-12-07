<?php

get_header();

// Hero Search

?>

<div class="container inner-page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
          <li class="breadcrumb-item"><a href="/allnews/" class="link-default">Новости</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php the_title('', ''); ?></li>
        </ol>
      </nav>

      <h1 class="page-title"><?php the_title('', ''); ?></h1>

      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="img-fluid post-thumb">

      <div class="content newspage">
        <?php the_content(); ?>
      </div> <!-- //.content -->


      <?php endwhile;?>
    <?php endif;?>
    </div> <!-- //.container -->

    <!-- //Hero Search -->
<?php


get_footer(); ?>






























































<?php if(0): ?><?php
/**
 * Single Template
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */

global $ct_options;

$ct_post_header_meta = get_post_meta($post->ID, '_ct_post_header', true);
$ct_post_layout = isset( $ct_options['ct_post_layout'] ) ? $ct_options['ct_post_layout'] : '';
$ct_author_img = isset( $ct_options['ct_author_img'] ) ? $ct_options['ct_author_img'] : '';
$ct_post_meta = isset( $ct_options['ct_post_meta'] ) ? $ct_options['ct_post_meta'] : '';
$ct_post_social = isset( $ct_options['ct_post_social'] ) ? $ct_options['ct_post_social'] : '';
$ct_post_tags = isset( $ct_options['ct_post_tags'] ) ? $ct_options['ct_post_tags'] : '';
$ct_author_info = isset( $ct_options['ct_author_info'] ) ? $ct_options['ct_author_info'] : '';
$ct_related_posts = isset( $ct_options['ct_related_posts'] ) ? $ct_options['ct_related_posts'] : '';
$ct_post_nav = isset( $ct_options['ct_post_nav'] ) ? $ct_options['ct_post_nav'] : '';
$ct_post_comments = isset( $ct_options['ct_post_comments'] ) ? $ct_options['ct_post_comments'] : '';

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

	// Custom Post Header Background Image
	if(get_post_meta($post->ID, '_ct_post_header_bg', true) == 'Yes') {
		echo'<style type="text/css">';
		echo '#single-header { background: url(';
		echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo ') no-repeat center center; background-size: cover;}';
		echo '</style>';
	} elseif(get_post_meta($post->ID, '_ct_post_header_bg_color', true) != '') {
        echo'<style type="text/css">';
        echo '.dark-overlay { background: none;} ';
        echo '#single-header { background-color:';
        echo get_post_meta($post->ID, '_ct_post_header_bg_color', true);
        echo '}';
        echo '</style>';
    } ?>

    <?php do_action('before_single_header'); ?>

    <?php if($ct_post_header_meta != 'No') { ?>
	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<?php if($ct_author_img == 'yes') { ?>
					<figure class="author-avatar">
				       <?php if(get_the_author_meta('ct_profile_url')) {				
							echo '<a href="';
								echo site_url() . '/?author=';
								echo the_author_meta('ID');
							echo '">';
								echo '<img class="authorimg" src="';
									echo aq_resize(the_author_meta('ct_profile_url'),80);
								echo '" />';
							echo '</a>';
						} else {
							echo '<a href="';
								echo site_url() . '/?author=';
								echo the_author_meta('ID');
							echo '">';
							echo get_avatar( get_the_author_meta('email'), '80' );
							echo '</a>';
						} ?>
			        </figure>
		        <?php } ?>
		        <?php if(get_post_meta($post->ID, '_ct_post_title', true) != 'No') { ?>
					<h1 class="marT0 marB0"><?php the_title(); ?></h1>
				<?php } ?>
				<?php if(get_post_meta($post->ID, '_ct_sub_title', true) != '') { ?>
					<h2 class="marT0 marB0"><?php echo stripslashes(get_post_meta($post->ID, "_ct_sub_title", true)); ?></h2>
				<?php } ?>
				<?php if($ct_post_meta == 'yes') { ?>
				<p>
					<span class="meta">
						<?php esc_html_e('By', 'contempo'); ?> <?php the_author_posts_link(); ?> <?php esc_html_e('in', 'contempo'); ?> <?php $cat = get_the_category(); $cat = $cat[0]; ?><a href="<?php echo home_url(); ?>/?cat=<?php echo esc_html($cat->cat_ID); ?>"><?php echo esc_html($cat->cat_name); ?></a> <?php esc_html_e('with', 'contempo'); ?> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a>
					</span>
				</p>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Header -->
	<?php } ?>

	<?php do_action('before_single_content'); ?>

	<!-- Container -->
	<div class="container <?php if($ct_post_header_meta == 'No') { echo 'padT60'; } ?> padB60">

	<?php
		echo '<!-- Content -->';
		echo '<div class="single-content col';
			if($ct_post_layout == 'full-width') { echo ' span_12 first'; } else { echo ' span_9'; }
				echo '">';

				// Video
				$video_url = get_post_meta($post->ID, "_ct_video", true);
                $ct_embed_code = wp_oembed_get( $video_url );
                if($video_url) {
                	echo '<div class="video marB30">';
						echo $ct_embed_code;
					echo '</div>';
				}
				// End Video
	            
	            // Post Content
				get_template_part( 'content');
				// End Post Content

				// Post Social
				if($ct_post_social == 'yes') {
			        ct_post_social();
			    }

			    // Post Tags
				if($ct_post_tags == 'yes') {
			        ct_post_tags();
			    }
	            
	        endwhile; endif;

	        	// Link Pages
		        wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) );

		        // Author Info
		        $ct_bio = get_the_author_meta('description');
		        if($ct_author_info == 'yes' && $ct_bio != '') {
			        ct_author_info();
			    }

		        // Related Posts
		        if($ct_related_posts== 'yes') {
			        ct_related_posts();
			    }

			    // Posts Nav
		        if($ct_post_nav == 'yes') {
			        ct_post_nav();
			    }

				// Comments
				if($ct_post_comments == 'yes') {
			        if (comments_open() || '0' != get_comments_number()) :

			        	// If comments are open or we have at least one comment, load up the comment template
						comments_template();
					
					endif;
				}
				// End Comments

			echo '</article>';
			// End Single Inner

		echo '</div>';
		echo '<!-- //Content -->';

		do_action('before_single_sidebar');

		if($ct_post_layout != 'full-width') {
			// Sidebar
			get_template_part('sidebar');
			// End Sidebar
		}

			echo '<div class="clear"></div>';

			do_action('after_single_sidebar');

	echo '</div>';
	// End Container

get_footer(); ?>

    <?php endif; ?>









    