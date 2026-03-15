<?php
# Meta
// Name: Import Configuration File Data
// Description: Imports the information stored in "/Source/Configuration Files", and saves it to an array. Generates some additional values, and adds them to array. This information can then be used by other parts of the application later, without neeeding to read the configuration files.
// Status: Stable
# Content
## Prep
$var_1e2ae7eac88d4fc9b90cc294ef173a00_n_num = 1;
$var_05de2cd071a040ba831753360efae4e6_location_str = realpath(dirname(__FILE__, $var_1e2ae7eac88d4fc9b90cc294ef173a00_n_num));
while (is_file("{$var_05de2cd071a040ba831753360efae4e6_location_str}/application.php") !== TRUE) {
	$var_1e2ae7eac88d4fc9b90cc294ef173a00_n_num++;
	$var_05de2cd071a040ba831753360efae4e6_location_str = realpath(dirname(__FILE__, $var_1e2ae7eac88d4fc9b90cc294ef173a00_n_num));
	if ($var_1e2ae7eac88d4fc9b90cc294ef173a00_n_num > 50){
		exit(1);
	}
}
$var_05de2cd071a040ba831753360efae4e6_location_str = realpath(dirname($var_05de2cd071a040ba831753360efae4e6_location_str, 1));
## Task
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr = array();
### Import Data
require_once $var_05de2cd071a040ba831753360efae4e6_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_6e23436d6ab34d51b7196a67fe5ede60_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_05de2cd071a040ba831753360efae4e6_location_str}/Source/Configuration Files", NULL, '.conf', TRUE);
foreach ($var_6e23436d6ab34d51b7196a67fe5ede60_files_arr as &$var_e3271b2f16cc4878b644fcbf8c15e05e_item_str){
	require_once $var_05de2cd071a040ba831753360efae4e6_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$var_a562abfaf9f7471d8da452b35ae4df88_value_str = ritchey_get_line_by_prefix_i1_v3($var_e3271b2f16cc4878b644fcbf8c15e05e_item_str, 'Content: ', FALSE, FALSE, TRUE);
	$var_554d048c11034140a19da923003e413c_key_str = ritchey_get_line_by_prefix_i1_v3($var_e3271b2f16cc4878b644fcbf8c15e05e_item_str, 'Name: ', FALSE, FALSE, TRUE);
	require_once $var_05de2cd071a040ba831753360efae4e6_location_str . '/Source/Custom Dependencies/sanitize_string_to_az_09_dash_v1.php';
	$var_554d048c11034140a19da923003e413c_key_str = fun_9c4a7e2f1b8d43c6a5e9f0b2c7d8e1f3_sanitize_string_to_az_09_dash_v1($var_554d048c11034140a19da923003e413c_key_str);
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr[$var_554d048c11034140a19da923003e413c_key_str] = $var_a562abfaf9f7471d8da452b35ae4df88_value_str;
}
unset($var_e3271b2f16cc4878b644fcbf8c15e05e_item_str);
//var_dump($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr);
### Generated Data
// Convert Logo Web Path to full URL
if (trim($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path']) !== ''){
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url'] . $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path'];
} else {
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path'] = '';
}
// Convert Profile Picture Web Path to full URL
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['profile_picture_web_path'] = $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url'] . $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['profile_picture_web_path'];
// Convert Public Folder Path to full path
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path'] = $var_05de2cd071a040ba831753360efae4e6_location_str . $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path'];
// Convert Private Folder Path to full path
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['private_folder_path'] = $var_05de2cd071a040ba831753360efae4e6_location_str . $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['private_folder_path'];
// Convert Downloads Folder Path to full path
$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path'] = $var_05de2cd071a040ba831753360efae4e6_location_str . $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path'];
// Convert CSS Colour Inversion to bool
if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_inversion'] === 'True'){
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_inversion'] = TRUE;
} else {
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_inversion'] = FALSE;
}
// Convert CSS Colour Shift Amount to number
if (is_numeric($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_shift_amount']) === TRUE){
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_shift_amount'] = intval($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_shift_amount']);
} else {
	$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['css_colour_inversion'] = '';
}
## Cleanup
//goto goto_500bd10f47134a31b3ba5826b7bf4017_cleaup;
goto_500bd10f47134a31b3ba5826b7bf4017_cleaup:
// Do nothing
## Exit
//goto goto_b706085124464525a3fae9b59da023c1_end;
goto_b706085124464525a3fae9b59da023c1_end:
?>