<?php
# Meta
// Name: Create .htaccess
// Description: Generate the .htaccess file in the public directory.
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
$value = array();
#### Add generated content
$value['404 Page'] = "ErrorDocument 404 {$global_configuration_info['address']}/404.html";
#### Add Sections
foreach ($value as $key => &$item) {
	$item = $item . PHP_EOL;
}
unset($item);
$value = trim(implode(PHP_EOL, $value));
$destination = "{$location}{$global_configuration_info['public_folder']}/.htaccess";
@file_put_contents($destination, $value);	
//var_dump($files);
## Cleanup
// Do nothing
?>