<?php
/**
 * Class to include Blog Single Post customize options.
 *
 * Class ColorMag_Customize_Blog_Single_Post
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to include Blog Single Post customize options.
 *
 * Class ColorMag_Customize_Blog_Single_Post
 */
class ColorMag_Customize_Blog_Single_Post extends ColorMag_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function customizer_options( $options, $wp_customize ) {

		$configs = array();

		$options = array_merge( $options, $configs );

		return $options;

	}

}

return new ColorMag_Customize_Blog_Single_Post();
