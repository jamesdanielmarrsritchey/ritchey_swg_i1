<?php
# Meta
// Name: Copy Uploads Thumbnails To Assets Folder
// Description: Removes all items from the downloads folder, and then copies uploads there, if they meet age requirements, and total limits. 
// Status: Stable
// UUID: c8f01714, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_c8f01714_n_num = 1;
$var_c8f01714_location_str = realpath(dirname(__FILE__, $var_c8f01714_n_num));
while (is_file("{$var_c8f01714_location_str}/application.php") !== TRUE) {
	$var_c8f01714_n_num++;
	$var_c8f01714_location_str = realpath(dirname(__FILE__, $var_c8f01714_n_num));
	if ($var_c8f01714_n_num > 50){
		exit(1);
	}
}
$var_c8f01714_location_str = realpath(dirname($var_c8f01714_location_str, 1));
eval(substr(file_get_contents("{$var_c8f01714_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Copy uploads thumbnails
// Create list
require_once $var_c8f01714_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_c8f01714_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_c8f01714_location_str}/Source/Uploads", NULL, '.thumbnail.jpg', TRUE);
// Copy file to downloads folder
foreach ($var_c8f01714_files_arr as &$var_c8f01714_item_str){
	$var_c8f01714_filename_str = basename($var_c8f01714_item_str);
	copy($var_c8f01714_item_str, "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/assets/{$var_c8f01714_filename_str}");
}
unset($var_c8f01714_item_str);
## Cleanup
//goto goto_c8f01714_cleaup;
goto_c8f01714_cleaup:
// Do nothing
## Exit
//goto goto_c8f01714_end;
goto_c8f01714_end:
?>