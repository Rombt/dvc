<?php


class CustomBlocksShortcodes {


	public function register() {
		add_action( 'init', [ $this, 'register_sc' ] );
	}

	public function register_sc() {
		add_shortcode( 'custom-block-1', [ $this, 'render_custom_block_1' ] );
		add_shortcode( 'custom-block-2', [ $this, 'render_custom_block_2' ] );

	}


	public function render_custom_block_1( $atts = [] ) {


		extract( shortcode_atts( [ 
			'image' => '',
			'heading' => '',
			'content' => '',
		], $atts, 'custom-block-1' ) );

		$output = '<div class="custom-block-1">';
		if ( ! empty( $heading ) ) {
			$output .= '<h2>' . esc_html( $heading ) . '</h2>';
		}
		if ( $image !== '' ) {
			$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $heading ) . '">';
		}
		if ( ! empty( $content ) ) {
			$output .= '<div class="content">' . wp_kses_post( $content ) . '</div>';
		}
		$output .= '</div>';

		return $output;
	}

	public function render_custom_block_2( $atts ) {
		$atts = shortcode_atts( [ 
			'image1' => '',
			'image2' => '',
			'image3' => '',
		], $atts, 'custom-block-2' );

		$output = '<div class="custom-block-2">';
		if ( ! empty( $atts['image1'] ) ) {
			$output .= '<img src="' . esc_url( $atts['image1'] ) . '" alt="Image 1">';
		}
		if ( ! empty( $atts['image2'] ) ) {
			$output .= '<img src="' . esc_url( $atts['image2'] ) . '" alt="Image 2">';
		}
		if ( ! empty( $atts['image3'] ) ) {
			$output .= '<img src="' . esc_url( $atts['image3'] ) . '" alt="Image 3">';
		}
		$output .= '</div>';

		return $output;
	}


}
$short_codes = new CustomBlocksShortcodes();
$short_codes->register();