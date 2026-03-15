<?php
function sanitize_string_v1($input_str) {
	// Convert to lowercase
	$input_str = strtolower($input_str);
	// Replace spaces and underscores with hyphen
	$input_str = str_replace(array(" ", "_"), "-", $input_str);
	// Remove everything that is not a letter, number, or hyphen
	$input_str = preg_replace("/[^a-z0-9-]/", "", $input_str);
	// Remove duplicate hyphens
	$input_str = preg_replace("/-+/", "-", $input_str);
	// Trim hyphens from start and end
	$input_str = trim($input_str, "-");
	return $input_str;
}
?>