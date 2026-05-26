<?php
# Meta
// Name: Create Uploads List
// Description: Creates a list of all ELIGIBLE uploads, sorted by newest-oldest, and saves to "/Source/Shared Data/Uploads.txt". The shared data folder is used to share information between scripts.
// Status: Stable
# Content
## Prep
$var_fdab649b_n_num = 1;
$var_fdab649b_location_str = realpath(dirname(__FILE__, $var_fdab649b_n_num));
while (is_file("{$var_fdab649b_location_str}/application.php") !== TRUE) {
	$var_fdab649b_n_num++;
	$var_fdab649b_location_str = realpath(dirname(__FILE__, $var_fdab649b_n_num));
	if ($var_fdab649b_n_num > 50){
		exit(1);
	}
}
$var_fdab649b_location_str = realpath(dirname($var_fdab649b_location_str, 1));
eval(substr(file_get_contents("{$var_fdab649b_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Delete old list, if exists
if (file_exists("{$var_fdab649b_location_str}/Shared Data/Uploads List.txt") === TRUE){
	@unlink("{$var_fdab649b_location_str}/Shared Data/Uploads List.txt");
}
### Create new list
require_once $var_fdab649b_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_fdab649b_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_fdab649b_location_str}/Source/Uploads", NULL, '.meta', TRUE);
$var_fdab649b_entries_arr = array();
foreach ($var_fdab649b_files_arr as &$var_fdab649b_item_str){
	if (substr($var_fdab649b_item_str, -5) === '.meta'){
		// Import metadata
		$var_fdab649b_item_content_str = file_get_contents($var_fdab649b_item_str);
		// Add status (removed, exists)
		if (file_exists(substr($var_fdab649b_item_str, 0, -5)) === TRUE){
			$var_fdab649b_item_content_str = $var_fdab649b_item_content_str . PHP_EOL . 'Status: Exists';		
		} else {
			$var_fdab649b_item_content_str = $var_fdab649b_item_content_str . PHP_EOL . 'Status: Removed';		
		}
		// Add Path
		$var_fdab649b_item_content_str = $var_fdab649b_item_content_str . PHP_EOL . "Path: " . substr($var_fdab649b_item_str, 0, -5);
		// Encode as JSON
		$var_fdab649b_item_content_str = json_encode($var_fdab649b_item_content_str);
		// Add to array with timestamp keys
		require_once $var_fdab649b_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
		$var_fdab649b_date_uploaded_str = ritchey_get_line_by_prefix_i1_v3($var_fdab649b_item_str, 'Date Uploaded: ', FALSE, FALSE, TRUE);
		$var_fdab649b_timestamp_uploaded_obj = strtotime($var_fdab649b_date_uploaded_str);
		// // Keep in mind, some items will have same timestamp, so use nested array to add more items to same timestamp.
		if (isset($var_fdab649b_entries_arr[$var_fdab649b_timestamp_uploaded_obj]) === TRUE){
			$var_fdab649b_entries_arr["$var_fdab649b_timestamp_uploaded_obj"][] = $var_fdab649b_item_content_str;
		} else {
			$var_fdab649b_entries_arr["$var_fdab649b_timestamp_uploaded_obj"] = array($var_fdab649b_item_content_str);
		}
	}
}
unset($var_fdab649b_item_str);
### Sort list by timestamp
krsort($var_fdab649b_entries_arr, SORT_NUMERIC); // Bigger numbers first, which means newer uploads first.
### Unnest entries in array (list)
require_once $var_fdab649b_location_str . '/Source/Custom Dependencies/flatten_array_v1.php';
$var_fdab649b_entries_arr = fun_7a3c9f2b_flatten_array_v1($var_fdab649b_entries_arr);
### Flag entries too old (if applicable)
if (is_numeric($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']) === TRUE){
	foreach ($var_fdab649b_entries_arr as &$var_fdab649b_item_str) {
		require_once $var_fdab649b_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_fdab649b_current_timestamp_arr = fun_c8a4e19d_get_current_dates_v1();
		$var_fdab649b_current_timestamp_num = intval($var_fdab649b_current_timestamp_arr['timestamp']);
   	require_once $var_fdab649b_location_str . '/Source/Custom Dependencies/subtract_days_from_timestamp_i1_v1.php';
		$var_fdab649b_age_limit_timestamp = fun_a3c91f2d_subtract_days_from_timestamp_i1_v1($var_fdab649b_current_timestamp_num, intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_age_limit']));
		$var_fdab649b_date_uploaded_str = json_decode($var_fdab649b_item_str);
		require_once $var_fdab649b_location_str . '/Source/Custom Dependencies/string_to_array_by_lines_i1776011657_v0.2.php';
		$var_fdab649b_date_uploaded_str = fun_ce50722f_string_to_array_by_lines_i1776011657_v0_2($var_fdab649b_date_uploaded_str, TRUE);
		$var_fdab649b_date_uploaded_str = trim($var_fdab649b_date_uploaded_str['date_uploaded']);
		$var_fdab649b_item_timestamp_obj = strtotime($var_fdab649b_date_uploaded_str);
		if (intval($var_fdab649b_item_timestamp_obj) < intval($var_fdab649b_age_limit_timestamp)){
			$var_fdab649b_item_str = json_decode($var_fdab649b_item_str);
			$var_fdab649b_item_str = $var_fdab649b_item_str . PHP_EOL . 'Flag: Excess'; // Technically flag should be "Expired".
			$var_fdab649b_item_str = json_encode($var_fdab649b_item_str);
		}
	}
	unset($var_fdab649b_item_str);
}
$var_fdab649b_entries_arr = array_filter($var_fdab649b_entries_arr);
### Flag excess entries (if applicable)
if (is_numeric("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']}") === TRUE){
	$var_fdab649b_n2_num = intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['uploads_quantity_limit']);
	foreach ($var_fdab649b_entries_arr as &$var_fdab649b_item_str) {
		if ($var_fdab649b_n2_num > 0){
			// Do Nothing
		} else {
			$var_fdab649b_item_str = json_decode($var_fdab649b_item_str);
			$var_fdab649b_item_str = $var_fdab649b_item_str . PHP_EOL . 'Flag: Excess';
			$var_fdab649b_item_str = json_encode($var_fdab649b_item_str);
		}
		$var_fdab649b_n2_num--;
	}
	unset($var_fdab649b_item_str);
}
### Write file
if (@empty($var_fdab649b_entries_arr) === FALSE){
	$var_fdab649b_entries_arr = implode(PHP_EOL, $var_fdab649b_entries_arr);
	file_put_contents("{$var_fdab649b_location_str}/Source/Shared Data/Uploads.txt", $var_fdab649b_entries_arr);
}
## Cleanup
//goto goto_fdab649b_cleaup;
goto_fdab649b_cleaup:
// Do nothing
## Exit
//goto goto_fdab649b_end;
goto_fdab649b_end:
?>