<?php
/**
 * Class to include Colors customize options.
 *
 * Class ColorMag_Customize_Colors_Options
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to include Colors customize options.
 *
 * Class ColorMag_Customize_Colors_Options
 */
class ColorMag_Customize_Colors_Options extends ColorMag_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$configs = array(

			/**
			 * Primary Colors.
			 */
			// Primary color option.
			array(
				'name'     => 'colormag_primary_color',
				'default'  => '#289dcc',
				'type'     => 'control',
				'control'  => 'colormag-color',
				'label'    => esc_html__( 'Primary Color', 'colormag' ),
				'section'  => 'colormag_primary_colors_section',
				'priority' => 10,
			),

			// Skin color option.
			array(
				'name'     => 'colormag_color_skin_setting',
				'default'  => 'white',
				'type'     => 'control',
				'control'  => 'radio',
				'label'    => esc_html__( 'Skin Color', 'colormag' ),
				'section'  => 'colormag_skin_color_section',
				'choices'  => array(
					'white' => esc_html__( 'White Skin', 'colormag' ),
					'dark'  => esc_html__( 'Dark Skin', 'colormag' ),
				),
				'priority' => 15,
			),
		);

		$options = array_merge( $options, $configs );

		// Category color options.
		$args           = array(
			'orderby'    => 'id',
			'hide_empty' => 0,
		);
		$categories     = get_categories( $args );
		$priority_count = 110;

		foreach ( $categories as $category_list ) {

			$configs[] = array(
				'name'     => 'colormag_category_color_' . get_cat_id( $category_list->cat_name ),
				'default'  => '',
				'type'     => 'control',
				'control'  => 'colormag-color',
				'label'    => $category_list->cat_name,
				'section'  => 'colormag_category_colors_section',
				'priority' => $priority_count,
			);

			$priority_count++;

		}

		$options = array_merge( $options, $configs );

		return $options;
	}

}

return new ColorMag_Customize_Colors_Options();
