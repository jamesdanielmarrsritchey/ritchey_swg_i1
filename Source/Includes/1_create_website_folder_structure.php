<?php
# Meta
// Name: Create Website Folder Structure
// Description: Creates the folders used by the website, if they don't exist.
// Status: Stable
# Content
## Prep
$var_71ae074086df405a9972eefff5d0147d_n_num = 1;
$var_6712cc40727d46a099085a1ae34d201e_location_str = realpath(dirname(__FILE__, $var_71ae074086df405a9972eefff5d0147d_n_num));
while (is_file("{$var_6712cc40727d46a099085a1ae34d201e_location_str}/application.php") !== TRUE) {
	$var_71ae074086df405a9972eefff5d0147d_n_num++;
	$var_6712cc40727d46a099085a1ae34d201e_location_str = realpath(dirname(__FILE__, $var_71ae074086df405a9972eefff5d0147d_n_num));
	if ($var_71ae074086df405a9972eefff5d0147d_n_num > 50){
		exit(1);
	}
}
$var_6712cc40727d46a099085a1ae34d201e_location_str = realpath(dirname($var_6712cc40727d46a099085a1ae34d201e_location_str, 1));
## Task
eval(substr(file_get_contents("{$var_6712cc40727d46a099085a1ae34d201e_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
### Create var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr as needed
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr = array();
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['private_folder_path']}";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['downloads_folder_path']}";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/assets";
//$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/databases"; // Not used by this project.
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/navigation-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/regular-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/post-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/upload-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/status-update-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/link-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/other-resource-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/browse-chronological";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/browse-reverse-chronological";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/search-chronological";
$var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr[] = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/search-reverse-chronological";
foreach ($var_64e3d9eb99ff4cfeac052d9f2e3eb71c_directories_arr as &$var_464de0b7b2ce422db96b6a46fde5badd_item_str){
	if (@is_dir($var_464de0b7b2ce422db96b6a46fde5badd_item_str) === TRUE){
		// Do nothing
	} else {
		mkdir($var_464de0b7b2ce422db96b6a46fde5badd_item_str, 0777, true);
	}
}
unset($var_464de0b7b2ce422db96b6a46fde5badd_item_str);
## Cleanup
//goto goto_cb8047a55db8429989a9195891513bed_cleaup;
goto_cb8047a55db8429989a9195891513bed_cleaup:
// Do nothing
## Exit
//goto goto_81bd971870da46c6a58cfa70421e0286_end;
goto_81bd971870da46c6a58cfa70421e0286_end:
?>