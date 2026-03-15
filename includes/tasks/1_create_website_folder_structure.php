<?php
# Meta
// Name: Create Website Folder Structure
// Description: Checks if the necessary folders exist in the www directory, and if not, it creates them.
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
### Create directories as needed
$directories = array();
$directories[] = "{$location}{$global_configuration_info['private_folder']}";
$directories[] = "{$location}{$global_configuration_info['public_folder']}";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/pages";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/posts";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/uploads";
$directories[] = "{$location}{$global_configuration_info['downloads_folder']}";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/databases";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/databases/chronological";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/databases/reverse_chronological";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/status-updates";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/links";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/other-resources";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/assets";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/assets/global";
$directories[] = "{$location}{$global_configuration_info['public_folder']}/assets/localized";
foreach ($directories as &$item){
	if (@is_dir($item) === TRUE){
		// Do nothing
	} else {
		mkdir($item, 0777, true);
	}
}
unset($item);
//var_dump($directories);
## Cleanup
// Do nothing
?>