<?php
# Name: App
# Description: This script runs the application.
# Content:
//"
## Dev
// echo 'id' . hash('crc32', 'app.php') . '_'; // This is the prefix to add to all variable names in this file, to make them unique.
## Prep
$id67ceba6d_n = 1;
$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
while (is_file("{$id67ceba6d_location}/app.php") !== TRUE) {
	$id67ceba6d_n++;
	$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
	if ($id67ceba6d_n > 50){
		exit(1);
	}
}
## Task
### Run Task Scripts
$id67ceba6d_n = 1;
$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
while (is_file("{$id67ceba6d_location}/app.php") !== TRUE) {
	$id67ceba6d_n++;
	$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
	if ($id67ceba6d_n > 50){
		exit(1);
	}
}
require_once $id67ceba6d_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$id67ceba6d_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$id67ceba6d_location}/includes/tasks", NULL, '.php', TRUE);
foreach ($id67ceba6d_files as &$id67ceba6d_item){
	require_once $id67ceba6d_item;
}
unset($id67ceba6d_item);
### Generate Files From Generator Scripts
$id67ceba6d_n = 1;
$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
while (is_file("{$id67ceba6d_location}/app.php") !== TRUE) {
	$id67ceba6d_n++;
	$id67ceba6d_location = realpath(dirname(__FILE__, $id67ceba6d_n));
	if ($id67ceba6d_n > 50){
		exit(1);
	}
}
require_once $id67ceba6d_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$id67ceba6d_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$id67ceba6d_location}/includes/generators", NULL, '.php', TRUE);
foreach ($id67ceba6d_files as &$id67ceba6d_item){
	require_once $id67ceba6d_item;
}
unset($id67ceba6d_item);
## Cleanup
//Do nothing
//"
?>