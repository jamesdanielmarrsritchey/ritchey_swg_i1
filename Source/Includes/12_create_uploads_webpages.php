<?php
# Meta
// Name: Create Uploads Webpages
// Description: Create webpages for uploads, if they qualify for inclusion
// Status: Stable
// UUID: 3f15102e, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_3f15102e_n_num = 1;
$var_3f15102e_location_str = realpath(dirname(__FILE__, $var_3f15102e_n_num));
while (is_file("{$var_3f15102e_location_str}/application.php") !== TRUE) {
	$var_3f15102e_n_num++;
	$var_3f15102e_location_str = realpath(dirname(__FILE__, $var_3f15102e_n_num));
	if ($var_3f15102e_n_num > 50){
		exit(1);
	}
}
$var_3f15102e_location_str = realpath(dirname($var_3f15102e_location_str, 1));
eval(substr(file_get_contents("{$var_3f15102e_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Create a list of uploads, using the meta files.
// Create list
require_once $var_3f15102e_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_3f15102e_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_3f15102e_location_str}/Source/Uploads", NULL, NULL, TRUE);
foreach ($var_3f15102e_files_arr as &$var_3f15102e_item_str){
	if (substr($var_3f15102e_item_str, -5) === '.meta'){
		$var_3f15102e_item_str = '';
	} else if (substr($var_3f15102e_item_str, -14) === '.thumbnail.jpg'){
		$var_3f15102e_item_str = '';
	}
}
unset($var_3f15102e_item_str);
$var_3f15102e_files_arr = array_filter($var_3f15102e_files_arr);
// Sort List By Age
$var_3f15102e_files_sorted_arr = array();
foreach ($var_3f15102e_files_arr as &$var_3f15102e_item_str){
	require_once $var_3f15102e_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_3f15102e_date_uploaded_str = ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_item_str}.meta", 'Date Uploaded: ', FALSE, FALSE, TRUE);
	$var_3f15102e_timestamp_uploaded_obj = strtotime($var_3f15102e_date_uploaded_str);
	// Keep in mind, some items will have same timestamp, so use nested array to add more items to same timestamp.
	if (isset($var_3f15102e_files_sorted_arr[$var_3f15102e_timestamp_uploaded_obj]) === TRUE){
		$var_3f15102e_files_sorted_arr["$var_3f15102e_timestamp_uploaded_obj"][] = $var_3f15102e_item_str;
	} else {
		$var_3f15102e_files_sorted_arr["$var_3f15102e_timestamp_uploaded_obj"] = array($var_3f15102e_item_str);
	}
}
unset($var_3f15102e_item_str);
krsort($var_3f15102e_files_sorted_arr, SORT_NUMERIC); // Bigger numbers first, which means newer uploads first.
require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/flatten_array_v1.php';
$var_3f15102e_files_sorted_arr = fun_7a3c9f2b_flatten_array_v1($var_3f15102e_files_sorted_arr);
$var_3f15102e_files_sorted_arr = array_filter($var_3f15102e_files_sorted_arr);
### Get information for each file, and generate page.
$var_3f15102e_n4_num = 0;
foreach ($var_3f15102e_files_sorted_arr as &$var_3f15102e_item_str){
	$var_3f15102e_n4_num++;
	// Set type of page.
	$var_3f15102e_item_type_str = 'Upload Page';
	// Get information from meta files
	$var_3f15102e_item_meta_str = "{$var_3f15102e_item_str}.meta";
	require_once $var_3f15102e_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_3f15102e_item_name_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'Name: ', FALSE, FALSE, FALSE));
	require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/sanitize_string_v1.php';
	$var_3f15102e_item_web_name_str = sanitize_string_v1($var_3f15102e_item_name_str) . '.html';
	$var_3f15102e_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/upload-pages/{$var_3f15102e_item_web_name_str}";
	$var_3f15102e_item_date_uploaded_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'Date Uploaded: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_sha3256_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'SHA3-256: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_sha256_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'SHA-256: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_md5_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'MD5: ', FALSE, FALSE, FALSE));
	// Determine status
	$var_3f15102e_item_status_str = 'Exists';
	// Check if exceeds max uploads
	if (is_numeric("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']}") === TRUE){
		if ($var_3f15102e_n4_num >= intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit'])){
			$var_3f15102e_item_status_str = 'Removed';
		}
	}
	// Check if entry exceeds max age
	if (is_numeric($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']) === TRUE){
		require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_3f15102e_current_timestamp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_3f15102e_current_timestamp_num = intval($var_3f15102e_current_timestamp_arr['timestamp']);
   	require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/subtract_days_from_timestamp_i1_v1.php';
		$var_3f15102e_age_limit_timestamp = fun_a3c91f2d_subtract_days_from_timestamp_i1_v1($var_3f15102e_current_timestamp_num, intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']));	
		$var_3f15102e_item_timestamp_obj = strtotime($var_3f15102e_item_date_uploaded_str);
		if (intval($var_3f15102e_item_timestamp_obj) < intval($var_3f15102e_age_limit_timestamp)){
			$var_3f15102e_item_status_str = 'Removed';
		}	
	}
	// Check if the file actually exists in uploads
	if (file_exists($var_3f15102e_item_str) === FALSE){
		$var_3f15102e_item_status_str = 'Removed';
	}
	// Create content
	$var_3f15102e_item_extension_str = pathinfo($var_3f15102e_item_str, PATHINFO_EXTENSION);
	if ($var_3f15102e_item_extension_str === 'jpg' || $var_3f15102e_item_extension_str === 'jpeg' || $var_3f15102e_item_extension_str === 'png' || $var_3f15102e_item_extension_str === 'webp'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<img class='item_previews_image' src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' alt='Preview'>";	
	} else if ($var_3f15102e_item_extension_str === 'mp4'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<video class='item_previews_video' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='video/mp4'></video>";
	} else if ($var_3f15102e_item_extension_str === 'webm'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<video class='item_previews_video' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='video/ogg'></video>";
	} else if ($var_3f15102e_item_extension_str === 'flac'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/flac'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'm4a'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/mp4'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'mp3'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/mpeg'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'wav'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/wav'></adudio>";
	} else if ($var_3f15102e_item_extension_str === 'opus'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/ogg; codecs=opus'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'txt'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str);
		require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/text_file_to_html_paragraphs_v1.php';
		$var_3f15102e_item_html_content_str = text_file_to_html_paragraphs_v1($var_3f15102e_item_str);
		$var_3f15102e_preview_el_str = "<div class='item_previews_text'>{$var_3f15102e_item_html_content_str}</div>";
	}
	if ($var_3f15102e_item_status_str !== 'Removed'){
	$var_3f15102e_item_content_str = <<<HEREDOC
{$var_3f15102e_preview_el_str}
<div class='item_download_link_holder'>
	<span class='item_label'>Download Link:</span><span class='item_value'><a class='item_download_link' href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}">{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}</a>
</span>
</div>
<div class='item_checksum_holder'>
	<span class='item_label'>SHA3-256:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha3256_str}</span>
</div>
<div class='item_checksum_holder'>
	<span class='item_label'>SHA-256:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha256_str}</span>
</div>
<div class='item_checksum_holder'>
	<span class='item_label'>MD5:</span><span class='item_value'>{$var_3f15102e_item_checksum_md5_str}</span>
</div>
HEREDOC;
} else {
	$var_3f15102e_item_content_str = <<<HEREDOC
<div class='item_status_message'>This file is no longer available. The page remains as a record, and checksum resource. If the file becomes available again, it will be accessable here.</div>
<div class='item_checksum_holder'>
	<span class='item_label'>SHA3-256:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha3256_str}</span>
</div>
<div class='item_checksum_holder'>
	<span class='item_label'>SHA-256:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha256_str}</span>
</div>
<div class='item_checksum_holder'>
	<span class='item_label'>MD5:</span><span class='item_value'>{$var_3f15102e_item_checksum_md5_str}</span>
</div>
HEREDOC;
}
	// Define date element
	if ($var_3f15102e_item_type_str === 'Upload Page'){
		$var_3f15102e_item_dates_str = <<<HEREDOC
<div class='item_date_uploaded'>
	<span class='item_label'>Date Uploaded:</span><span class='item_value'>{$var_3f15102e_item_date_uploaded_str}</span>
</div>
HEREDOC;
	} else {
		$var_3f15102e_item_dates_str = '';
	}
	// Define content for eval
$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>{$var_3f15102e_item_name_str}</h1>
		<div class='dates_holder'>{$var_3f15102e_item_dates_str}</div>
		<div class='item_content'>{$var_3f15102e_item_content_str}</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	if (file_exists("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	if (file_exists("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	$var_c836c568_item_js_str = '';
	if (file_exists("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	if (file_exists("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'></script>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_3f15102e_item_type_str} - {$var_3f15102e_item_name_str}";
	// Do eval
	eval(substr(file_get_contents("{$var_3f15102e_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	file_put_contents($var_3f15102e_item_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_3f15102e_item_str);
## Cleanup
//goto goto_3f15102e_cleaup;
goto_3f15102e_cleaup:
// Do nothing
## Exit
//goto goto_3f15102e_end;
goto_3f15102e_end:
?>