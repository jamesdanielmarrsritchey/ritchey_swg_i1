<?php
# Meta
// Name: Create Version.html
// Description: Create webpage "version.html"
// Status: Stable
// UUID: 2e0a9b4a, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_2e0a9b4a_n_num = 1;
$var_2e0a9b4a_location_str = realpath(dirname(__FILE__, $var_2e0a9b4a_n_num));
while (is_file("{$var_2e0a9b4a_location_str}/application.php") !== TRUE) {
	$var_2e0a9b4a_n_num++;
	$var_2e0a9b4a_location_str = realpath(dirname(__FILE__, $var_2e0a9b4a_n_num));
	if ($var_2e0a9b4a_n_num > 50){
		exit(1);
	}
}
$var_2e0a9b4a_location_str = realpath(dirname($var_2e0a9b4a_location_str, 1));
eval(substr(file_get_contents("{$var_2e0a9b4a_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Get the current date, and generate the file.
require_once $var_2e0a9b4a_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
$var_2e0a9b4a_item_date_arr = fun_c8a4e19d_get_current_dates_v1();
$var_2e0a9b4a_item_version_str = <<<HEREDOC
<div class='item_checksum_holder'>
	<span class='item_label'>Website Version:</span><span class='item_value'>v{$var_2e0a9b4a_item_date_arr['ritchey_date_format_full']}</span>
</div>
HEREDOC;
require_once $var_2e0a9b4a_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
$var_2e0a9b4a_item_generator_str = ritchey_get_line_by_prefix_i1_v3("{$var_2e0a9b4a_location_str}/Meta/Meta.txt", 'LONG IDENTIFIER: ', FALSE, FALSE, TRUE);
$var_2e0a9b4a_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/widget-pages/version.html";
$var_2e0a9b4a_item_type_str = 'Widget Page';
$var_2e0a9b4a_item_name_str = 'Version';
$var_2e0a9b4a_item_dates_str = '';
$var_2e0a9b4a_item_content_str = $var_2e0a9b4a_item_version_str;
// Define content for eval
$var_c836c568_page_content_1_str = <<<HEREDOC
<div class='section_outter no_print' id='content_1_outter'>
	<div class='section_inner' id='content_1_inner'>
		<h1 class='headings_1'>{$var_2e0a9b4a_item_name_str}</h1>
		<div class='dates_holder'>{$var_2e0a9b4a_item_dates_str}</div>
		<div class='item_content'>{$var_2e0a9b4a_item_content_str}</div>
	</div>
</div>
HEREDOC;	
// Define other variables passed to eval
$var_c836c568_item_css_str = '';
if (file_exists("{$var_2e0a9b4a_location_str}/Source/Content Inputs/Assets/{$var_2e0a9b4a_item_name_str} CSS.conf") === TRUE){
	$var_c836c568_item_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_2e0a9b4a_location_str}/Source/Content Inputs/Assets/{$var_2e0a9b4a_item_name_str} CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_css_str}'>";
} else {
	$var_c836c568_item_css_str = '';
}
$var_c836c568_item_type_css_str = '';
if (file_exists("{$var_2e0a9b4a_location_str}/Source/Content Inputs/Assets/{$var_2e0a9b4a_item_type_str}s CSS.conf") === TRUE){
	$var_c836c568_item_type_css_str = trim(ritchey_get_line_by_prefix_i1_v3("{$var_2e0a9b4a_location_str}/Source/Content Inputs/Assets/{$var_2e0a9b4a_item_type_str}s CSS.conf", 'Destination: ', FALSE, FALSE, TRUE));
	$var_c836c568_item_type_css_str = "<link rel='stylesheet' href='{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}{$var_c836c568_item_type_css_str}'>";
} else {
	$var_c836c568_item_type_css_str = '';	
}
$var_c836c568_page_title_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} - {$var_2e0a9b4a_item_type_str} - {$var_2e0a9b4a_item_name_str}";
$var_c836c568_page_bio_switch_boo = TRUE;
// Do eval
eval(substr(file_get_contents("{$var_2e0a9b4a_location_str}/Source/Evals/define_html_layout.php"), 5, -2));
// Create file
file_put_contents($var_2e0a9b4a_item_destination_str, $var_c836c568_page_html_layout_str);
## Cleanup
//goto goto_2e0a9b4a_cleaup;
goto_2e0a9b4a_cleaup:
// Do nothing
## Exit
//goto goto_2e0a9b4a_end;
goto_2e0a9b4a_end:
?>