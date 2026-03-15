<?php
# Meta
// Name: Import Localized Configuration Info
// Description: Imports the information stored in "", and saves it to variables. This eval is then used by other parts of the application to access those variables. Some additional variable are also created by combining imported information.
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
## Task
$localized_configuration_info = array();
### Imported Variables
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/configuration_files/localized", NULL, '.txt', TRUE);
foreach ($files as &$item){
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$value = ritchey_get_line_by_prefix_i1_v3($item, 'Content: ', FALSE, FALSE, TRUE);
	$key = ritchey_get_line_by_prefix_i1_v3($item, 'Name: ', FALSE, FALSE, TRUE);
	$key = str_replace(' ', '_', $key);
	$key = strtolower($key);
	$key = preg_replace('/[^a-z0-9_]/', '', $key);
	$localized_configuration_info[$key] = $value;
}
unset($item);
//var_dump($localized_configuration_info);
### Generated Variables
//var_dump($localized_configuration_info);
## Cleanup
// Do nothing
?>