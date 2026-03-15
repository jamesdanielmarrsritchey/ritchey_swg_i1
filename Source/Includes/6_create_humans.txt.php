<?php
# Meta
// Name: Create humans.txt
// Description: Copies pre-made assets to the assets folder. Does not deal with assets generated from content inputs.
// Status: Stable
// UUID: f11ac72e, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_f11ac72e_n_num = 1;
$var_f11ac72e_location_str = realpath(dirname(__FILE__, $var_f11ac72e_n_num));
while (is_file("{$var_f11ac72e_location_str}/application.php") !== TRUE) {
	$var_f11ac72e_n_num++;
	$var_f11ac72e_location_str = realpath(dirname(__FILE__, $var_f11ac72e_n_num));
	if ($var_f11ac72e_n_num > 50){
		exit(1);
	}
}
$var_f11ac72e_location_str = realpath(dirname($var_f11ac72e_location_str, 1));
eval(substr(file_get_contents("{$var_f11ac72e_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
### Get content from content input file
require_once $var_f11ac72e_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
$var_f11ac72e_item_source_str = $var_f11ac72e_location_str . '/Source/Content Inputs/Unclassified/Humans.conf2';
$var_f11ac72e_item_value_str = ritchey_get_lines_by_prefix_i1_v1($var_f11ac72e_item_source_str, 'Content:', '"', NULL, TRUE);
require_once $var_f11ac72e_location_str . '/Source/Dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
$var_f11ac72e_item_destination_str = ritchey_get_line_by_prefix_i1_v3($var_f11ac72e_item_source_str, 'Destination: ', FALSE, FALSE, TRUE);
$var_f11ac72e_item_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/{$var_f11ac72e_item_destination_str}";
### Generate additional content
// Get the date in YYYY-MM-DD format
require_once $var_f11ac72e_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
$var_f11ac72e_date_arr = fun_c8a4e19d_get_current_dates_v1();
$var_f11ac72e_date_str = str_replace('-', '/', $var_f11ac72e_date_arr['iso_8601_2000_extended_format']);
$var_f11ac72e_item_value_str = <<<HEREDOC
{$var_f11ac72e_item_value_str}
/* SITE */
Last update: {$var_f11ac72e_date_str}
Standards: HTML5, CSS3, Javascript
HEREDOC;
### Generate humans.txt file
file_put_contents($var_f11ac72e_item_destination_str, $var_f11ac72e_item_value_str);	
## Cleanup
//goto goto_f11ac72e_cleaup;
goto_f11ac72e_cleaup:
// Do nothing
## Exit
//goto goto_f11ac72e_end;
goto_f11ac72e_end:
?>