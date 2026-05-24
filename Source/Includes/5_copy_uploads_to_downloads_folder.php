<?php
# Meta
// Name: Copy Uploads To Downloads Folder
// Description: Removes all items from the downloads folder, and then copies uploads there, if they meet age requirements, and total limits (determined by Flag: Excess). 
// Status: Stable
# Content
## Prep
$var_330a9f1a_n_num = 1;
$var_330a9f1a_location_str = realpath(dirname(__FILE__, $var_330a9f1a_n_num));
while (is_file("{$var_330a9f1a_location_str}/application.php") !== TRUE) {
	$var_330a9f1a_n_num++;
	$var_330a9f1a_location_str = realpath(dirname(__FILE__, $var_330a9f1a_n_num));
	if ($var_330a9f1a_n_num > 50){
		exit(1);
	}
}
$var_330a9f1a_location_str = realpath(dirname($var_330a9f1a_location_str, 1));
eval(substr(file_get_contents("{$var_330a9f1a_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Empty downloads folder
require_once $var_330a9f1a_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_330a9f1a_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}", NULL, NULL, TRUE);
foreach ($var_330a9f1a_files_arr as &$var_330a9f1a_item_str){
	if ($var_330a9f1a_item_str != '' && $var_330a9f1a_item_str !== '/'){
		@unlink($var_330a9f1a_item_str);
	}
}
unset($var_330a9f1a_item_str);
### Copy eligible uploads
// Create list
$var_330a9f1a_uploads_arr = array();
$var_330a9f1a_shared_data_uploadstxt_file_path_str = $var_330a9f1a_location_str . '/Source/Shared Data/Uploads.txt';
$var_330a9f1a_file_handle_obj = fopen($var_330a9f1a_shared_data_uploadstxt_file_path_str, "r");
if ($var_330a9f1a_file_handle_obj !== FALSE){
	$var_330a9f1a_continue_loop_boo = TRUE;
	while ($var_330a9f1a_continue_loop_boo === TRUE){
		$var_330a9f1a_current_line_str = fgets($var_330a9f1a_file_handle_obj);
		if ($var_330a9f1a_current_line_str === FALSE){
			$var_330a9f1a_continue_loop_boo = FALSE;
			} else {
				// Convert to array with label as key
				$var_330a9f1a_current_line_str = json_decode($var_330a9f1a_current_line_str);
				require_once $var_330a9f1a_location_str . '/Source/Custom Dependencies/string_to_array_by_lines_i1776011657_v0.2.php';
				$var_330a9f1a_current_line_str = fun_ce50722f_string_to_array_by_lines_i1776011657_v0_2($var_330a9f1a_current_line_str, TRUE);
				// Check for "Flag: Excess", and if not present, add to array
				if (isset($var_330a9f1a_current_line_str['flag']) === FALSE){
					$var_330a9f1a_current_line_str['flag'] = NULL;
				}
            if ($var_330a9f1a_current_line_str['flag'] === 'Excess'){
               // Do nothing
            } else {
            	// Add to array
               $var_330a9f1a_uploads_arr[] = $var_330a9f1a_current_line_str;
            }
        }
    }
    fclose($var_330a9f1a_file_handle_obj);
} else {
    //echo "Failed to open file." . PHP_EOL;
}
// Copy files
foreach ($var_330a9f1a_uploads_arr as &$var_330a9f1a_item_str){
	$var_330a9f1a_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}/" . trim($var_330a9f1a_item_str['filename']);
	//echo "Destination: " . $var_330a9f1a_destination_str . PHP_EOL;
	$var_330a9f1a_source_str = trim($var_330a9f1a_item_str['path']);
	//echo "Source: " . $var_330a9f1a_source_str . PHP_EOL;
	copy($var_330a9f1a_source_str, $var_330a9f1a_destination_str);
}
unset($var_330a9f1a_item_str);
## Cleanup
//goto goto_330a9f1a_cleaup;
goto_330a9f1a_cleaup:
// Do nothing
## Exit
//goto goto_330a9f1a_end;
goto_330a9f1a_end:
?>