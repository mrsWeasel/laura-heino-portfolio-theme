<?php

add_filter('wpcf7_form_elements', 'lh_wpcf7_form_elements');

function lh_wpcf7_form_elements( $content ) {

	$span = "/<(\/)?span([^>])*>/";

	//$content = preg_replace($span, '', $content);

	return $content;
}