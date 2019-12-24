<?php
/**
 * Extend WP_Customize_Control to add the radio buttonset control.
 *
 * Class ColorMag_Color_Control
 *
 * @since 2.0.0
 */

/**
 * Class to extend WP_Customize_Control to add the radio buttonset customize control.
 *
 * Class ColorMag_Color_Control
 */
class ColorMag_Buttonset_Control extends WP_Customize_Control {

	/**
	 * Control's Type.
	 *
	 * @var string
	 */
	public $type = 'colormag-buttonset';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();

		$this->json['link']        = $this->get_link();
		$this->json['id']          = $this->id;
		$this->json['label']       = esc_html( $this->label );
		$this->json['description'] = $this->description;

		$this->json['choices'] = $this->choices;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>

		<div class="customizer-text">
			<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>

			<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</div>

		<div id="input_{{ data.id }}" class="buttonset">
			<# for ( key in data.choices ) { #>
			<input {{{ data.inputAttrs }}}
			       class="input-buttonset"
			       type="radio"
			       value="{{ key }}"
			       name="_customize-radio-{{ data.id }}"
			       id="{{ data.id }}{{ key }}"
			       {{{ data.link }}}
			<# if ( data.value === key ) { #> checked="checked"<# } #>
			>

			<label for="{{ data.id }}{{ key }}" class="colormag-radio-buttonset">
				{{{ data.choices[ key ] }}}
			</label>
			<# } #>
		</div>

		<?php
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 */
	public function render_content() {
	}

}
