<?php
/**
 * Bloog Lite Theme Customizer
 *
 * @package Bloog Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bloger_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*------------------------------------------------------------------------------------*/
    /**
     * Upgrade to Bloger Pro
    */
    // Register custom section types.
    $wp_customize->register_section_type( 'Bloger_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section(
        new Bloger_Customize_Section_Pro(
            $wp_customize,
            'bloger-pro',
            array(
                'title'    => esc_html__( 'Upgrade To Bloger Pro', 'bloger' ),
                'title1'    => esc_html__( 'Free Vs Pro', 'bloger' ),
                'pro_text' => esc_html__( 'Buy Now','bloger' ),
                'pro_text1' => esc_html__( 'Compare','bloger' ),
                'pro_url'  => 'https://themeforest.net/item/bloger-pro-blog-magazine-wordpress-theme/20455427?ref=AccessKeys',
                'pro_url1'  => admin_url( 'themes.php?page=bloger-welcome&section=free_vs_pro'),
                'priority' => 1,
            )
        )
    );
    $wp_customize->add_setting(
        'bloger_pro_upbuton',
        array(
            'section' => 'bloger-pro',
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        'bloger_pro_upbuton',
        array(
            'section' => 'bloger-pro'
        )
    );
}
add_action( 'customize_register', 'bloger_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloger_customize_preview_js() {
	wp_enqueue_script( 'bloger_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bloger_customize_preview_js' );

/** gaga_customizer scripts and styles **/
function bloger_customizer_scripts() {
    wp_enqueue_style( 'bloger-customizer-style' , get_template_directory_uri().'/css/customizer-custom.css');
}
add_action( 'customize_controls_enqueue_scripts', 'bloger_customizer_scripts');

/** Extra Controls **/
if( class_exists( 'WP_Customize_Control' ) || class_exists( 'WP_Customize_Section' ) ) :
    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Bloger_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'bloger-pro';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';
        public $pro_text1 = '';
        public $title1 = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';
        public $pro_url1 = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['title1'] = $this->title1;
            $json['pro_text1'] = $this->pro_text1;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['pro_url1']  = $this->pro_url1;
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
                <h3 class="accordion-section-title">
                    {{ data.title1 }}
                    <# if ( data.pro_text1 && data.pro_url1 ) { #>
                        <a href="{{ data.pro_url1 }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text1 }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
endif;
