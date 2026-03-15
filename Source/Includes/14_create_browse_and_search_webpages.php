<?php
# Meta
// Name: Create Browse And Search Webpages
// Description: Create webpages for browsing/searching
// Status: Stable
// UUID: 99e6c981, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_99e6c981_n_num = 1;
$var_99e6c981_location_str = realpath(dirname(__FILE__, $var_99e6c981_n_num));
while (is_file("{$var_99e6c981_location_str}/application.php") !== TRUE) {
	$var_99e6c981_n_num++;
	$var_99e6c981_location_str = realpath(dirname(__FILE__, $var_99e6c981_n_num));
	if ($var_99e6c981_n_num > 50){
		exit(1);
	}
}
$var_99e6c981_location_str = realpath(dirname($var_99e6c981_location_str, 1));
eval(substr(file_get_contents("{$var_99e6c981_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
$var_99e6c981_entries_arr = array();
### Create a list of input files for webpages, and collect their information
require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_99e6c981_link_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Link Pages", NULL, '.conf', TRUE);
$var_99e6c981_navigation_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Navigation Pages", NULL, '.conf', TRUE);
require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/merge_arrays_reindex_i1_v2.php';
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_link_pages_arr, $var_99e6c981_navigation_pages_arr);
$var_99e6c981_other_resources_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Other Resource Pages", NULL, '.conf', TRUE);
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_pages_arr, $var_99e6c981_other_resources_pages_arr);
$var_99e6c981_post_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Post Pages", NULL, '.conf', TRUE);
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_pages_arr, $var_99e6c981_post_pages_arr);
$var_99e6c981_regular_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Regular Pages", NULL, '.conf', TRUE);
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_pages_arr, $var_99e6c981_regular_pages_arr);
$var_99e6c981_status_update_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Status Update Pages", NULL, '.conf', TRUE);
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_pages_arr, $var_99e6c981_status_update_pages_arr);
$var_99e6c981_widget_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Content Inputs/Widget Pages", NULL, '.conf', TRUE);
$var_99e6c981_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_99e6c981_pages_arr, $var_99e6c981_widget_pages_arr);
$var_99e6c981_n_num;
foreach ($var_99e6c981_pages_arr as &$var_99e6c981_item_str){
	$var_99e6c981_n_num++;
	$var_99e6c981_entries_arr[$var_99e6c981_n_num] = array();
	require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	// Entry destination
	$var_99e6c981_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Destination: ', FALSE, FALSE, TRUE);
	$var_99e6c981_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_99e6c981_item_destination_str}";
	if (isset($var_99e6c981_item_destination_str) === TRUE && $var_99e6c981_item_destination_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['destination'] = $var_99e6c981_item_destination_str;
	}
	// Entry name
	$var_99e6c981_item_name_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Name: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_name_str) === TRUE && $var_99e6c981_item_name_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['name'] = $var_99e6c981_item_name_str;
	}
	// Entry Date
	$var_99e6c981_item_date_created_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Date Created: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_created_str) === TRUE && $var_99e6c981_item_date_created_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_created_str;
	}
	$var_99e6c981_item_date_added_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Date Added: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_added_str) === TRUE && $var_99e6c981_item_date_added_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_added_str;
	}
	$var_99e6c981_item_date_uploaded_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Date Uploaded: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_uploaded_str) === TRUE && $var_99e6c981_item_date_uploaded_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_uploaded_str;
	}
	$var_99e6c981_item_date_published_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Date Published: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_published_str) === TRUE && $var_99e6c981_item_date_published_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_published_str;
	}
	$var_99e6c981_item_date_last_updated_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Date Last Updated: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_last_updated_str) === TRUE && $var_99e6c981_item_date_last_updated_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_last_updated_str;
	}
	// Entry Overview
	$var_99e6c981_item_overview_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Overview: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_overview_str) === TRUE && $var_99e6c981_item_overview_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['overview'] = $var_99e6c981_item_overview_str;
	}
	// Entry Type: Post, Page, Status Update, Link, Other Resource, Upload
	if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Link Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Link';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Navigation Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Page';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Other Resource Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Other Resource';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Post Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Post';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Regular Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Page';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Status Update Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Status Update';
	} else if (strpos($var_99e6c981_item_str, "{$var_99e6c981_location_str}/Source/Content Inputs/Widget Pages") !== FALSE){
		$var_99e6c981_item_type_str = 'Page';
	} else {
		$var_99e6c981_item_type_str = '';
	}
	if (isset($var_99e6c981_item_type_str) === TRUE && $var_99e6c981_item_type_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['type'] = $var_99e6c981_item_type_str;
	}
	// Entry Images (Icon/Thumbnail)
	$var_99e6c981_item_icon_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Icon: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_icon_str) === TRUE && $var_99e6c981_item_icon_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}" . $var_99e6c981_item_icon_str;
	} else {
			if ($var_99e6c981_item_type_str === 'Status Update' && $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['status_update_icon_web_path'] !== ''){
				$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['status_update_icon_web_path'];
			} else if ($var_99e6c981_item_type_str === 'Page' && $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['page_icon_web_path'] !== ''){
				$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['page_icon_web_path'];
			} else if ($var_99e6c981_item_type_str === 'Post' && $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['post_icon_web_path'] !== ''){
				$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['post_icon_web_path'];
			} else if ($var_99e6c981_item_type_str === 'Link' && $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['link_icon_web_path'] !== ''){
				$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['link_icon_web_path'];
			} else if ($var_99e6c981_item_type_str === 'Other Resource' && $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resource_icon_web_path'] !== ''){
				$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resource_icon_web_path'];
			}
	}
	$var_99e6c981_item_thumbnail_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_str, 'Thumbnail: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_thumbnail_str) === TRUE && $var_99e6c981_item_thumbnail_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['thumbnail'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}" . $var_99e6c981_item_thumbnail_str;
	}
	// Entry Status (They will all exist)
	$var_99e6c981_item_status_str = 'Exists';
	$var_99e6c981_entries_arr[$var_99e6c981_n_num]['status'] = $var_99e6c981_item_status_str;
}
unset($var_99e6c981_item_str);
### Add to the list webpages which don't come from content inputs, and generate their information
// Statistics Page
$var_99e6c981_item_type_arr = array();
$var_99e6c981_item_type_arr['destination'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/widget-pages/statistics.html";
$var_99e6c981_item_type_arr['name'] = 'Statistics';
$var_99e6c981_item_type_arr['type'] = 'Page';
$var_99e6c981_entries_arr[] = $var_99e6c981_item_type_arr;
// Version Page
$var_99e6c981_item_type_arr = array();
$var_99e6c981_item_type_arr['destination'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/widget-pages/version.html";
$var_99e6c981_item_type_arr['name'] = 'Version';
$var_99e6c981_item_type_arr['type'] = 'Page';
$var_99e6c981_entries_arr[] = $var_99e6c981_item_type_arr;
// Browse Pages
	// This page is excluded from the database
// Search Pages
	// This page is excluded from the database
### Add to the list (eligible) uploads, and their information
require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_99e6c981_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_99e6c981_location_str}/Source/Uploads", NULL, NULL, TRUE);
foreach ($var_99e6c981_files_arr as &$var_99e6c981_item_str){
	if (substr($var_99e6c981_item_str, -5) === '.meta'){
		$var_99e6c981_item_str = '';
	} else if (substr($var_99e6c981_item_str, -14) === '.thumbnail.jpg'){
		$var_99e6c981_item_str = '';
	}
}
unset($var_99e6c981_item_str);
$var_99e6c981_files_arr = array_filter($var_99e6c981_files_arr);
// Sort List By Age
$var_99e6c981_files_sorted_arr = array();
foreach ($var_99e6c981_files_arr as &$var_99e6c981_item_str){
	require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_99e6c981_date_uploaded_str = ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_item_str}.meta", 'Date Uploaded: ', FALSE, FALSE, TRUE);
	$var_99e6c981_timestamp_uploaded_obj = strtotime($var_99e6c981_date_uploaded_str);
	// Keep in mind, some items will have same timestamp, so use nested array to add more items to same timestamp.
	if (isset($var_99e6c981_files_sorted_arr[$var_99e6c981_timestamp_uploaded_obj]) === TRUE){
		$var_99e6c981_files_sorted_arr["$var_99e6c981_timestamp_uploaded_obj"][] = $var_99e6c981_item_str;
	} else {
		$var_99e6c981_files_sorted_arr["$var_99e6c981_timestamp_uploaded_obj"] = array($var_99e6c981_item_str);
	}
}
unset($var_99e6c981_item_str);
krsort($var_99e6c981_files_sorted_arr, SORT_NUMERIC); // Bigger numbers first, which means newer uploads first.
require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/flatten_array_v1.php';
$var_99e6c981_files_sorted_arr = fun_7a3c9f2b_flatten_array_v1($var_99e6c981_files_sorted_arr);
$var_99e6c981_files_sorted_arr = array_filter($var_99e6c981_files_sorted_arr);
// Get information for each file
$var_99e6c981_n4_num = 0;
foreach ($var_99e6c981_files_sorted_arr as &$var_99e6c981_item_str){
	$var_99e6c981_n_num++;
	$var_99e6c981_n4_num++;
	$var_99e6c981_entries_arr[$var_99e6c981_n_num] = array();
	$var_99e6c981_item_meta_str = "{$var_99e6c981_item_str}.meta";
	require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	// Entry name
	$var_99e6c981_item_name_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_meta_str, 'Name: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_name_str) === TRUE && $var_99e6c981_item_name_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['name'] = $var_99e6c981_item_name_str;
	}
	// Entry destination
	require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/sanitize_string_v1.php';
	$var_99e6c981_item_web_name_str = sanitize_string_v1($var_99e6c981_item_name_str) . '.html';
	$var_99e6c981_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_meta_str, 'Destination: ', FALSE, FALSE, FALSE);
	$var_99e6c981_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/upload-pages/{$var_99e6c981_item_web_name_str}";
	if (isset($var_99e6c981_item_destination_str) === TRUE && $var_99e6c981_item_destination_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['destination'] = $var_99e6c981_item_destination_str;
	}
	// Entry Date
	$var_99e6c981_item_date_uploaded_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_meta_str, 'Date Uploaded: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_date_uploaded_str) === TRUE && $var_99e6c981_item_date_uploaded_str !== ''){
		$var_99e6c981_item_date_uploaded_str = strtotime($var_99e6c981_item_date_uploaded_str); // Date conversion is needed since meta files stored date in different format compared to .conf/.conf2 files
		$var_99e6c981_item_date_uploaded_str = date("F j, Y", $var_99e6c981_item_date_uploaded_str);
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['date'] = $var_99e6c981_item_date_uploaded_str;
	}
	// Entry Images (Thumbnail / Icon)
	$var_99e6c981_item_icon_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_meta_str, 'Icon: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_icon_str) === TRUE && $var_99e6c981_item_icon_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['icon'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}" . $var_99e6c981_item_icon_str;
	}
	$var_99e6c981_item_thumbnail_str = trim(ritchey_get_line_by_prefix_i1_v3($var_99e6c981_item_meta_str, 'Thumbnail: ', FALSE, FALSE, FALSE));
	if (isset($var_99e6c981_item_thumbnail_str) === TRUE && $var_99e6c981_item_thumbnail_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['thumbnail'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}" . $var_99e6c981_item_thumbnail_str;
	}
	// Entry Type
	$var_99e6c981_item_type_str = 'Upload';
	if (isset($var_99e6c981_item_type_str) === TRUE && $var_99e6c981_item_type_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['type'] = $var_99e6c981_item_type_str;
	}
	// Entry Status (the file exists, and qualifies for inclusion)
	$var_99e6c981_item_status_str = 'Exists';
	// Check if exceeds max uploads
	if (is_numeric("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']}") === TRUE){
		if ($var_99e6c981_n4_num >= intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit'])){
			$var_99e6c981_item_status_str = 'Removed';
		}
	}
	// Check if entry exceeds max age
	if (is_numeric($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']) === TRUE){
		require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_99e6c981_current_timestamp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_99e6c981_current_timestamp_num = intval($var_99e6c981_current_timestamp_arr['timestamp']);
   	require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/subtract_days_from_timestamp_i1_v1.php';
		$var_99e6c981_age_limit_timestamp = fun_a3c91f2d_subtract_days_from_timestamp_i1_v1($var_99e6c981_current_timestamp_num, intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']));	
		$var_99e6c981_item_timestamp_obj = strtotime($var_99e6c981_item_date_uploaded_str);
		if (intval($var_99e6c981_item_timestamp_obj) < intval($var_99e6c981_age_limit_timestamp)){
			$var_99e6c981_item_status_str = 'Removed';
		}	
	}
	// Check if the file actually exists in uploads
	if (file_exists($var_99e6c981_item_str) === FALSE){
		$var_99e6c981_item_status_str = 'Removed';
	}
	if (isset($var_99e6c981_item_status_str) === TRUE && $var_99e6c981_item_status_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['status'] = $var_99e6c981_item_status_str;
	}
}
unset($var_99e6c981_item_str);
### Re-organize entries to have keys in order: name, date, type, image, overview, destination
foreach ($var_99e6c981_entries_arr as &$var_99e6c981_entry_arr){
	$var_99e6c981_tmp_arr = array();
	if (isset($var_99e6c981_entry_arr['name']) === TRUE){
		$var_99e6c981_tmp_arr['name'] = $var_99e6c981_entry_arr['name'];
	}
	if (isset($var_99e6c981_entry_arr['date']) === TRUE){
		$var_99e6c981_tmp_arr['date'] = $var_99e6c981_entry_arr['date'];
	}
	if (isset($var_99e6c981_entry_arr['icon']) === TRUE){
		$var_99e6c981_tmp_arr['icon'] = $var_99e6c981_entry_arr['icon'];
	}
	if (isset($var_99e6c981_entry_arr['type']) === TRUE){
		$var_99e6c981_tmp_arr['type'] = $var_99e6c981_entry_arr['type'];
	}
	if (isset($var_99e6c981_entry_arr['status']) === TRUE){
		$var_99e6c981_tmp_arr['status'] = $var_99e6c981_entry_arr['status'];
	}
	
	$var_99e6c981_tmp_arr['kmt'] = ''; // Needed so that an empty area for displaying the kmt value is present.
	
	if (isset($var_99e6c981_entry_arr['thumbnail']) === TRUE){
		$var_99e6c981_tmp_arr['thumbnail'] = $var_99e6c981_entry_arr['thumbnail'];
	}
	if (isset($var_99e6c981_entry_arr['overview']) === TRUE){
		$var_99e6c981_tmp_arr['overview'] = $var_99e6c981_entry_arr['overview'];
	}
	if (isset($var_99e6c981_entry_arr['destination']) === TRUE){
		$var_99e6c981_tmp_arr['destination'] = $var_99e6c981_entry_arr['destination'];
	}
	$var_99e6c981_entry_arr = $var_99e6c981_tmp_arr;
}
unset($var_99e6c981_entry_arr);
### Sort list of entries by date
$var_99e6c981_entries_sorted_arr = array();
foreach ($var_99e6c981_entries_arr as &$var_99e6c981_entry_uns){
	if (isset($var_99e6c981_entry_uns['date']) === FALSE){
		require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_99e6c981_tmp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_99e6c981_entry_uns['date'] = $var_99e6c981_tmp_arr['human_readable_long'];
	}
	$var_99e6c981_timestamp_date_obj = strtotime($var_99e6c981_entry_uns['date']);
	$var_99e6c981_entry_uns = json_encode($var_99e6c981_entry_uns);
	// Keep in mind, some items will have same timestamp, so use nested array to add more items to same timestamp.
	if (isset($var_99e6c981_entries_sorted_arr[$var_99e6c981_timestamp_date_obj]) === TRUE){
		$var_99e6c981_entries_sorted_arr["$var_99e6c981_timestamp_date_obj"][] = $var_99e6c981_entry_uns;
	} else {
		$var_99e6c981_entries_sorted_arr["$var_99e6c981_timestamp_date_obj"] = array($var_99e6c981_entry_uns);
	}
}
unset($var_99e6c981_entry_uns);
krsort($var_99e6c981_entries_sorted_arr, SORT_NUMERIC); // Bigger numbers first, which means newer uploads first.
require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/flatten_array_v1.php';
$var_99e6c981_entries_sorted_arr = fun_7a3c9f2b_flatten_array_v1($var_99e6c981_entries_sorted_arr);
foreach ($var_99e6c981_entries_arr as &$var_99e6c981_entry_uns){
	$var_99e6c981_entry_uns = json_decode($var_99e6c981_entry_uns, true);
}
unset($var_99e6c981_entry_uns);
### Generate HTML for entries
$var_99e6c981_n5_num = 0;
foreach ($var_99e6c981_entries_arr as &$var_99e6c981_entry_uns){
	$var_99e6c981_n5_num++;
	$var_99e6c981_tmp2_str = $var_99e6c981_entry_uns['type'];
	foreach ($var_99e6c981_entry_uns as $var_99e6c981_key_str => &$var_99e6c981_value_str) {
		if ($var_99e6c981_key_str === 'destination'){
			$var_99e6c981_value_str = "<div class='item_entry_{$var_99e6c981_key_str}'><a class='item_entry_{$var_99e6c981_key_str}_link' href='{$var_99e6c981_value_str}'>{$var_99e6c981_value_str}</a></div>";
		} else if ($var_99e6c981_key_str === 'thumbnail'){
			$var_99e6c981_value_str = "<div class='item_entry_{$var_99e6c981_key_str}'><img class='item_entry_{$var_99e6c981_key_str}_thumbnail' src='{$var_99e6c981_value_str}' alt='Entry Thumbnail'></div>";
		} else if ($var_99e6c981_key_str === 'icon'){
			$var_99e6c981_value_str = "<div class='item_entry_{$var_99e6c981_key_str}'><img class='item_entry_{$var_99e6c981_key_str}_icon' src='{$var_99e6c981_value_str}' alt='Entry Icon'></div>";
		} else if ($var_99e6c981_key_str === 'status' && $var_99e6c981_value_str === 'Exists'){
			$var_99e6c981_value_str = "<div id='item_entry_{$var_99e6c981_key_str}_{$var_99e6c981_n5_num}' class='item_entry_{$var_99e6c981_key_str} item_entry_{$var_99e6c981_key_str}_exists'>{$var_99e6c981_value_str}</div>";
		} else if ($var_99e6c981_key_str === 'status' && $var_99e6c981_value_str === 'Removed'){
			$var_99e6c981_value_str = "<div id='item_entry_{$var_99e6c981_key_str}_{$var_99e6c981_n5_num}'class='item_entry_{$var_99e6c981_key_str} item_entry_{$var_99e6c981_key_str}_removed'>{$var_99e6c981_value_str}</div>";
		} else if ($var_99e6c981_key_str === 'kmt'){
			$var_99e6c981_value_str = "<div id='item_entry_{$var_99e6c981_key_str}_{$var_99e6c981_n5_num}' class='item_entry_{$var_99e6c981_key_str}'><div class='item_entry_{$var_99e6c981_key_str}_loading_bar_fill'></div></div>";
		} else if ($var_99e6c981_key_str === 'type' && $var_99e6c981_value_str === 'Other Resource') {
			$var_99e6c981_value_str = "<div id='item_entry_{$var_99e6c981_key_str}_{$var_99e6c981_n5_num}' class='item_entry_{$var_99e6c981_key_str}'>{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resources_label']}</div>";
		} else {
			$var_99e6c981_value_str = "<div id='item_entry_{$var_99e6c981_key_str}_{$var_99e6c981_n5_num}' class='item_entry_{$var_99e6c981_key_str}'>{$var_99e6c981_value_str}</div>";
		}
	}
	unset($var_99e6c981_value_str);
	$var_99e6c981_entry_uns = implode(PHP_EOL, $var_99e6c981_entry_uns);
	$var_99e6c981_entry_uns = "<div class='item_entry_holder' id='item_entry_holder_{$var_99e6c981_n5_num}'>{$var_99e6c981_entry_uns}</div>";
}
unset($var_99e6c981_entry_uns);
### Break entries in chunks of Search Database Chunk Size for each type of browse/search
$var_99e6c981_browse_entries_reverse_chronological_arr = array(); // Newest first
$var_99e6c981_browse_entries_chronological_arr = array(); // Oldest first
$var_99e6c981_search_entries_reverse_chronological_arr = array(); // Newest first
$var_99e6c981_search_entries_chronological_arr = array(); // Oldest first
// Browse - Rev Chr
$var_99e6c981_n2_num = 0;
$var_99e6c981_entry_chunk_str = '';
foreach ($var_99e6c981_entries_arr as $var_99e6c981_entry_uns){
	$var_99e6c981_n2_num++;
	$var_99e6c981_entry_chunk_str = $var_99e6c981_entry_chunk_str . PHP_EOL . $var_99e6c981_entry_uns;
	if ($var_99e6c981_n2_num === intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['search_database_chunk_size'])){
		$var_99e6c981_browse_entries_reverse_chronological_arr[] = $var_99e6c981_entry_chunk_str;
		$var_99e6c981_n2_num = 0;
		$var_99e6c981_entry_chunk_str = '';
	}
}
unset($var_99e6c981_entry_uns);
$var_99e6c981_last_page_num = count($var_99e6c981_browse_entries_reverse_chronological_arr); // This is needed for Javascript to determine the last page.
// Search - Rev Chr
$var_99e6c981_search_entries_reverse_chronological_arr = $var_99e6c981_browse_entries_reverse_chronological_arr;
// Browse - Chr
$var_99e6c981_n2_num = 0;
$var_99e6c981_entry_chunk_str = '';
foreach (array_reverse($var_99e6c981_entries_arr) as $var_99e6c981_entry_uns){
	$var_99e6c981_n2_num++;
	$var_99e6c981_entry_chunk_str = $var_99e6c981_entry_chunk_str . PHP_EOL . $var_99e6c981_entry_uns;
	if ($var_99e6c981_n2_num === intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['search_database_chunk_size'])){
		$var_99e6c981_browse_entries_chronological_arr[] = $var_99e6c981_entry_chunk_str;
		$var_99e6c981_n2_num = 0;
		$var_99e6c981_entry_chunk_str = '';
	}
}
unset($var_99e6c981_entry_uns);
// Search - Chr
$var_99e6c981_search_entries_chronological_arr = $var_99e6c981_browse_entries_chronological_arr;
### For each chunk create HTML page. Repeat for each type of browse/search.
//// Define the search and browse controls and prev/next buttons and put them into each
$var_99e6c981_browse_controls_str = <<<HEREDOC
<div class='no_print' id='browse_controls_holder'>
<div class='browse_control_button'><a class='browse_control_button_link' id='browse_control_button_link_status_updates' href='#'>Status Updates</a></div>
<div class='browse_control_button'><a class='browse_control_button_link' id='browse_control_button_link_links' href='#'>Links</a></div>
<div class='browse_control_button'><a class='browse_control_button_link' id='browse_control_button_link_posts' href='#'>Posts</a></div>
<div class='browse_control_button'><a class='browse_control_button_link' id='browse_control_button_link_other_resources' href='#'>{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resources_label']}</a></div>
<div class='browse_control_button'><a class='browse_control_button_link' id='browse_control_button_link_uploads' href='#'>Uploads</a></div>
</div>
HEREDOC;	
$var_99e6c981_search_controls_str = <<<HEREDOC
<div class='no_print' id='search_controls_holder'>
<h2 class='headings_2'>Search Controls</h2>
<form>
	<div class='form_label_holder'>
		<span class='item_label'>Types:</span>
	</div>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_pages" name="type_checkboxs" value="pages"><label for="search_control_checkbox_pages">Pages</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_status_updates" name="type_checkboxs" value="status updates"><label for="search_control_checkbox_status_updates">Status Updates</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_links" name="type_checkboxs" value="links"><label for="search_control_checkbox_links">Links</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_posts" name="type_checkboxs" value="posts"><label for="search_control_checkbox_posts">Posts</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_other_resources" name="type_checkboxs" value="other resources"><label for="search_control_checkbox_other_resources">{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resources_label']}</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_uploads" name="type_checkboxs" value="uploads"><label for="search_control_checkbox_uploads">Uploads</label>
	
	<div class='form_label_holder'>
		<span class='item_label'>Status:</span>
	</div>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_exists" name="status_checkboxes" value="exists"><label for="search_control_checkbox_exists">Exists</label>
	<input type="checkbox" class='search_control_checkbox' id="search_control_checkbox_removed" name="status_checkboxes" value="removed"><label for="search_control_checkbox_removed">Removed</label>
	
	<div class='form_label_holder'>
		<span class='item_label'>Sort Method:</span>
	</div>
	<input type="radio" class='search_control_radio' id="search_control_radio_reverse_chronological" name="sort_radios" value="reverse chronological"><label for="search_control_radio_reverse_chronological">Reverse Chronological (Newest First)</label>
	<input type="radio" class='search_control_radio' id="search_control_radio_chronological" name="sort_radios" value="chronological"><label for="search_control_radio_chronological">Chronological (Oldest First)</label>
	
	<div class='form_label_holder'>
		<span class='item_label'>Keywords:</span>
		<div class='comment_2'>(Words to search for, separated by spaces, or commas. Only letters and numbers are supported.)</div>
	</div>
	<input type="text" class='search_control_text' id="search_control_text_keywords" name="keywords_text">
	
	<div class='form_label_holder'>
		<span class='item_label'>Keyword Match Threshold:</span>
		<div class='comment_2'>(Entries must contain at least this percentage [e.g., 70%] of matching keywords to be returned.)</div>
	</div>
	<input type="number" class='search_control_number' id="search_control_number_keyword_match_threshhold" min='0' max='100' value='70' step='1'  name="keyword_match_threshold_number">
</form>
<div class='search_control_button'><a class='search_control_button_link' id='search_control_button_link_apply' href='#'>Apply</a></div>
</div>
HEREDOC;	
$var_99e6c981_prev_next_controls_str = <<<HEREDOC
<div class='no_print' id='prev_next_controls_holder'>
<div class='prev_next_control_button'><a class='prev_next_control_button_link' id='prev_next_control_button_link_previous' href='#'>Previous</a></div>
<div class='prev_next_control_button'><a class='prev_next_control_button_link' id='prev_next_control_button_link_next' href='#'>Next</a></div>
</div>
HEREDOC;	
// Browse - Rev Chr
$var_99e6c981_n3_num = 0;
foreach ($var_99e6c981_browse_entries_reverse_chronological_arr as &$var_99e6c981_chunk_str){
	$var_99e6c981_n3_num++;
	// Define content for eval
	$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>Browse</h1>
		<div class='item_content'>
			<script>
			var_99e6c981_last_page_gnum = $var_99e6c981_last_page_num;
			</script>
			{$var_99e6c981_browse_controls_str}
			{$var_99e6c981_search_controls_str}
			{$var_99e6c981_chunk_str}
			{$var_99e6c981_prev_next_controls_str}
		</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	$var_99e6c981_item_name_str = 'Browse';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	$var_99e6c981_item_type_str = 'Widget Page';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	$var_99e6c981_item_type_str = 'Widget Page';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'></script>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_99e6c981_item_type_str} - {$var_99e6c981_item_name_str}";
	if ($var_99e6c981_item_name_str === 'Search'){
		$var_c836c568_page_bio_switch_boo = TRUE;
	} else {
		$var_c836c568_page_bio_switch_boo = FALSE;	
	}
	// Do eval
	eval(substr(file_get_contents("{$var_99e6c981_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	$var_99e6c981_chunk_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/browse-reverse-chronological/browse-{$var_99e6c981_n3_num}.html";
	file_put_contents($var_99e6c981_chunk_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_99e6c981_chunk_str);
// Browse - Chr
$var_99e6c981_n3_num = 0;
foreach ($var_99e6c981_browse_entries_chronological_arr as &$var_99e6c981_chunk_str){
	$var_99e6c981_n3_num++;
	// Define content for eval
	$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>Browse</h1>
		<div class='item_content'>
			<script>
			var_99e6c981_last_page_gnum = $var_99e6c981_last_page_num;
			</script>
			{$var_99e6c981_browse_controls_str}
			{$var_99e6c981_search_controls_str}
			{$var_99e6c981_chunk_str}
			{$var_99e6c981_prev_next_controls_str}
		</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	$var_99e6c981_item_name_str = 'Browse';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	$var_99e6c981_item_type_str = 'Widget Page';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'></script>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_99e6c981_item_type_str} - {$var_99e6c981_item_name_str}";
	if ($var_99e6c981_item_name_str === 'Search'){
		$var_c836c568_page_bio_switch_boo = TRUE;
	} else {
		$var_c836c568_page_bio_switch_boo = FALSE;	
	}
	// Do eval
	eval(substr(file_get_contents("{$var_99e6c981_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	$var_99e6c981_chunk_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/browse-chronological/browse-{$var_99e6c981_n3_num}.html";
	file_put_contents($var_99e6c981_chunk_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_99e6c981_chunk_str);
// Search - Rev Chr
$var_99e6c981_n3_num = 0;
foreach ($var_99e6c981_search_entries_reverse_chronological_arr as &$var_99e6c981_chunk_str){
	$var_99e6c981_n3_num++;
	// Define content for eval
	$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>Search</h1>
		<div class='item_content'>
			<script>
			var_99e6c981_last_page_gnum = $var_99e6c981_last_page_num;
			</script>
			{$var_99e6c981_browse_controls_str}
			{$var_99e6c981_search_controls_str}
			{$var_99e6c981_chunk_str}
			{$var_99e6c981_prev_next_controls_str}
		</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	$var_99e6c981_item_name_str = 'Search';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	$var_99e6c981_item_type_str = 'Widget Page';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'></script>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_99e6c981_item_type_str} - {$var_99e6c981_item_name_str}";
	if ($var_99e6c981_item_name_str === 'Search'){
		$var_c836c568_page_bio_switch_boo = TRUE;
	} else {
		$var_c836c568_page_bio_switch_boo = FALSE;	
	}
	// Do eval
	eval(substr(file_get_contents("{$var_99e6c981_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	$var_99e6c981_chunk_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/search-reverse-chronological/search-{$var_99e6c981_n3_num}.html";
	file_put_contents($var_99e6c981_chunk_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_99e6c981_chunk_str);
// Search - Chr
$var_99e6c981_n3_num = 0;
foreach ($var_99e6c981_search_entries_chronological_arr as &$var_99e6c981_chunk_str){
	$var_99e6c981_n3_num++;
	// Define content for eval
	$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>Search</h1>
		<div class='item_content'>
			<script>
			var_99e6c981_last_page_gnum = $var_99e6c981_last_page_num;
			</script>
			{$var_99e6c981_browse_controls_str}
			{$var_99e6c981_search_controls_str}
			{$var_99e6c981_chunk_str}
			{$var_99e6c981_prev_next_controls_str}
		</div>
	</div>
</div>
HEREDOC;	
	// Define other variables passed to eval
	$var_c836c568_item_css_str = '';
	$var_99e6c981_item_name_str = 'Search';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf") === TRUE){
		$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
	} else {
		$var_c836c568_item_css_str = '';
	}
	$var_c836c568_item_type_css_str = '';
	$var_99e6c981_item_type_str = 'Widget Page';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf") === TRUE){
		$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
	} else {
		$var_c836c568_item_type_css_str = '';	
	}
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf") === TRUE){
		$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
	} else {
		$var_c836c568_item_js_str = '';
	}
	$var_c836c568_item_type_js_str = '';
	if (file_exists("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf") === TRUE){
		$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_99e6c981_location_str}/Source/Content Inputs/Assets/{$var_99e6c981_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
		$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'></script>";
	} else {
		$var_c836c568_item_type_js_str = '';	
	}
	$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_99e6c981_item_type_str} - {$var_99e6c981_item_name_str}";
	if ($var_99e6c981_item_name_str === 'Search'){
		$var_c836c568_page_bio_switch_boo = TRUE;
	} else {
		$var_c836c568_page_bio_switch_boo = FALSE;	
	}
	// Do eval
	eval(substr(file_get_contents("{$var_99e6c981_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
	// Create file
	$var_99e6c981_chunk_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/search-chronological/search-{$var_99e6c981_n3_num}.html";
	file_put_contents($var_99e6c981_chunk_destination_str, $var_c836c568_page_html_layout_str);
}
unset($var_99e6c981_chunk_str);
## Cleanup
//goto goto_99e6c981_cleaup;
goto_99e6c981_cleaup:
// Do nothing
## Exit
//goto goto_99e6c981_end;
goto_99e6c981_end:
?>