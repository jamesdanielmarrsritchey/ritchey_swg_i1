<?php
# Meta
// Name: Create Statistics.html
// Description: Generates info, and uses it to create '/pages/statistics.html' in the public directory.
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
### Create a count of uploads, status updates, other resources, and a count of posts, and generate the file.
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/posts", NULL, '.txt', TRUE);
$quantity_of_posts = count($files);
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/status_updates", NULL, '.txt', TRUE);
$quantity_of_status_updates = count($files);
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/other_resources", NULL, '.txt', TRUE);
$quantity_of_other_resources = count($files);
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/uploads", NULL, '.meta', TRUE);
$quantity_of_uploads = count($files);
$value =  <<<HEREDOC
<h1>Statistics</h1>
<div><span class='label_text'>Total Status Updates:</span><span class='label_value'>{$quantity_of_status_updates}</span></div>
<div><span class='label_text'>Total Posts:</span><span class='label_value'>{$quantity_of_posts}</span></div>
<div><span class='label_text'>Total Uploads:</span><span class='label_value'>{$quantity_of_uploads}</span></div>
<div><span class='label_text'>Total <span id='other_resources'>Other Resources</span>:</span><span class='label_value'>{$quantity_of_other_resources}</span></div>
<script>
var other_resources_el = document.getElementById('other_resources');
other_resources_el.textContent = '' + capitalize_words_v2(other_resources_type_gvar);
</script>
HEREDOC;
	$page_name = 'Statistics';
	$content_1 = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		{$value}
	</div>
</div>
HEREDOC;
$destination = "{$location}{$global_configuration_info['public_folder']}/pages/statistics.html";
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