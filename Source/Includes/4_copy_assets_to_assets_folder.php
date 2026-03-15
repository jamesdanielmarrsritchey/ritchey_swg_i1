<?php
# Meta
// Name: Copy Assets To Assets Folder
// Description: Copies pre-made assets to the assets folder. Does not deal with assets generated from content inputs.
// Status: Stable
// UUID: 9ebcbafd, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_9ebcbafd_n_num = 1;
$var_9ebcbafd_location_str = realpath(dirname(__FILE__, $var_9ebcbafd_n_num));
while (is_file("{$var_9ebcbafd_location_str}/application.php") !== TRUE) {
	$var_9ebcbafd_n_num++;
	$var_9ebcbafd_location_str = realpath(dirname(__FILE__, $var_9ebcbafd_n_num));
	if ($var_9ebcbafd_n_num > 50){
		exit(1);
	}
}
$var_9ebcbafd_location_str = realpath(dirname($var_9ebcbafd_location_str, 1));
eval(substr(file_get_contents("{$var_9ebcbafd_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Copy files
require_once $var_9ebcbafd_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_9ebcbafd_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_9ebcbafd_location_str}/Source/Assets", NULL, NULL, TRUE);
foreach ($var_9ebcbafd_files_arr as &$var_9ebcbafd_item_str){
	$var_9ebcbafd_filename_str = basename($var_9ebcbafd_item_str);
	copy($var_9ebcbafd_item_str, "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/assets/{$var_9ebcbafd_filename_str}");
}
unset($var_9ebcbafd_item_str);
## Cleanup
//goto goto_9ebcbafd_cleaup;
goto_9ebcbafd_cleaup:
// Do nothing
## Exit
//goto goto_9ebcbafd_end;
goto_9ebcbafd_end:
?>