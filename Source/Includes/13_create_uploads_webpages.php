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
### Create a list of uploads
$var_3f15102e_uploads_arr = array();
$var_3f15102e_shared_data_uploadstxt_file_path_str = $var_3f15102e_location_str . '/Source/Shared Data/Uploads.txt';
$var_3f15102e_file_handle_obj = fopen($var_3f15102e_shared_data_uploadstxt_file_path_str, "r");
if ($var_3f15102e_file_handle_obj !== FALSE){
	$var_3f15102e_continue_loop_boo = TRUE;
	while ($var_3f15102e_continue_loop_boo === TRUE){
		$var_3f15102e_current_line_str = fgets($var_3f15102e_file_handle_obj);
		if ($var_3f15102e_current_line_str === FALSE){
			$var_3f15102e_continue_loop_boo = FALSE;
			} else {
				// Add to array
            $var_3f15102e_uploads_arr[] = json_decode($var_3f15102e_current_line_str);
				// Check for special reading abort code "Code 1779035591" (not presently used by this project, but useful to have in the code)
            if (trim($var_3f15102e_current_line_str) === "Code 1779035591"){
                //echo "Found \"Code 1779035591\". Ceasing to read further in file." . PHP_EOL;
                $var_3f15102e_continue_loop_boo = FALSE;
            }
        }
    }
    fclose($var_3f15102e_file_handle_obj);
} else {
    //echo "Failed to open file." . PHP_EOL;
}
### Get information for each file, and generate page.
// Format each array entry as a sub-array where line label becomes the key, and remove the label from the value
foreach ($var_3f15102e_uploads_arr as &$var_3f15102e_item_str){
	require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/string_to_array_by_lines_i1776011657_v0.2.php';
	$var_3f15102e_item_str = fun_ce50722f_string_to_array_by_lines_i1776011657_v0_2($var_3f15102e_item_str, TRUE);
}
unset($var_3f15102e_item_str);
// Create pages
$var_3f15102e_n4_num = 0;
foreach ($var_3f15102e_uploads_arr as &$var_3f15102e_item_str){
	$var_3f15102e_n4_num++;
	// Set type of page.
	$var_3f15102e_item_type_str = 'Upload Page';
	// Get file information from meta files
	$var_3f15102e_item_meta_str = $var_3f15102e_item_str['path'] . ".meta";
	require_once $var_3f15102e_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_3f15102e_item_name_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'Name: ', FALSE, FALSE, FALSE));
	require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/sanitize_string_v1.php';
	$var_3f15102e_item_web_name_str = sanitize_string_v1($var_3f15102e_item_name_str) . '.html';
	$var_3f15102e_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/upload-pages/{$var_3f15102e_item_web_name_str}";
	$var_3f15102e_item_date_uploaded_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'Date Uploaded: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_sha3256_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'SHA3-256: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_sha512_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'SHA-512: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_sha256_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'SHA-256: ', FALSE, FALSE, FALSE));
	$var_3f15102e_item_checksum_md5_str = trim(ritchey_get_line_by_prefix_i1_v3($var_3f15102e_item_meta_str, 'MD5: ', FALSE, FALSE, FALSE));
	// Determine status
	// Check if the file actually exists in downloads
	$var_3f15102e_downloads_item_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}/" . trim($var_3f15102e_item_str['filename']);
	if (file_exists($var_3f15102e_downloads_item_str) === TRUE){
		$var_3f15102e_item_status_str = 'Exists';
	} else {
		$var_3f15102e_item_status_str = 'Removed';
	}
	// Create content
	$var_3f15102e_item_extension_str = pathinfo($var_3f15102e_item_str['path'], PATHINFO_EXTENSION);
	if ($var_3f15102e_item_extension_str === 'jpg' || $var_3f15102e_item_extension_str === 'jpeg' || $var_3f15102e_item_extension_str === 'png' || $var_3f15102e_item_extension_str === 'webp'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<img class='item_previews_image' src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' alt='Preview'>";	
	} else if ($var_3f15102e_item_extension_str === 'mp4'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<video class='item_previews_video' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='video/mp4'></video>";
	} else if ($var_3f15102e_item_extension_str === 'webm'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<video class='item_previews_video' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='video/ogg'></video>";
	} else if ($var_3f15102e_item_extension_str === 'flac'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/flac'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'm4a'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/mp4'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'mp3'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/mpeg'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'wav'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/wav'></adudio>";
	} else if ($var_3f15102e_item_extension_str === 'opus'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<audio class='item_previews_audio' controls><source src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_url']}/{$var_3f15102e_item_filename_str}' type='audio/ogg; codecs=opus'></audio>";
	} else if ($var_3f15102e_item_extension_str === 'txt'){
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		require_once $var_3f15102e_location_str . '/Source/Custom Dependencies/text_file_to_html_paragraphs_v1.php';
		$var_3f15102e_item_html_content_str = text_file_to_html_paragraphs_v1($var_3f15102e_item_str['path']);
		$var_3f15102e_preview_el_str = "<div class='item_previews_text'>{$var_3f15102e_item_html_content_str}</div>";
	} else {
		$var_3f15102e_item_filename_str = basename($var_3f15102e_item_str['filename']);
		$var_3f15102e_preview_el_str = "<div class='item_previews_unsupported'></div>";
	}
	if ($var_3f15102e_item_status_str === 'Exists'){
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
	<span class='item_label'>SHA-512:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha512_str}</span>
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
	<span class='item_label'>SHA-512:</span><span class='item_value'>{$var_3f15102e_item_checksum_sha512_str}</span>
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
	if (is_int($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']) === TRUE){
		if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']} CSS.conf") === TRUE){
			$var_c836c568_item_css2_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_name_str} {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
			$var_c836c568_item_css2_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css2_str}'>";
			$var_c836c568_item_css_str = $var_c836c568_item_css_str . PHP_EOL . $var_c836c568_item_css2_str;
		}
	}
	$var_c836c568_item_type_css_str = '';
	if (file_exists("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	if (is_int($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']) === TRUE){
		if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']} CSS.conf") === TRUE){
			$var_c836c568_item_type_css2_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_3f15102e_location_str}/Source/Content Inputs/Assets/{$var_3f15102e_item_type_str}s {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_id']} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
			$var_c836c568_item_type_css2_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css2_str}'>";
			$var_c836c568_item_type_css_str = $var_c836c568_item_type_css_str . PHP_EOL . $var_c836c568_item_type_css2_str;
		}
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