<?php
# Meta
// Name: Copy Uploads To Downloads Folder
// Description: Removes all items from the downloads folder, and then copies uploads there, if they meet age requirements, and total limits. 
// Status: Stable
# Content
## Prep
$var_076284a0_n_num = 1;
$var_4f6607c2_location_str = realpath(dirname(__FILE__, $var_076284a0_n_num));
while (is_file("{$var_4f6607c2_location_str}/application.php") !== TRUE) {
	$var_076284a0_n_num++;
	$var_4f6607c2_location_str = realpath(dirname(__FILE__, $var_076284a0_n_num));
	if ($var_076284a0_n_num > 50){
		exit(1);
	}
}
$var_4f6607c2_location_str = realpath(dirname($var_4f6607c2_location_str, 1));
eval(substr(file_get_contents("{$var_4f6607c2_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Empty downloads folder
require_once $var_4f6607c2_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_5e365938_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}", NULL, NULL, TRUE);
foreach ($var_5e365938_files_arr as &$var_10ec37b0_item_str){
	if ($var_10ec37b0_item_str != '' && $var_10ec37b0_item_str !== '/'){
		@unlink($var_10ec37b0_item_str);
	}
}
unset($var_10ec37b0_item_str);
### Copy eligible uploads
// Create list
require_once $var_4f6607c2_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_5e365938_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_4f6607c2_location_str}/Source/Uploads", NULL, NULL, TRUE);
foreach ($var_5e365938_files_arr as &$var_10ec37b0_item_str){
	if (substr($var_10ec37b0_item_str, -5) === '.meta'){
		$var_10ec37b0_item_str = '';
	} else if (substr($var_10ec37b0_item_str, -14) === '.thumbnail.jpg'){
		$var_10ec37b0_item_str = '';
	}
}
unset($var_10ec37b0_item_str);
$var_5e365938_files_arr = array_filter($var_5e365938_files_arr);
// Sort List By Age
$var_24b4ddca_files_sorted_arr = array();
foreach ($var_5e365938_files_arr as &$var_10ec37b0_item_str){
	require_once $var_4f6607c2_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_b465b4cb_date_uploaded_str = ritchey_get_line_by_prefix_i1_v3("{$var_10ec37b0_item_str}.meta", 'Date Uploaded: ', FALSE, FALSE, TRUE);
	$var_dde220e0_timestamp_uploaded_obj = strtotime($var_b465b4cb_date_uploaded_str);
	// Keep in mind, some items will have same timestamp, so use nested array to add more items to same timestamp.
	if (isset($var_24b4ddca_files_sorted_arr[$var_dde220e0_timestamp_uploaded_obj]) === TRUE){
		$var_24b4ddca_files_sorted_arr["$var_dde220e0_timestamp_uploaded_obj"][] = $var_10ec37b0_item_str;
	} else {
		$var_24b4ddca_files_sorted_arr["$var_dde220e0_timestamp_uploaded_obj"] = array($var_10ec37b0_item_str);
	}
}
unset($var_10ec37b0_item_str);
krsort($var_24b4ddca_files_sorted_arr, SORT_NUMERIC); // Bigger numbers first, which means newer uploads first.
require_once $var_4f6607c2_location_str . '/Source/Custom Dependencies/flatten_array_v1.php';
$var_24b4ddca_files_sorted_arr = fun_7a3c9f2b_flatten_array_v1($var_24b4ddca_files_sorted_arr);
// Trim list to max items
if (is_numeric("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']}") === TRUE){
	$var_24b4ddca_files_sorted_arr = array_slice($var_24b4ddca_files_sorted_arr, 0, intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']), true);
}
// Remove items beyond max age
if (is_numeric($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']) === TRUE){
	foreach ($var_24b4ddca_files_sorted_arr as &$var_4acd0477_item_str) {
		require_once $var_4f6607c2_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_2b8b2967_current_timestamp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_9ab26c8a_current_timestamp_num = intval($var_2b8b2967_current_timestamp_arr['timestamp']);
   	require_once $var_4f6607c2_location_str . '/Source/Custom Dependencies/subtract_days_from_timestamp_i1_v1.php';
		$var_07e8ad7f_age_limit_timestamp = fun_a3c91f2d_subtract_days_from_timestamp_i1_v1($var_9ab26c8a_current_timestamp_num, intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']));
		require_once $var_4f6607c2_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
		$var_69e97f49_date_uploaded_str = ritchey_get_line_by_prefix_i1_v3("{$var_4acd0477_item_str}.meta", 'Date Uploaded: ', FALSE, FALSE, TRUE);
		$var_60c1d5f1_item_timestamp_obj = strtotime($var_69e97f49_date_uploaded_str);
		if (intval($var_60c1d5f1_item_timestamp_obj) < intval($var_07e8ad7f_age_limit_timestamp)){
			$var_4acd0477_item_str = '';
		}	
	}
	unset($var_4acd0477_item_str);
}
$var_24b4ddca_files_sorted_arr = array_filter($var_24b4ddca_files_sorted_arr);
// Copy file to downloads folder
foreach ($var_24b4ddca_files_sorted_arr as &$var_10ec37b0_item_str){
	$var_19b3a777_filename_str = basename($var_10ec37b0_item_str);
	copy($var_10ec37b0_item_str, "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}/{$var_19b3a777_filename_str}");
}
unset($var_10ec37b0_item_str);
## Cleanup
//goto goto_4ac59428_cleaup;
goto_4ac59428_cleaup:
// Do nothing
## Exit
//goto goto_8b73cf8d_end;
goto_8b73cf8d_end:
?>