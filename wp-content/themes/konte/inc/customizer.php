<?php
/**
 * Konte Theme Customizer
 *
 * @package Konte
 */

/**
 * Class customizer
 */
class Konte_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config Theme options fields.
	 */
	public function __construct( $config = array() ) {
		$this->config = apply_filters( 'konte_customize_config', $config );

		$this->register();

		add_action( 'customize_preview_init', array( $this, 'enqueue_preview_scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'customize_register', array( $this, 'customize_rearrange' ) );
	}

	/**
	 * Enqueues style and scripts for customizer controls
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

		wp_add_inline_style( 'customize-controls', '.customize-control-kirki-radio-image label {margin-right: 5px} li.control-section-kirki-default { min-height: unset; }' );
		wp_enqueue_script( 'konte-customize', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '', true );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function enqueue_preview_scripts() {
		wp_add_inline_style( 'wp-admin', '.customize-control-kirki-radio-image label {margin-right: 5px;}' );
		wp_enqueue_script( 'konte-customizer-preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), '', true );
	}

	/**
	 * Register settings
	 */
	public function register() {
		if ( empty( $this->config['theme'] ) ) {
			return;
		}

		$theme = $this->config['theme'];

		// Add the theme configuration.
		Kirki::add_config( $theme, array(
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		) );

		// Add panels.
		foreach ( $this->config['panels'] as $id => $panel ) {
			Kirki::add_panel( $id, $panel );
		}

		// Add sections.
		foreach ( $this->config['sections'] as $id => $section ) {
			Kirki::add_section( $id, $section );
		}

		// Add settings.
		foreach ( $this->config['settings'] as $section => $settings ) {
			foreach ( $settings as $name => $setting ) {
				if ( empty( $setting['section'] ) ) {
					$setting['section'] = $section;
				}

				if ( empty( $setting['settings'] ) ) {
					$setting['settings'] = $name;
				}

				Kirki::add_field( $theme, $setting );
			}
		}
	}

	/**
	 * Move some default sections to `general` panel that registered by theme
	 *
	 * @param object $wp_customize WP_Customize object.
	 */
	public function customize_rearrange( $wp_customize ) {
		$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
		$wp_customize->get_section( 'static_front_page' )->panel = 'general';
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name Option name.
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( class_exists( 'Kirki\Compatibility\Kirki' ) ) {
			$value = Kirki\Compatibility\Kirki::get_option( $this->get_theme(), $name );
		} else {
			$value = get_theme_mod( $name );
			$value = false === $value ? $this->get_option_default( $name ) : $value;
		}

		return $value;
	}

	/**
	 * Get default option values
	 *
	 * @param string $name Option name.
	 *
	 * @return mixed
	 */
	public function get_option_default( $name ) {
		if ( isset( Kirki::$fields[ $name ] ) && isset( Kirki::$fields[ $name ]['default'] ) ) {
			$default = Kirki::$fields[ $name ]['default'];
		} else {
			$settings = array_reduce( $this->config['settings'], 'array_merge', array() );
			$default  = isset( $settings[ $name ]['default'] ) ? $settings[ $name ]['default'] : false;
		}

		return $default;
	}
}

// Define theme option via filter.
add_filter( 'konte_customize_config', 'konte_get_customize_config' );

/**
 * Flush the transient of Instagram user data after the Access Token changed.
 */
function konte_flush_instagram_user_data() {
	delete_transient( 'konte_instagram_user' );
}

add_action( 'customize_save_api_instagram_token', 'konte_flush_instagram_user_data' );

$konte_customize = new Konte_Customize();
