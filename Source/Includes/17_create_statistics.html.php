<?php
# Meta
// Name: Create Statistics
// Description: Create statistics HTML file "/www/public/widget-pages/statistics.html"
// Status: Stable
// UUID: 8092da32, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_8092da32_n_num = 1;
$var_8092da32_location_str = realpath(dirname(__FILE__, $var_8092da32_n_num));
while (is_file("{$var_8092da32_location_str}/application.php") !== TRUE) {
	$var_8092da32_n_num++;
	$var_8092da32_location_str = realpath(dirname(__FILE__, $var_8092da32_n_num));
	if ($var_8092da32_n_num > 50){
		exit(1);
	}
}
$var_8092da32_location_str = realpath(dirname($var_8092da32_location_str, 1));
eval(substr(file_get_contents("{$var_8092da32_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Create a list of upload pages, link pages, post pages, status-update pages, other-resource pages, and widget pages + navigation pages + regular pages + index.html
require_once $var_8092da32_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_8092da32_link_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/link-pages", NULL, '.html', TRUE);
$var_8092da32_link_pages_count_num = count($var_8092da32_link_pages_arr);
$var_8092da32_post_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/post-pages", NULL, '.html', TRUE);
$var_8092da32_post_pages_count_num = count($var_8092da32_post_pages_arr);
$var_8092da32_status_update_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/status-update-pages", NULL, '.html', TRUE);
$var_8092da32_status_update_pages_count_num = count($var_8092da32_status_update_pages_arr);
$var_8092da32_other_resource_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/other-resource-pages", NULL, '.html', TRUE);
$var_8092da32_other_resource_pages_count_num = count($var_8092da32_other_resource_pages_arr);
$var_8092da32_upload_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/upload-pages", NULL, '.html', TRUE);
$var_8092da32_upload_pages_count_num = count($var_8092da32_upload_pages_arr);
$var_8092da32_general_pages_arr = array();
$var_8092da32_widget_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages", NULL, '.html', TRUE);
require_once $var_8092da32_location_str . '/Source/Custom Dependencies/merge_arrays_reindex_i1_v2.php';
$var_8092da32_general_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_8092da32_general_pages_arr, $var_8092da32_widget_pages_arr);
$var_8092da32_navigation_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/navigation-pages", NULL, '.html', TRUE);
$var_8092da32_general_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_8092da32_general_pages_arr, $var_8092da32_navigation_pages_arr);
$var_8092da32_regular_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/regular-pages", NULL, '.html', TRUE);
$var_8092da32_general_pages_arr = fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_8092da32_general_pages_arr, $var_8092da32_regular_pages_arr);
$var_8092da32_general_pages_count_num = count($var_8092da32_general_pages_arr) + 1;
$var_8092da32_item_content_str = <<<HEREDOC
<div class='item_holder'>
<span class="item_label">Pages:</span><span class="item_value">{$var_8092da32_general_pages_count_num}</span>
</div>
<div class='item_holder'>
<span class="item_label">Posts:</span><span class="item_value">{$var_8092da32_post_pages_count_num}</span>
</div>
<div class='item_holder'>
<span class="item_label">Status Updates:</span><span class="item_value">{$var_8092da32_status_update_pages_count_num}</span>
</div>
<div class='item_holder'>
<span class="item_label">Links:</span><span class="item_value">{$var_8092da32_link_pages_count_num}</span>
</div>
<div class='item_holder'>
<span class="item_label">{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['other_resources_label']}:</span><span class="item_value">{$var_8092da32_other_resource_pages_count_num}</span>
</div>
<div class='item_holder'>
<span class="item_label">Uploads:</span><span class="item_value">{$var_8092da32_upload_pages_count_num}</span>
</div>
HEREDOC;
$var_8092da32_item_name_str = 'Statistics';
$var_8092da32_item_type_str = 'Widget Page';
$var_8092da32_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/statistics.html";
// Define date element by page type
$var_8092da32_item_dates_str = '';
// Define content for eval
$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>{$var_8092da32_item_name_str}</h1>
		<div class='dates_holder'>{$var_8092da32_item_dates_str}</div>
		<div class='item_content'>{$var_8092da32_item_content_str}</div>
	</div>
</div>
HEREDOC;	
// Define other variables passed to eval
if (file_exists("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_name_str} CSS.conf") === TRUE){
	$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
} else {
	$var_c836c568_item_css_str = '';
}
$var_c836c568_item_type_css_str = '';
if (file_exists("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_type_str}s CSS.conf") === TRUE){
	$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
} else {
	$var_c836c568_item_type_css_str = '';	
}
$var_c836c568_item_js_str = '';
if (file_exists("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_name_str} JS.conf") === TRUE){
	$var_c836c568_item_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_name_str} JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_js_str}'></script>";
} else {
	$var_c836c568_item_js_str = '';
}
$var_c836c568_item_type_js_str = '';
if (file_exists("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_type_str}s JS.conf") === TRUE){
	$var_c836c568_item_type_js_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_8092da32_location_str}/Source/Content Inputs/Assets/{$var_8092da32_item_type_str}s JS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_type_js_str = "<script src='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_js_str}'>";
} else {
	$var_c836c568_item_type_js_str = '';	
}
$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_8092da32_item_type_str} - {$var_8092da32_item_name_str}";
if ($var_8092da32_item_name_str === 'Statistics' || $var_8092da32_item_name_str === 'Navigation' || $var_8092da32_item_name_str === 'Landing' || $var_8092da32_item_name_str === '404' || $var_8092da32_item_name_str === 'Legal' || $var_8092da32_item_name_str === 'Search'){
	$var_c836c568_page_bio_switch_boo = TRUE;
}
// Do eval
eval(substr(file_get_contents("{$var_8092da32_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
// Create file
file_put_contents($var_8092da32_item_destination_str, $var_c836c568_page_html_layout_str);
## Cleanup
//goto goto_8092da32_cleaup;
goto_8092da32_cleaup:
// Do nothing
## Exit
//goto goto_8092da32_end;
goto_8092da32_end:
?>