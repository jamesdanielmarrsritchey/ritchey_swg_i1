<?php
# Meta
// Name: Create Assets
// Description: Imports the information stored in "/content_files/assets/", and uses it to generate those files in the public directory.
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
### Create a list of files, and for each, import the data, and generate the file.
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/assets", NULL, '.txt', TRUE);
foreach ($files as &$item){
	require_once $location . '/dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	$value = ritchey_get_lines_by_prefix_i1_v1($item, 'Content:', '"', 1, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$destination = ritchey_get_line_by_prefix_i1_v3($item, 'Destination: ', FALSE, FALSE, TRUE);
	$destination = trim($destination);
	$destination = "{$location}{$global_configuration_info['public_folder']}{$destination}";
	@file_put_contents($destination, $value);	
}
unset($item);
//var_dump($files);
## Cleanup
// Do nothing
?>