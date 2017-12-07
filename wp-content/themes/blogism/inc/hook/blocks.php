<?php
/**
 * Implementation of feature.
 *
 * @package Blogism
 */

// Check status.
add_filter( 'blogism_filter_featured_block_status', 'blogism_check_featured_block_status' );

// Add to the theme.
add_action( 'blogism_action_before_content', 'blogism_add_featured_block', 5 );

// Details.
add_filter( 'blogism_filter_featured_block_details', 'blogism_get_featured_block_details' );

if ( ! function_exists( 'blogism_get_featured_block_details' ) ) :

	/**
	 * Get details.
	 *
	 * @since 1.0.0
	 *
	 * @param array $input Details.
	 */
	function blogism_get_featured_block_details( $input ) {

		$featured_block_type   = blogism_get_option( 'featured_block_type' );
		$featured_block_number = blogism_get_option( 'featured_block_number' );

		switch ( $featured_block_type ) {

			case 'sticky-posts':

				$sticky = get_option( 'sticky_posts' );

				$qargs = array(
					'posts_per_page' => absint( $featured_block_number ),
					'no_found_rows'  => true,
					'post_type'      => 'post',
					'meta_query'     => array(
						array( 'key' => '_thumbnail_id' ),
					),
				);

				if ( $sticky ) {
					$qargs['post__in'] = $sticky;
				}

				// Fetch posts.
				$all_posts = get_posts( $qargs );
				$items = array();

				if ( ! empty( $all_posts ) ) {

					$cnt = 0;
					foreach ( $all_posts as $key => $post ) {

						if ( has_post_thumbnail( $post->ID ) ) {
							$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogism-block' );
							$items[ $cnt ]['images'] = $image_array;
							$items[ $cnt ]['title']  = get_the_title( $post->ID );
							$items[ $cnt ]['url']    = get_permalink( $post->ID );

							$cnt++;
						}
					}
				}

				if ( ! empty( $items ) ) {
					$input = $items;
				}

			break;

			default:
			break;
		}

		return $input;

	}
endif;

if ( ! function_exists( 'blogism_add_featured_block' ) ) :

	/**
	 * Add featured block.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_featured_block() {

		$flag_apply_status = apply_filters( 'blogism_filter_featured_block_status', false );

		if ( true !== $flag_apply_status ) {
			return false;
		}

		$details = array();
		$details = apply_filters( 'blogism_filter_featured_block_details', $details );

		if ( empty( $details ) ) {
			return;
		}

		// Render featured block.
		blogism_render_featured_block( $details );

	}
endif;

if ( ! function_exists( 'blogism_render_featured_block' ) ) :

	/**
	 * Render featured block.
	 *
	 * @since 1.0.0
	 *
	 * @param array $details Details.
	 */
	function blogism_render_featured_block( $details = array() ) {

		if ( empty( $details ) ) {
			return;
		}

		$featured_block_column = blogism_get_option( 'featured_block_column' );
		?>

		<div id="featured-block">
			<div class="container">
				<div class="featured-block-content-wrapper featured-block-col-<?php echo absint( $featured_block_column ); ?>">
					<?php foreach ( $details as $item ) : ?>

						<div class="featured-block-item">
							<div class="featured-block-item-thumb">
									<?php if ( ! empty( $item['images'] ) ) : ?>
										<div class="item-thumb">
											<img src="<?php echo esc_url( $item['images'][0] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
										</div><!-- .item-thumb -->
									<?php endif; ?>
									<h3 class="featured-block-item-title"><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h3>
								</a>
							</div><!-- .featured-block-item-thumb -->
						</div><!-- .featured-block-item -->

					<?php endforeach; ?>

				</div><!-- .featured-block-content-wrapper -->
			</div><!-- .container -->
		</div><!-- #featured-block -->
	    <?php
	}
endif;

if( ! function_exists( 'blogism_check_featured_block_status' ) ) :

	/**
	 * Check status.
	 *
	 * @since 1.0.0
	 */
	function blogism_check_featured_block_status( $input ) {

		// Status.
		$featured_block_status = blogism_get_option( 'featured_block_status' );

		// Get Page ID outside Loop.
		$page_id = null;
		$queried_object = get_queried_object();
		if ( is_object( $queried_object ) && 'WP_Post' === get_class( $queried_object ) ) {
			$page_id = get_queried_object_id();
		}

		// Front page displays in Reading Settings.
		$show_on_front  = get_option( 'show_on_front' );
		$page_on_front  = absint( get_option( 'page_on_front' ) );
		$page_for_posts = absint( get_option( 'page_for_posts' ) );

		switch ( $featured_block_status ) {

			case 'disabled':
				$input = false;
				break;

			case 'entire-site':
				$input = true;
				break;

			case 'home-page':
				if ( $page_on_front === $page_id && $page_on_front > 0 ) {
					$input = true;
				}
				break;

			case 'blog-page':
				if ( ( 'posts' === $show_on_front && is_home() ) || ( $page_for_posts === $page_id && $page_for_posts > 0 ) ) {
					$input = true;
				}
				break;

			case 'home-blog-page':
				if ( ( $page_on_front === $page_id && $page_on_front > 0 ) || ( 'posts' === $show_on_front && is_home() ) || ( $page_for_posts === $page_id && $page_for_posts > 0 ) ) {
					$input = true;
				}
				break;

			default:
				break;
		}

		return $input;
	}

endif;
