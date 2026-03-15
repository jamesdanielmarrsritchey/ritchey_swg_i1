<?php
# Meta
// Name: Create sitemap.xml
// Description: Generate the sitemap.xml file in the public directory.
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
### Generate data, and create file.
$value = array();
date_default_timezone_set('UTC');
$date = date("Y-m-d");
$value[] = '<?xml version="1.0" encoding="UTF-8"?>';
$value[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$value[] = "\t<url>\n\t\t<loc>{$global_configuration_info['address']}</loc>\n\t\t<lastmod>{$date}</lastmod>\n\t</url>";
$value[] = "\t<url>\n\t\t<loc>{$global_configuration_info['address']}/navigation.html</loc>\n\t\t<lastmod>{$date}</lastmod>\n\t</url>";
#### Create a list of pages, and for each, create an entry
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/content_files/static_pages", NULL, '.txt', TRUE);
foreach ($files as &$item){
	$page = strtolower(basename($item, '.txt'));
	if ($page !== 'index.html'){
		$value[] = "\t<url>\n\t\t<loc>{$global_configuration_info['address']}/pages/{$page}</loc>\n\t\t<lastmod>{$date}</lastmod>\n\t</url>";
	}
}
unset($item);
//var_dump($files);
$value[] = '</urlset>';
$value = @implode("\n", $value);
$destination = "{$location}{$global_configuration_info['public_folder']}/sitemap.xml";
@file_put_contents($destination, $value);	
## Cleanup
// Do nothing
?>