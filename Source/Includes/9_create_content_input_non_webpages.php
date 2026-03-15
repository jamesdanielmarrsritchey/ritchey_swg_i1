<?php
# Meta
// Name: Create Content Input Non-Webpages
// Description: Create files for inputs in "/Source/Content Inputs/Unclassified/", and "/Source/Content Inputs/Assets", excluding ".conf2" files.
// Status: Stable
// UUID: 427838bd, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_427838bd_n_num = 1;
$var_427838bd_location_str = realpath(dirname(__FILE__, $var_427838bd_n_num));
while (is_file("{$var_427838bd_location_str}/application.php") !== TRUE) {
	$var_427838bd_n_num++;
	$var_427838bd_location_str = realpath(dirname(__FILE__, $var_427838bd_n_num));
	if ($var_427838bd_n_num > 50){
		exit(1);
	}
}
$var_427838bd_location_str = realpath(dirname($var_427838bd_location_str, 1));
eval(substr(file_get_contents("{$var_427838bd_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Create a list of input files, and for each, import the data, and generate the file.
require_once $var_427838bd_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_427838bd_unclassified_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_427838bd_location_str}/Source/Content Inputs/Unclassified", NULL, '.conf', TRUE);
$var_427838bd_asset_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_427838bd_location_str}/Source/Content Inputs/Assets", NULL, '.conf', TRUE);
require_once $var_427838bd_location_str . '/Source/Custom Dependencies/merge_arrays_reindex_i1_v2.php';
$var_427838bd_files_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_427838bd_unclassified_files_arr, $var_427838bd_asset_files_arr);
foreach ($var_427838bd_files_arr as &$var_427838bd_item_str){
	require_once $var_427838bd_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	$var_427838bd_item_value_str = ritchey_get_lines_by_prefix_i1_v1($var_427838bd_item_str, 'Content:', '"', NULL, TRUE);
	require_once $var_427838bd_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_427838bd_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_427838bd_item_str, 'Destination: ', FALSE, FALSE, TRUE);
	$var_427838bd_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/{$var_427838bd_item_destination_str}";
	require_once $var_427838bd_location_str . '/Source/Custom Dependencies/get_file_extension_from_path_by_dot_level_i1_v1.php';
	if (fun_e16a0092_get_file_extension_from_path_by_dot_level_i1_v1($var_427838bd_item_destination_str, 1) === 'css'){
		if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_inversion'] === TRUE) {
			require_once $var_427838bd_location_str . '/Source/Custom Dependencies/invert_css_hex6_colors_i1_v1.php';
			$var_427838bd_item_value_str = fun_9a6f3c12_invert_css_hex6_colors_i1_v1($var_427838bd_item_value_str, 100);
		}
		if (is_int($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_shift_amount']) === TRUE) {
			require_once $var_427838bd_location_str . '/Source/Custom Dependencies/shift_css_hex6_colors_i1_v1.php';
			$var_427838bd_item_value_str = fun_6d1a3f90_shift_css_hex6_colors_i1_v1($var_427838bd_item_value_str, $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_shift_amount']);
		}
	}
	file_put_contents($var_427838bd_item_destination_str, $var_427838bd_item_value_str);
}
unset($var_427838bd_item_str);
## Cleanup
//goto goto_427838bd_cleaup;
goto_427838bd_cleaup:
// Do nothing
## Exit
//goto goto_427838bd_end;
goto_427838bd_end:
?>