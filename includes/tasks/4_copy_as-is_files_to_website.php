<?php
# Meta
// Name: Copy AS-IS files to Website
// Description: Copies each AS-IS file to the public uploads directory.
# Content
## Prep
$n = 1;
$location = realpath(dirname(__FILE__, $n));
while (is_file("{$location}/app.php") !== TRUE) {
	$n++;
	$location = realpath(dirname(__FILE__, $n));
	if ($n > 50){
		exit(1);
	}
}
eval(@substr(@file_get_contents("{$location}/evals/configuration_info_importers/import_global_configuration_info.php"), 5, -2));
## Task
### Copy files
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/as_is_files", NULL, NULL, TRUE);
foreach ($files as &$item){
	$destination = "{$location}{$global_configuration_info['public_folder']}/" . str_replace("{$location}/as_is_files/", '', $item);
	$directory = dirname($destination);
	if (is_file($destination) === FALSE AND is_dir($directory) === TRUE){
		copy($item, $destination);
	}
}
unset($item);
//var_dump($files);
## Cleanup
// Do nothing
?>