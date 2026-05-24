<?php
# Meta
// Name: Create SB Databases
// Description: Create flat-file JSON databases for searching/browsing widget-pages.
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
// Browse Page
$var_99e6c981_item_type_arr = array();
$var_99e6c981_item_type_arr['destination'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/widget-pages/browse.html";
$var_99e6c981_item_type_arr['name'] = 'Browse';
$var_99e6c981_item_type_arr['type'] = 'Page';
// Search Page
$var_99e6c981_item_type_arr = array();
$var_99e6c981_item_type_arr['destination'] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/widget-pages/search.html";
$var_99e6c981_item_type_arr['name'] = 'Search';
$var_99e6c981_item_type_arr['type'] = 'Page';
### Add to the list uploads, and their information
// Create list of uploads
$var_99e6c981_uploads_arr = array();
$var_99e6c981_shared_data_uploadstxt_file_path_str = $var_99e6c981_location_str . '/Source/Shared Data/Uploads.txt';
$var_99e6c981_file_handle_obj = fopen($var_99e6c981_shared_data_uploadstxt_file_path_str, "r");
if ($var_99e6c981_file_handle_obj !== FALSE){
	$var_99e6c981_continue_loop_boo = TRUE;
	while ($var_99e6c981_continue_loop_boo === TRUE){
		$var_99e6c981_current_line_str = fgets($var_99e6c981_file_handle_obj);
		if ($var_99e6c981_current_line_str === FALSE){
			$var_99e6c981_continue_loop_boo = FALSE;
			} else {
				// Add to array
            $var_99e6c981_uploads_arr[] = json_decode($var_99e6c981_current_line_str);
				// Check for special reading abort code "Code 1779035591" (not presently used by this project, but useful to have in the code)
            if (trim($var_99e6c981_current_line_str) === "Code 1779035591"){
                //echo "Found \"Code 1779035591\". Ceasing to read further in file." . PHP_EOL;
                $var_99e6c981_continue_loop_boo = FALSE;
            }
        }
    }
    fclose($var_99e6c981_file_handle_obj);
} else {
    //echo "Failed to open file." . PHP_EOL;
}
// Format each array entry as a sub-array where line label becomes the key, and remove the label from the value
foreach ($var_99e6c981_uploads_arr as &$var_99e6c981_item_str){
	require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/string_to_array_by_lines_i1776011657_v0.2.php';
	$var_99e6c981_item_str = fun_ce50722f_string_to_array_by_lines_i1776011657_v0_2($var_99e6c981_item_str, TRUE);
}
unset($var_99e6c981_item_str);
// Get information for each file
$var_99e6c981_n4_num = 0;
foreach ($var_99e6c981_uploads_arr as &$var_99e6c981_item_str){
	$var_99e6c981_n_num++;
	$var_99e6c981_n4_num++;
	$var_99e6c981_entries_arr[$var_99e6c981_n_num] = array();
	$var_99e6c981_item_meta_str = "{$var_99e6c981_item_str['path']}.meta";
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
	if (isset($var_99e6c981_item_str['flag']) === FALSE){
		$var_99e6c981_item_str['status'] = 'Exists';
	} else if ($var_99e6c981_item_str['flag'] === 'Excess'){
      $var_99e6c981_item_str['status'] = 'Removed';
   }
	$var_99e6c981_item_status_str = $var_99e6c981_item_str['status'];
	if (isset($var_99e6c981_item_status_str) === TRUE && $var_99e6c981_item_status_str !== ''){
		$var_99e6c981_entries_arr[$var_99e6c981_n_num]['status'] = $var_99e6c981_item_status_str;
	}
}
unset($var_99e6c981_item_str);
### Add missing dates.
foreach ($var_99e6c981_entries_arr as &$var_99e6c981_entry_uns){
	if (isset($var_99e6c981_entry_uns['date']) === FALSE){
		require_once $var_99e6c981_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_99e6c981_tmp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_99e6c981_entry_uns['date'] = $var_99e6c981_tmp_arr['human_readable_long'];
	}
}
unset($var_99e6c981_entry_arr);
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
foreach ($var_99e6c981_entries_sorted_arr as &$var_99e6c981_entry_uns){
	$var_99e6c981_entry_uns = json_decode($var_99e6c981_entry_uns, true);
}
unset($var_99e6c981_entry_uns);
### Empty sb-rc database folder
require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_99e6c981_uploads_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/databases/sb-rc", NULL, NULL, TRUE);
foreach ($var_99e6c981_uploads_arr as &$var_99e6c981_item_str){
	if ($var_99e6c981_item_str != '' && $var_99e6c981_item_str !== '/'){
		@unlink($var_99e6c981_item_str);
	}
}
unset($var_99e6c981_item_str);
### Empty sb-chronological database folder
require_once $var_99e6c981_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_99e6c981_uploads_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/databases/sb-chronological", NULL, NULL, TRUE);
foreach ($var_99e6c981_uploads_arr as &$var_99e6c981_item_str){
	if ($var_99e6c981_item_str != '' && $var_99e6c981_item_str !== '/'){
		@unlink($var_99e6c981_item_str);
	}
}
unset($var_99e6c981_item_str);
### Create database files
// Reverse Chronological Database (newest first)
$var_99e6c981_n5_num = 0;
foreach ($var_99e6c981_entries_sorted_arr as &$var_99e6c981_entry_uns){
	$var_99e6c981_n5_num++;
	$var_99e6c981_entry_uns = json_encode($var_99e6c981_entry_uns);
	file_put_contents("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/databases/sb-rc/{$var_99e6c981_n5_num}.json", $var_99e6c981_entry_uns);
}
unset($var_99e6c981_entry_uns);
// Chronological Database (oldest first)
$var_99e6c981_n5_num = 0;
foreach (array_reverse($var_99e6c981_entries_sorted_arr) as $var_99e6c981_entry_uns){
	$var_99e6c981_n5_num++;
	//$var_99e6c981_entry_uns = json_encode($var_99e6c981_entry_uns);
	file_put_contents("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/databases/sb-chronological/{$var_99e6c981_n5_num}.json", $var_99e6c981_entry_uns);
}
unset($var_99e6c981_entry_uns);
// Set database size autoconf
$var_99e6c981_database_size_num = <<<HEREDOC
Name: Database Size
Description: This contains database size content for the "/www/public/assets/global-variables.js" file. The .autoconf extension indicates it is processed seperate from other configuration files in this folder by the system, and that its content value is automatically generated by the system. Don't manually edit it.
Content: 
"
$var_99e6c981_n5_num
"
HEREDOC;
file_put_contents("{$var_99e6c981_location_str}/Source/Configuration Files/Database Size.autoconf", $var_99e6c981_database_size_num);
## Cleanup
//goto goto_99e6c981_cleaup;
goto_99e6c981_cleaup:
// Do nothing
## Exit
//goto goto_99e6c981_end;
goto_99e6c981_end:
?>