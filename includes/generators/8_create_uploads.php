<?php
# Meta
// Name: Create Uploads
// Description: Generate pages for uploads in the public upload directory.
# Content
## Prep
$n = 1;
$location = realpath(dirname(__FILE__, $n));
while (is_file("{$location}/app.php") !== TRUE) {
	$n++;
	$location = realpath(dirname(__FILE__, $n));
	if ($n > 50){
		exit(1);
	}
}
eval(@substr(@file_get_contents("{$location}/evals/configuration_info_importers/import_global_configuration_info.php"), 5, -2));
## Task
### Empty uploads directory
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}{$global_configuration_info['public_folder']}/uploads", NULL, NULL, TRUE);
foreach ($files_arr as &$item_str){
	@unlink($item_str);
}
unset($item_str);
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
function text_file_to_html_paragraphs_v1($file_path_str) {

    $text_str = file_get_contents($file_path_str);
    if ($text_str === false) {
        return false;
    }

    // Escape HTML characters safely
    $text_str = htmlspecialchars($text_str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // Normalize line endings
    $text_str = str_replace(["\r\n", "\r"], "\n", $text_str);

    // Split into paragraphs (two or more line breaks)
    $paragraphs_arr = preg_split("/\n{2,}/", $text_str);

    $output_str = '';

    foreach ($paragraphs_arr as $paragraph_str) {
        $paragraph_str = trim($paragraph_str);
        if ($paragraph_str !== '') {
            $paragraph_str = str_replace("\n", "<br>\n", $paragraph_str);
            $output_str .= "<p>" . $paragraph_str . "</p>\n";
        }
    }

    return $output_str;
}
### Create a list of uploads, and for each, import the data, and generate the file.
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/uploads", NULL, '.meta', TRUE);
foreach ($files as &$item){
	//require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	//$item_filename = ritchey_get_line_by_prefix_i1_v3($item, 'Filename: ', FALSE, FALSE, TRUE);
	$item_filename = basename(substr($item, 0, -5));
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_name = ritchey_get_line_by_prefix_i1_v3($item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_date_uploaded = ritchey_get_line_by_prefix_i1_v3($item, 'Date Uploaded: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_sha3256 = ritchey_get_line_by_prefix_i1_v3($item, 'SHA3-256: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_sha256 = ritchey_get_line_by_prefix_i1_v3($item, 'SHA-256: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_md5 = ritchey_get_line_by_prefix_i1_v3($item, 'MD5: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$item_content_type = ritchey_get_line_by_prefix_i1_v3($item, 'Content Type: ', FALSE, FALSE, TRUE);
	$item_file_type = strtolower(pathinfo($item_filename, PATHINFO_EXTENSION));
	$item_web_name = sanitize_string_v1($item_name) . '.html';
	if (file_exists("{$location}{$global_configuration_info['downloads_folder']}/{$item_filename}") === TRUE){
		$download_link_el = "<div class='uploads_labels'>Direct Link:</div><a class='download_links' href='{$global_configuration_info['downloads_address']}/{$item_filename}'>{$global_configuration_info['downloads_address']}/{$item_filename}</a>";
		$view_el = '';
		if ($item_file_type === 'jpg' || $item_file_type === 'png' || $item_file_type === 'webp'){
			$view_el = "<img class='uploads_display_image' src='{$global_configuration_info['downloads_address']}/{$item_filename}' alt='Display'>";
		} else if ($item_file_type === 'mp4'){
			$view_el = "<video class='uploads_display_video' controls><source src='{$global_configuration_info['downloads_address']}/{$item_filename}' type='video/mp4'></video>";
		} else if ($item_file_type === 'webm'){
			$view_el = "<video class='uploads_display_video' controls><source src='{$global_configuration_info['downloads_address']}/{$item_filename}' type='video/webm'></video>";
		} else if ($item_file_type === 'txt'){
			$item_web_text = text_file_to_html_paragraphs_v1("{$location}{$global_configuration_info['downloads_folder']}/{$item_filename}");
			$view_el = "<div class='uploads_labels'>Preview:</div><div class='uploads_display_text'>{$item_web_text}</div>";
		}
		$value = $view_el . $download_link_el;
	} else {
		$value = "<div class='uploads_display_removed'>This file has been removed from the site. This page remains accessible as a record, and source of checksums. If the file is re-added to the site, this page will be updated.</div>";
	}
	$content_1 = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<script>
		var date_published = "{$item_date_uploaded}";
		console.log(date_published);
		</script>
		<h1>{$item_name}</h1>
		<div>Date Uploaded: <span id='date_uploaded'></span></div>
		<script>
		document.getElementById("date_uploaded").textContent = date_published;
		</script>
		{$value}
		<div><span class='uploads_labels'>Fileytype:</span><span id='content_type'>{$item_content_type}</span> <div class='comment_1'>(<span id='file_type'>.{$item_file_type}</span>)</div></div>
		<div><span class='uploads_labels'>SHA3-256:</span><span id='sha3256'>{$item_sha3256}</span></div>
		<div><span class='uploads_labels'>SHA-256:</span><span id='sha256'>{$item_sha256}</span></div>
		<div><span class='uploads_labels'>MD5:</span><span id='md5'>{$item_md5}</span></div>
	</div>
</div>
HEREDOC;
	$destination = "{$location}{$global_configuration_info['public_folder']}/uploads/{$item_web_name}";
	$page_title = $global_configuration_info['site_name'] . ' - Upload - ' . $item_name;
	$style_sheet = @strtolower($item_name); // Make string lowercase only
	$style_sheet = @preg_replace('/\s+/', '_', $style_sheet); // Replace white space with a single underscore
	$style_sheet = @preg_replace('/[^a-z0-9_]/', '', $style_sheet); // Delete all characters except [a-z][0-9]_
	$css_file_path = $location . "/content_files/assets/localized/{$style_sheet}.css.txt";
	if (@is_file($css_file_path) === TRUE){
		$localized_css = <<<HEREDOC
<link rel="stylesheet" href="{$localized_configuration_info['address']}/assets/localized/{$style_sheet}.css">
HEREDOC;
	} else {
		$localized_css = '<!-- There is no localized CSS sheet for this page. -->';
	}
	eval(@substr(@file_get_contents("{$location}/evals/html_layouts/html_layout_1.php"), 5, -2));
	@file_put_contents($destination, $html_layout);
}
unset($item);
//var_dump($files);
## Cleanup
// Do nothing
?>