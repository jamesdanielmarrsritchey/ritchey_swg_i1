<?php
# Meta
// Name: Other Resources
// Description: Imports the information stored in "/content_files/other_resources/", and uses it to generate those files in the public directory.
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
$script_id = 'other resources';
### Create a list of links, and for each, import the data, and generate the file.
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/other_resources", NULL, '.txt', TRUE);
foreach ($files as &$item){
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$value = ritchey_get_line_by_prefix_i1_v3($item, 'Content: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$post_name = ritchey_get_line_by_prefix_i1_v3($item, 'Name: ', FALSE, FALSE, TRUE);
	$content_1 = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
	<div id='message'>You will be automatically redirected to <a href="{$value}">{$value}</a> in <span id='seconds'>?</span> seconds. Alternatively <a href="{$value}">click here</a> to go there now. If you want to stay on this page click <button id="cancel_button">Cancel</button> to cancel automatic redirection. You will still be able to manually redirect later.</div>
	<script>
	var seconds_var = 9;
	var message_el = document.getElementById("message");
	var seconds_el = document.getElementById("seconds");
	var cancel_button_el = document.getElementById("cancel_button");
	seconds_el.innerHTML = seconds_var;

	var redirect_timer = setTimeout(function () {
		window.location.href = "{$value}";
	}, seconds_var * 1000);

	var countdown_timer = setInterval(function () {
		seconds_var--;
		seconds_el.innerHTML = seconds_var;
		if (seconds_var <= 0) clearInterval(countdown_timer);
	}, 1000);

	function cancel_redirect() {
		clearTimeout(redirect_timer);
		clearInterval(countdown_timer);
		message_el.innerHTML = "Automatic redirection has been successfully cancelled. To manually redirect to <a href='{$value}'>{$value}</a> just <a href='{$value}'>click here</a>.";
	}
	cancel_button_el.addEventListener("click", cancel_redirect);
	</script>
	</div>
</div>
HEREDOC;
	require_once $location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$destination = ritchey_get_line_by_prefix_i1_v3($item, 'Destination: ', FALSE, FALSE, TRUE);
	$destination = trim($destination);
	$destination = "{$location}{$global_configuration_info['public_folder']}{$destination}";
	$page_title = $global_configuration_info['site_name'] . ' - Link - ' . $post_name;
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