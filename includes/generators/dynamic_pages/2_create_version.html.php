<?php
# Meta
// Name: Create Version.html
// Description: Generates info, and uses it to create '/pages/version.html' in the public directory.
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
### Get timestamp to use as version ID
date_default_timezone_set('UTC');
$date = date("F j, Y H:i:s");
$date_timestamp = strtotime($date);
$site_version = "v{$date_timestamp}";
### Get application name, and version
require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
$generator_long_identifier = ritchey_get_line_by_prefix_i1_v3("{$location}/About.txt", 'LONG IDENTIFIER: ', FALSE, FALSE, TRUE);
$value =  <<<HEREDOC
<h1>Version</h1>
<div><span class='label_text'>Site Version:</span><span class='label_value'>{$site_version}</span></div>
<div><span class='label_text'>Site Generator:</span><span class='label_value'>{$generator_long_identifier}</span></div>
HEREDOC;
	$page_name = 'Statistics';
	$content_1 = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		{$value}
	</div>
</div>
HEREDOC;
$destination = "{$location}{$global_configuration_info['public_folder']}/pages/version.html";
$page_title = $global_configuration_info['site_name'] . ' - Page - ' . $page_name;
$style_sheet = @strtolower($page_name); // Make string lowercase only
$style_sheet = @preg_replace('/\s+/', '_', $style_sheet); // Replace white space with a single underscore
$style_sheet = @preg_replace('/[^a-z0-9_]/', '', $style_sheet); // Delete all characters except [a-z][0-9]_
$css_file_path = $location . "/content_files/assets/localized/{$style_sheet}.css.txt";
if (@is_file($css_file_path) === TRUE){
	$localized_css = <<<HEREDOC
<link rel="stylesheet" href="{$localized_configuration_info['address']}/assets/localized/{$style_sheet}.css">
HEREDOC;
} else {
	$localized_css = '<!-- There is no localized CSS sheet for this page. -->';
}
eval(@substr(@file_get_contents("{$location}/evals/html_layouts/html_layout_1.php"), 5, -2));
@file_put_contents($destination, $html_layout);
//var_dump($files);
## Cleanup
// Do nothing
?>