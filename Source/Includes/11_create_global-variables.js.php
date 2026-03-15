<?php
# Meta
// Name: Create Global Variables.js
// Description: Create /Assets/global-variables.js file
// Status: Stable
// UUID: da1cdfc8, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_da1cdfc8_n_num = 1;
$var_da1cdfc8_location_str = realpath(dirname(__FILE__, $var_da1cdfc8_n_num));
while (is_file("{$var_da1cdfc8_location_str}/application.php") !== TRUE) {
	$var_da1cdfc8_n_num++;
	$var_da1cdfc8_location_str = realpath(dirname(__FILE__, $var_da1cdfc8_n_num));
	if ($var_da1cdfc8_n_num > 50){
		exit(1);
	}
}
$var_da1cdfc8_location_str = realpath(dirname($var_da1cdfc8_location_str, 1));
eval(substr(file_get_contents("{$var_da1cdfc8_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Import data from configuration info, and create file
$var_da1cdfc8_global_variables_arr = array();
#### Add imported content
foreach ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr as $var_da1cdfc8_key_uns => $var_da1cdfc8_item_str){
	if ($var_da1cdfc8_key_uns == 'url'){
		$var_da1cdfc8_global_variables_arr[] = "\t" . "var_da1cdfc8_{$var_da1cdfc8_key_uns}_gstr='{$var_da1cdfc8_item_str}';";
	} else if ($var_da1cdfc8_key_uns == 'downloads_url'){
		$var_da1cdfc8_global_variables_arr[] = "\t" . "var_da1cdfc8_{$var_da1cdfc8_key_uns}_gstr='{$var_da1cdfc8_item_str}';";
	} else if ($var_da1cdfc8_key_uns == 'other_resources_label'){
		$var_da1cdfc8_global_variables_arr[] = "\t" . "var_da1cdfc8_{$var_da1cdfc8_key_uns}_gstr='{$var_da1cdfc8_item_str}';";
	} else if ($var_da1cdfc8_key_uns == 'items_per_page'){
		$var_da1cdfc8_global_variables_arr[] = "\t" . "var_da1cdfc8_{$var_da1cdfc8_key_uns}_gnum={$var_da1cdfc8_item_str};";
	} else {
		// Do not add the value, because it isn't needed client-side
	}
}
unset($var_da1cdfc8_item_str);
$var_da1cdfc8_global_variables_str = trim(implode(PHP_EOL, $var_da1cdfc8_global_variables_arr));
$var_da1cdfc8_global_variables_str = <<<HEREDOC
// Global Variables
$var_da1cdfc8_global_variables_str
HEREDOC;
$destination = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/assets/global-variables.js";
@file_put_contents($destination, $var_da1cdfc8_global_variables_str);	
## Cleanup
//goto goto_da1cdfc8_cleaup;
goto_da1cdfc8_cleaup:
// Do nothing
## Exit
//goto goto_da1cdfc8_end;
goto_da1cdfc8_end:
?>