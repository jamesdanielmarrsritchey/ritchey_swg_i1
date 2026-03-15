<?php
# Meta
// Name: Create humans.txt
// Description: Imports the information stored in "/content_files/static_other_files/", combines with custom generated information, and uses it to generate the humans.txt file in the public directory.
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
### Import data, generate additional data, and create file
$file = $location . "/content_files/dynamic_other_files/humans.txt_additional_values.txt";
$value = array();
#### Add generated content
// Add date
date_default_timezone_set('UTC');
$date = date("Y-m-d");
$value['site'] = "Last update: {$date}";
#### Add imported content
require_once $location . '/dependencies/ritchey_get_all_lines_by_prefix_and_tags_i1_v1/ritchey_get_all_lines_by_prefix_and_tags_i1_v1.php';
$imported_values = ritchey_get_all_lines_by_prefix_and_tags_i1_v1($file, 'Content:', '"', TRUE);
foreach ($imported_values as &$item){
	$item = explode(PHP_EOL, $item);
	$section = substr($item[0], 3, -3);
	$item[0] = '';
	$content = trim(implode(PHP_EOL, $item));
	$value[$section] = $content;
}
unset($item);
#### Add Sections
foreach ($value as $key => &$item) {
	$item = '/* '. strtoupper($key) . ' */' . PHP_EOL . $item . PHP_EOL;
}
unset($item);
$value = trim(implode(PHP_EOL, $value));
$destination = "{$location}{$global_configuration_info['public_folder']}/humans.txt";
@file_put_contents($destination, $value);	
//var_dump($files);
## Cleanup
// Do nothing
?>