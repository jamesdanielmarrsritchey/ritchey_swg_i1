<?php
# Meta
// Name: Create global-variables.js
// Description: Generate the '/assets/global/global-variables.js' file in the public directory.
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
### Import data from global configuration info, and create file
$value = array();
#### Add imported content
foreach ($global_configuration_info as $key => $item){
	if ($key == 'private_folder'){
		// Do not add the value, because it isn't needed client-side
	} else if ($key == 'public_folder'){
		// Do not add the value, because it isn't needed client-side
	} else if ($key == 'downloads_folder'){
		// Do not add the value, because it isn't needed client-side
	} else {
		$value[] = "\t" . "{$key}_gvar='{$item}';";
	}
}
unset($item);
$value = trim(implode(PHP_EOL, $value));
$value = <<<HEREDOC
function set_global_variables_v1() {
	{$value}
}
HEREDOC;
$destination = "{$location}{$global_configuration_info['public_folder']}/assets/global/global-variables.js";
@file_put_contents($destination, $value);	
//var_dump($value);
## Cleanup
// Do nothing
?>