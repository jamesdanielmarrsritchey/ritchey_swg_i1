<?php
# Meta
// Name: Create Sitemap Files
// Description: Create a siteindex file, and sitemap files for all HTML files in the public repository, excluding downloads.
// Status: Stable
// UUID: cc093958, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_cc093958_n_num = 1;
$var_cc093958_location_str = realpath(dirname(__FILE__, $var_cc093958_n_num));
while (is_file("{$var_cc093958_location_str}/application.php") !== TRUE) {
	$var_cc093958_n_num++;
	$var_cc093958_location_str = realpath(dirname(__FILE__, $var_cc093958_n_num));
	if ($var_cc093958_n_num > 50){
		exit(1);
	}
}
$var_cc093958_location_str = realpath(dirname($var_cc093958_location_str, 1));
eval(substr(file_get_contents("{$var_cc093958_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
$var_cc093958_entries_arr = array();
### Create array of webpages
require_once $var_cc093958_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_cc093958_pages_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}", NULL, '.html', TRUE);
foreach ($var_cc093958_pages_arr as &$var_cc093958_item_str){
	if (strpos(str_replace($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path'], '', $var_cc093958_item_str), '/downloads/') === FALSE){
	$var_cc093958_item_str = str_replace($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path'], $var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url'], $var_cc093958_item_str);
	$var_cc093958_entries_arr[] = <<<HEREDOC
	<url>
		<loc>{$var_cc093958_item_str}</loc>
	</url>
HEREDOC;	
	}
}
unset($var_cc093958_item_str);
### Create sitemaps with 50,000 entry limit
$var_cc093958_n1_num = 0;
$var_cc093958_entries_arr = array_chunk($var_cc093958_entries_arr, 50000, true);
foreach($var_cc093958_entries_arr as &$var_cc093958_item_str){
	$var_cc093958_n1_num++;
	$var_cc093958_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/sitemap-{$var_cc093958_n1_num}.xml";
	$var_cc093958_item_str = implode(PHP_EOL, $var_cc093958_item_str);
	$var_cc093958_item_str = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{$var_cc093958_item_str}
</urlset>
HEREDOC;	
	file_put_contents($var_cc093958_destination_str, $var_cc093958_item_str);
}
unset($var_cc093958_item_str);
$var_cc093958_sitemap_count_num = $var_cc093958_n1_num;
### Create siteindex of all sitemaps, even if siteindex is over 50,000 entry limit
$var_cc093958_siteindex_arr = array();
$var_cc093958_n2_num = 0;
while ($var_cc093958_n2_num < $var_cc093958_sitemap_count_num){
	$var_cc093958_n2_num++;
	$var_cc093958_siteindex_arr[] = <<<HEREDOC
	<sitemap>
		<loc>{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/sitemap-{$var_cc093958_n2_num}.xml</loc>
	</sitemap>
HEREDOC;	
}
$var_cc093958_siteindex_str = implode(PHP_EOL, $var_cc093958_siteindex_arr);
$var_cc093958_siteindex_str = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	{$var_cc093958_siteindex_str}
</sitemapindex>
HEREDOC;
$var_cc093958_destination_str = "{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['public_folder_path']}/sitemap_index.xml";
file_put_contents($var_cc093958_destination_str, $var_cc093958_siteindex_str);
## Cleanup
//goto goto_cc093958_cleaup;
goto_cc093958_cleaup:
// Do nothing
## Exit
//goto goto_cc093958_end;
goto_cc093958_end:
?>