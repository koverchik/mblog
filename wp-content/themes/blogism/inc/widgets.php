<?php
/**
 * Theme widgets.
 *
 * @package Blogism
 */

// Load widget base.
require_once get_template_directory() . '/lib/widget-base/class-widget-base.php';

if ( ! function_exists( 'blogism_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function blogism_load_widgets() {

		// Social widget.
		register_widget( 'Blogism_Social_Widget' );

		// Recent Posts widget.
		register_widget( 'Blogism_Recent_Posts_Widget' );

	}

endif;

add_action( 'widgets_init', 'blogism_load_widgets' );

if ( ! class_exists( 'Blogism_Social_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Blogism_Social_Widget extends Blogism_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'blogism_widget_social',
				'description'                 => esc_html__( 'Displays social icons.', 'blogism' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => esc_html__( 'Title:', 'blogism' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				);

			if ( false === has_nav_menu( 'social' ) ) {
				$fields['message'] = array(
					'label' => esc_html__( 'Social menu is not set. Please create menu and assign it to Social Menu.', 'blogism' ),
					'type'  => 'message',
					'class' => 'widefat',
					);
			}

			parent::__construct( 'blogism-social', esc_html__( 'Blogism: Social', 'blogism' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
			}

			if ( has_nav_menu( 'social' ) ) {
				echo '<nav class="social-navigation" role="navigation" aria-label="' . esc_attr__( 'Social Menu', 'blogism' ) . '">';
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
				echo '</nav><!-- .social-navigation -->';
			}

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Blogism_Recent_Posts_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class Blogism_Recent_Posts_Widget extends Blogism_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'blogism_widget_recent_posts',
				'description'                 => esc_html__( 'Displays recent posts.', 'blogism' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => esc_html__( 'Title:', 'blogism' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => esc_html__( 'Select Category:', 'blogism' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => esc_html__( 'All Categories', 'blogism' ),
					),
				'post_number' => array(
					'label'   => esc_html__( 'Number of Posts:', 'blogism' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'featured_image' => array(
					'label'   => esc_html__( 'Featured Image:', 'blogism' ),
					'type'    => 'select',
					'default' => 'thumbnail',
					'options' => blogism_get_image_sizes_options( true, array( 'disable', 'thumbnail' ), false ),
					),
				'image_width' => array(
					'label'       => esc_html__( 'Image Width:', 'blogism' ),
					'type'        => 'number',
					'description' => esc_html__( 'px', 'blogism' ),
					'css'         => 'max-width:60px;',
					'adjacent'    => true,
					'default'     => 90,
					'min'         => 1,
					'max'         => 150,
					),
				'disable_date' => array(
					'label'   => esc_html__( 'Disable Date', 'blogism' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'blogism-recent-posts', esc_html__( 'Blogism: Recent Posts', 'blogism' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
			);

			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = $params['post_category'];
			}

			$all_posts = get_posts( $qargs );

			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="recent-posts-wrapper">

					<?php foreach ( $all_posts as $key => $post ) : ?>
						<?php setup_postdata( $post ); ?>

						<div class="recent-posts-item">

							<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
								<div class="recent-posts-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
										$img_attributes = array(
											'class' => 'alignleft',
											'style' => 'max-width:' . esc_attr( $params['image_width'] ). 'px;',
											);
										the_post_thumbnail( esc_attr( $params['featured_image'] ), $img_attributes );
										?>
									</a>
								</div><!-- .recent-posts-thumb -->
							<?php endif ?>
							<div class="recent-posts-text-wrap">
								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3><!-- .recent-posts-title -->

								<?php if ( false === $params['disable_date'] ) :  ?>
									<div class="recent-posts-meta">

										<?php if ( false === $params['disable_date'] ) :  ?>
											<span class="recent-posts-date"><?php the_time( get_option( 'date_format' ) ); ?></span><!-- .recent-posts-date -->
										<?php endif; ?>

									</div><!-- .recent-posts-meta -->
								<?php endif; ?>

							</div><!-- .recent-posts-text-wrap -->

						</div><!-- .recent-posts-item -->

					<?php endforeach; ?>

				</div><!-- .recent-posts-wrapper -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;
