<?php
# Meta
// Name: Create Content Input Webpages
// Description: Create webpages for inputs in "/Source/Content Inputs/*. Pages", excluding ".conf2" files.
// Status: Stable
// UUID: 26d3c836, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_26d3c836_n_num = 1;
$var_26d3c836_location_str = realpath(dirname(__FILE__, $var_26d3c836_n_num));
while (is_file("{$var_26d3c836_location_str}/application.php") !== TRUE) {
	$var_26d3c836_n_num++;
	$var_26d3c836_location_str = realpath(dirname(__FILE__, $var_26d3c836_n_num));
	if ($var_26d3c836_n_num > 50){
		exit(1);
	}
}
$var_26d3c836_location_str = realpath(dirname($var_26d3c836_location_str, 1));
eval(substr(file_get_contents("{$var_26d3c836_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Create a list of input files, and for each, import the data, and generate the file.
require_once $var_26d3c836_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_26d3c836_link_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Link Pages", NULL, '.conf', TRUE);
$var_26d3c836_navigation_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Navigation Pages", NULL, '.conf', TRUE);
require_once $var_26d3c836_location_str . '/Source/Custom Dependencies/merge_arrays_reindex_i1_v2.php';
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_link_pages_arr, $var_26d3c836_navigation_pages_arr);
$var_26d3c836_other_resources_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Other Resource Pages", NULL, '.conf', TRUE);
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_pages_arr, $var_26d3c836_other_resources_pages_arr);
$var_26d3c836_post_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Post Pages", NULL, '.conf', TRUE);
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_pages_arr, $var_26d3c836_post_pages_arr);
$var_26d3c836_regular_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Regular Pages", NULL, '.conf', TRUE);
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_pages_arr, $var_26d3c836_regular_pages_arr);
$var_26d3c836_status_update_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Status Update Pages", NULL, '.conf', TRUE);
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_pages_arr, $var_26d3c836_status_update_pages_arr);
$var_26d3c836_widget_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_26d3c836_location_str}/Source/Content Inputs/Widget Pages", NULL, '.conf', TRUE);
$var_26d3c836_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_26d3c836_pages_arr, $var_26d3c836_widget_pages_arr);
foreach ($var_26d3c836_pages_arr as &$var_26d3c836_item_str){
	// Detect type of page, because posts use different blockquote for content
	if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Link Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Link Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Navigation Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Navigation Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Other Resource Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Other Resource Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Post Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Post Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Regular Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Regular Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Status Update Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Status Update Page';
	} else if (strpos($var_26d3c836_item_str, "{$var_26d3c836_location_str}/Source/Content Inputs/Widget Pages") !== FALSE){
		$var_26d3c836_item_type_str = 'Widget Page';
	} else {
		$var_26d3c836_item_type_str = 'Unknown Type Page';
	}
	require_once $var_26d3c836_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	if ($var_26d3c836_item_type_str === 'Post Page'){
		$var_26d3c836_item_content_str = ritchey_get_lines_by_prefix_i1_v1($var_26d3c836_item_str, 'Content:', '"c799101b', NULL, TRUE);
	} else {
		$var_26d3c836_item_content_str = ritchey_get_lines_by_prefix_i1_v1($var_26d3c836_item_str, 'Content:', '"', NULL, TRUE);
	}
	require_once $var_26d3c836_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_26d3c836_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Destination: ', FALSE, FALSE, TRUE);
	$var_26d3c836_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/{$var_26d3c836_item_destination_str}";
	$var_26d3c836_item_name_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Name: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_date_added_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Date Added: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_date_created_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Date Created: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_date_last_updated_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Date Last Updated: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_date_uploaded_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Date Uploaded: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_date_published_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Date Published: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_icon_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/" . trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Icon: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_thumbnail_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/" . trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Thumbnail: ', FALSE, FALSE, FALSE));
	$var_26d3c836_item_overview_str = trim(ritchey_get_line_by_prefix_i1_v3($var_26d3c836_item_str, 'Overview: ', FALSE, FALSE, FALSE));
	// Alter content of other resources
	if ($var_26d3c836_item_type_str === 'Other Resource Page'){
		$var_26d3c836_item_content_str = trim($var_26d3c836_item_content_str);
		$var_26d3c836_item_content_str = <<<HEREDOC
<div id='redirect_message_holder'>You will be automatically redirected to <a href="{$var_26d3c836_item_content_str}">{$var_26d3c836_item_content_str}</a> in <span id='seconds'>?</span> seconds. Alternatively <a href="{$var_26d3c836_item_content_str}">click here</a> to go there now. If you want to stay on this page click <button id="cancel_button">Cancel</button> to cancel automatic redirection. You will still be able to manually redirect later.</div>
<script>
	var seconds_var = 9;
	var message_el = document.getElementById("redirect_message_holder");
	var seconds_el = document.getElementById("seconds");
	var cancel_button_el = document.getElementById("cancel_button");
	seconds_el.innerHTML = seconds_var;

	var redirect_timer = setTimeout(function () {
		window.location.href = "{$var_26d3c836_item_content_str}";
	}, seconds_var * 1000);

	var countdown_timer = setInterval(function () {
		seconds_var--;
		seconds_el.innerHTML = seconds_var;
		if (seconds_var <= 0) clearInterval(countdown_timer);
	}, 1000);

	function cancel_redirect() {
		clearTimeout(redirect_timer);
		clearInterval(countdown_timer);
		message_el.innerHTML = "Automatic redirection has been successfully cancelled. To manually redirect to <a href='{$var_26d3c836_item_content_str}'>{$var_26d3c836_item_content_str}</a> just <a href='{$var_26d3c836_item_content_str}'>click here</a>.";
	}
	cancel_button_el.addEventListener("click", cancel_redirect);
</script>
HEREDOC;
	}
	// Alter content of links
	if ($var_26d3c836_item_type_str === 'Link Page'){
		$var_26d3c836_item_content_str = trim($var_26d3c836_item_content_str);
		$var_26d3c836_item_content_str = <<<HEREDOC
<div class='link_holder'>
	<img class='link_icon' src="{$var_26d3c836_item_icon_str}">
	<div class='link_content'><a href="{$var_26d3c836_item_content_str}">{$var_26d3c836_item_content_str}</a></div>
</div>
HEREDOC;
	}
	// Alter content of posts to have markup converted to HTML
	if ($var_26d3c836_item_type_str === 'Post Page'){
		require_once $var_26d3c836_location_str . '/Source/Custom Dependencies/ritchey_rmlv4_markup_to_html_v2.php';
		$var_26d3c836_item_content_str = ritchey_rmlv4_markup_to_html_v2($var_26d3c836_item_content_str, TRUE, TRUE);
	}
	// Define date element by page type
	if ($var_26d3c836_item_type_str === 'Link Page'){
		$var_26d3c836_item_dates_str = <<<HEREDOC
<div class='item_date_added'>
	<span class='item_label'>Date Added:</span><span class='item_value'>{$var_26d3c836_item_date_added_str}</span>
</div>
HEREDOC;
	} else if ($var_26d3c836_item_type_str === 'Navigation Page'){
		$var_26d3c836_item_dates_str = '';
	} else if ($var_26d3c836_item_type_str === 'Other Resource Page'){
		$var_26d3c836_item_dates_str = <<<HEREDOC
<div class='item_date_created'>
	<span class='item_label'>Date Created:</span><span class='item_value'>{$var_26d3c836_item_date_created_str}</span>
</div>
HEREDOC;
	} else if ($var_26d3c836_item_type_str === 'Post Page'){
		$var_26d3c836_item_dates_str = <<<HEREDOC
<div class='item_date_created'>
	<span class='item_label'>Date Created:</span><span class='item_value'>{$var_26d3c836_item_date_created_str}</span>
</div>
<div class='item_date_published'>
	<span class='item_label'>Date Published:</span><span class='item_value'>{$var_26d3c836_item_date_published_str}</span>
</div>
<div class='item_date_last_updated'>
	<span class='item_label'>Date Last Updated:</span><span class='item_value'>{$var_26d3c836_item_date_last_updated_str}</span>
</div>
HEREDOC;
	} else if ($var_26d3c836_item_type_str === 'Regular Page'){
		$var_26d3c836_item_dates_str = '';
	} else if ($var_26d3c836_item_type_str === 'Status Update Page'){
		$var_26d3c836_item_dates_str = <<<HEREDOC
<div class='item_date_created'>
	<span class='item_label'>Date Created:</span><span class='item_value'>{$var_26d3c836_item_date_created_str}</span>
</div>
<div class='item_date_published'>
	<span class='item_label'>Date Published:</span><span class='item_value'>{$var_26d3c836_item_date_published_str}</span>
</div>
HEREDOC;
	} else if ($var_26d3c836_item_type_str === 'Widget Page'){
		$var_26d3c836_item_dates_str = '';
	} else {
		$var_26d3c836_item_dates_str = '';
	}
	// Define content for eval
$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>{$var_26d3c836_item_name_str}</h1>
		<div class='dates_holder'>{$var_26d3c836_item_dates_str}</div>
		<div class='item_content'>{$var_26d3c836_item_content_str}</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	$var_c836c568_item_js_str = '';
	if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	if (file_exists("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_26d3c836_location_str}/Source/Content Inputs/Assets/{$var_26d3c836_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_26d3c836_item_type_str} - {$var_26d3c836_item_name_str}";
	if ($var_26d3c836_item_name_str === 'Statistics' || $var_26d3c836_item_name_str === 'Navigation' || $var_26d3c836_item_name_str === 'Landing' || $var_26d3c836_item_name_str === '404' || $var_26d3c836_item_name_str === 'Legal' || $var_26d3c836_item_name_str === 'Search'){
		$var_c836c568_page_bio_switch_boo = TRUE;
	}
	// Do eval
	eval(substr(file_get_contents("{$var_26d3c836_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	file_put_contents($var_26d3c836_item_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_26d3c836_item_str);
## Cleanup
//goto goto_26d3c836_cleaup;
goto_26d3c836_cleaup:
// Do nothing
## Exit
//goto goto_26d3c836_end;
goto_26d3c836_end:
?>