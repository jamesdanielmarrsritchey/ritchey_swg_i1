<?php
# Meta
// Name: Create Hello World.txt
// Description: Generate the Hello World file in the public directory.
// Status: Stable
// UUID: 9e1ce3ee, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_9e1ce3ee_n_num = 1;
$var_9e1ce3ee_location_str = realpath(dirname(__FILE__, $var_9e1ce3ee_n_num));
while (is_file("{$var_9e1ce3ee_location_str}/application.php") !== TRUE) {
	$var_9e1ce3ee_n_num++;
	$var_9e1ce3ee_location_str = realpath(dirname(__FILE__, $var_9e1ce3ee_n_num));
	if ($var_9e1ce3ee_n_num > 50){
		exit(1);
	}
}
$var_9e1ce3ee_location_str = realpath(dirname($var_9e1ce3ee_location_str, 1));
eval(substr(file_get_contents("{$var_9e1ce3ee_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
$var_9e1ce3ee_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/Hello World.txt";
### Import content
require_once $var_9e1ce3ee_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
$var_9e1ce3ee_item_source_str = $var_9e1ce3ee_location_str . '/Source/Content Inputs/Unclassified/Hello World.conf2';
$var_9e1ce3ee_item_value_str = ritchey_get_lines_by_prefix_i1_v1($var_9e1ce3ee_item_source_str, 'Content:', '"', NULL, TRUE);
require_once $var_9e1ce3ee_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
$var_9e1ce3ee_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_9e1ce3ee_item_source_str, 'Destination: ', FALSE, FALSE, TRUE);
$var_9e1ce3ee_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/{$var_9e1ce3ee_item_destination_str}";
### If no content was imported, generate content
if (trim($var_9e1ce3ee_item_value_str) === ''){
	require_once $var_9e1ce3ee_location_str . '/Source/Custom Dependencies/random_hello_world_i1_v4.php';
	$var_9e1ce3ee_item_value_str = fun_a1b2c3d4_random_hello_world_i1_v4();
}
### Generate Hello World.txt file
file_put_contents($var_9e1ce3ee_item_destination_str, $var_9e1ce3ee_item_value_str);	
## Cleanup
//goto goto_9e1ce3ee_cleaup;
goto_9e1ce3ee_cleaup:
// Do nothing
## Exit
//goto goto_9e1ce3ee_end;
goto_9e1ce3ee_end:
?>