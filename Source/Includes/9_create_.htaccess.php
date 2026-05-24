<?php
# Meta
// Name: Create .htaccess
// Description: Generate the .htaccess file in the public directory.
// Status: Stable
// UUID: 1bf9f424, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_1bf9f424_n_num = 1;
$var_1bf9f424_location_str = realpath(dirname(__FILE__, $var_1bf9f424_n_num));
while (is_file("{$var_1bf9f424_location_str}/application.php") !== TRUE) {
	$var_1bf9f424_n_num++;
	$var_1bf9f424_location_str = realpath(dirname(__FILE__, $var_1bf9f424_n_num));
	if ($var_1bf9f424_n_num > 50){
		exit(1);
	}
}
$var_1bf9f424_location_str = realpath(dirname($var_1bf9f424_location_str, 1));
eval(substr(file_get_contents("{$var_1bf9f424_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
$var_1bf9f424_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/.htaccess";
### Generate content
$var_1bf9f424_item_value_str = <<<HEREDOC
ErrorDocument 404 {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/404.html
HEREDOC;
### Generate humans.txt file
file_put_contents($var_1bf9f424_item_destination_str, $var_1bf9f424_item_value_str);	
## Cleanup
//goto goto_1bf9f424_cleaup;
goto_1bf9f424_cleaup:
// Do nothing
## Exit
//goto goto_1bf9f424_end;
goto_1bf9f424_end:
?>