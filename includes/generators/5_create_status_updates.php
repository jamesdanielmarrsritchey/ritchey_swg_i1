<?php
# Meta
// Name: Create Status Updates
// Description: Imports the information stored in "/content_files/status_updates/", and uses it to generate those files in the public directory.
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
$script_id = '';
### Create a list of posts, and for each, import the data, and generate the file.
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/status_updates", NULL, '.txt', TRUE);
foreach ($files as &$item){
	require_once $location . '/dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	$value = ritchey_get_lines_by_prefix_i1_v1($item, 'Content:', '"', 1, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$post_name = ritchey_get_line_by_prefix_i1_v3($item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$date_published = ritchey_get_line_by_prefix_i1_v3($item, 'Date Published: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$date_created = ritchey_get_line_by_prefix_i1_v3($item, 'Date Created: ', FALSE, FALSE, TRUE);
	$content_1 = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<script>
		var date_published = "{$date_published}";
		console.log(date_published);
		var date_created = "{$date_created}";
		console.log(date_created);
		</script>
		<h1>{$post_name}</h1>
		<div id='status_update_meta'>Date Published: <span id='date_published'></span> <div class='comment_1'>(Date Created: <span id='date_created'></span>)</div></div>
		<script>
		document.getElementById("date_published").innerHTML = date_published;
		document.getElementById("date_created").innerHTML = date_created;
		</script>
		<div class='status_update'>
		{$value}
		</div>
	</div>
</div>
HEREDOC;
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$destination = ritchey_get_line_by_prefix_i1_v3($item, 'Destination: ', FALSE, FALSE, TRUE);
	$destination = trim($destination);
	$destination = "{$location}{$global_configuration_info['public_folder']}{$destination}";
	$page_title = $global_configuration_info['site_name'] . ' - Status Update - ' . $post_name;
	$style_sheet = @strtolower($post_name); // Make string lowercase only
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
	file_put_contents($destination, $html_layout);
}
unset($item);
//var_dump($files);
## Cleanup
// Do nothing
?>