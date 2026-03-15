<?php
# Meta
// Name: Create Items Database
// Description: Imports the information, and uses it to generate database files, the public directory.
# Content
## Prep
$idc0719d81_n = 1;
$idc0719d81_location = realpath(dirname(__FILE__, $idc0719d81_n));
while (is_file("{$idc0719d81_location}/app.php") !== TRUE) {
	$idc0719d81_n++;
	$idc0719d81_location = realpath(dirname(__FILE__, $idc0719d81_n));
	if ($idc0719d81_n > 50){
		exit(1);
	}
}
eval(@substr(@file_get_contents("{$idc0719d81_location}/evals/configuration_info_importers/import_global_configuration_info.php"), 5, -2));
## Task
$idc0719d81_database = array();
### Create a list of posts, and for each, import the data.
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/content_files/posts", NULL, '.txt', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_date_last_updated = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Date Last Updated: ', FALSE, FALSE, TRUE);
	$idc0719d81_date_last_updated_timestamp = strtotime($idc0719d81_date_last_updated);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Destination: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_content_description = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Content Description: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_content_thumbnail = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Content Thumbnail: ', FALSE, FALSE, TRUE);
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date_last_updated,
		"item_date_timestamp" => $idc0719d81_date_last_updated_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => $idc0719d81_content_description,
		"item_content_thumbnail" => $idc0719d81_content_thumbnail,
		"item_type" => 'post',
		"item_status" => 'exists',
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Create a list of status updates, and for each, import the data.
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/content_files/status_updates", NULL, '.txt', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_date_created = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Date Created: ', FALSE, FALSE, TRUE);
	$idc0719d81_date_created_timestamp = strtotime($idc0719d81_date_created);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Destination: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	$idc0719d81_content = ritchey_get_lines_by_prefix_i1_v1($idc0719d81_item, 'Content:', '"', 1, TRUE);
	$idc0719d81_content_thumbnail = "/assets/localized/Status Update Icon v3 - 400x400.jpg";
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date_created,
		"item_date_timestamp" => $idc0719d81_date_created_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => $idc0719d81_content,
		"item_content_thumbnail" => $idc0719d81_content_thumbnail,
		"item_type" => 'status update',
		"item_status" => 'exists',
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Create a list of links, and for each, import the data.
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/content_files/links", NULL, '.txt', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	date_default_timezone_set('UTC');
	$idc0719d81_date = date("F j, Y");
	$idc0719d81_date_timestamp = strtotime($idc0719d81_date);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Destination: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_content = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Content: ', FALSE, FALSE, TRUE);
	$idc0719d81_content = "<a href='{$idc0719d81_content}'>{$idc0719d81_content}</a>";
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_icon = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Icon: ', FALSE, FALSE, TRUE);
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date,
		"item_date_timestamp" => $idc0719d81_date_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => $idc0719d81_content,
		"item_content_thumbnail" => $idc0719d81_icon,
		"item_type" => 'link',
		"item_status" => 'exists',
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Create a list of pages, and for each, import the data.
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/content_files/static_pages", NULL, '.txt', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	date_default_timezone_set('UTC');
	$idc0719d81_date = date("F j, Y");
	$idc0719d81_date_timestamp = strtotime($idc0719d81_date);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Destination: ', FALSE, FALSE, TRUE);
	require_once $location . '/dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
	$idc0719d81_content_thumbnail = "/assets/localized/Page Icon - 400x400.jpg";
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date,
		"item_date_timestamp" => $idc0719d81_date_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => 'A webpage.',
		"item_content_thumbnail" => $idc0719d81_content_thumbnail,
		"item_type" => 'page',
		"item_status" => 'exists',
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Create a list of uploads, and for each, import the data.
function sanitize_string_v1b($input_str) {
	// Convert to lowercase
	$input_str = strtolower($input_str);
	// Replace spaces and underscores with hyphen
	$input_str = str_replace(array(" ", "_"), "-", $input_str);
	// Remove everything that is not a letter, number, or hyphen
	$input_str = preg_replace("/[^a-z0-9-]/", "", $input_str);
	// Remove duplicate hyphens
	$input_str = preg_replace("/-+/", "-", $input_str);
	// Trim hyphens from start and end
	$input_str = trim($input_str, "-");
	return $input_str;
}
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/uploads", NULL, '.meta', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_date_uploaded = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Date Uploaded: ', FALSE, FALSE, TRUE);
	$idc0719d81_date_uploaded_timestamp = strtotime($idc0719d81_date_uploaded);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	$idc0719d81_destination = sanitize_string_v1b($idc0719d81_destination) . '.html';
	$idc0719d81_destination = "/uploads/" . $idc0719d81_destination;
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_content_type = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Content Type: ', FALSE, FALSE, TRUE);
	$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Unknown - 400x400.jpg";
	if ($idc0719d81_content_type === 'Image'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Image - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Video'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Video - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Document'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Document v2 - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Archive'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Archive - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Disc Image'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Disc Image - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Disk Image'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Disk Image - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Software'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Software - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Script'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Script - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Web Document'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Web Document - 400x400.jpg";
	} else if ($idc0719d81_content_type === 'Filesystem Archive'){
		$idc0719d81_content_thumbnail = "/assets/localized/Upload Thumbnail - Disk Image - 400x400.jpg";
	}
	// Check if it exists in both the uploads directory and the public downloads directory. This means the copying script must run before this one.
	if (file_exists(substr($idc0719d81_item, 0, -5)) === TRUE){
		$idc0719d81_item_filename = basename(substr($idc0719d81_item, 0, -5));
		if (file_exists("{$location}{$global_configuration_info['downloads_folder']}/{$idc0719d81_item_filename}") === TRUE){
			$idc0719d81_status = 'exists';
		} else {
			$idc0719d81_status = 'removed';
		}
	} else {
		$idc0719d81_status = 'removed';
	}
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date_uploaded,
		"item_date_timestamp" => $idc0719d81_date_uploaded_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => "A {$idc0719d81_content_type} file upload.",
		"item_content_thumbnail" => $idc0719d81_content_thumbnail,
		"item_type" => 'upload',
		"item_content_type" => $idc0719d81_content_type,
		"item_status" => $idc0719d81_status,
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Create a list of other resources, and for each, import the data. Keep in mind this needs to use the name from the configuration file!
require_once $idc0719d81_location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$idc0719d81_files = ritchey_list_files_with_prefix_postfix_i1_v1("{$idc0719d81_location}/content_files/other_resources", NULL, '.txt', TRUE);
foreach ($idc0719d81_files as &$idc0719d81_item){
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_name = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Name: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_date_created = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Date Created: ', FALSE, FALSE, TRUE);
	$idc0719d81_date_created_timestamp = strtotime($idc0719d81_date_created);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_destination = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Destination: ', FALSE, FALSE, TRUE);
	require_once $idc0719d81_location . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
	$idc0719d81_content = ritchey_get_line_by_prefix_i1_v3($idc0719d81_item, 'Content: ', FALSE, FALSE, TRUE);
	$idc0719d81_content = "<a href='{$idc0719d81_content}'>{$idc0719d81_content}</a>";
	$idc0719d81_content_thumbnail = "/assets/localized/Default Link Icon - 400x400.jpg";
	$idc0719d81_database_value = array(
		"item_name" => $idc0719d81_name,
		"item_date" => $idc0719d81_date_created,
		"item_date_timestamp" => $idc0719d81_date_created_timestamp,
		"item_destination" => $idc0719d81_destination,
		"item_content" => $idc0719d81_content,
		"item_content_thumbnail" => $idc0719d81_content_thumbnail,
		"item_type" => $global_configuration_info['other_resources_type'],
		"item_status" => 'exists',
	);
	$idc0719d81_database_key = hash('sha3-512', implode(PHP_EOL, $idc0719d81_database_value));
	$idc0719d81_database[$idc0719d81_database_key] = $idc0719d81_database_value;
}
unset($idc0719d81_item);
### Sort the database entries by item timestamps with older items first
$idc0719d81_database_chronological = $idc0719d81_database;
foreach ($idc0719d81_database_chronological as &$idc0719d81_item){
	$idc0719d81_item = intval($idc0719d81_item['item_date_timestamp']);
}
unset($idc0719d81_item);
asort($idc0719d81_database_chronological, SORT_NUMERIC);
foreach ($idc0719d81_database_chronological as $idc0719d81_key => $idc0719d81_value) {
    $idc0719d81_database_chronological[$idc0719d81_key] = $idc0719d81_database[$idc0719d81_key];
}
### Duplicate the database and reverse it so the newest items are first
$idc0719d81_database_reverse_chronological = array_reverse($idc0719d81_database_chronological, true);
### Count database entries and add value
$idc0719d81_n = 0;
$idc0719d81_total = count($idc0719d81_database_reverse_chronological);
foreach ($idc0719d81_database_reverse_chronological as &$idc0719d81_item){
	$idc0719d81_n++;
	$idc0719d81_item['item_number'] = "{$idc0719d81_n} of {$idc0719d81_total}";
}
unset($idc0719d81_item);
$idc0719d81_n = 0;
$idc0719d81_total = count($idc0719d81_database_chronological);
foreach ($idc0719d81_database_chronological as &$idc0719d81_item){
	$idc0719d81_n++;
	$idc0719d81_item['item_number'] = "{$idc0719d81_n} of {$idc0719d81_total}";
}
unset($idc0719d81_item);
### Encode entries in JSON, and write to files
$idc0719d81_n = 0;
foreach ($idc0719d81_database_reverse_chronological as &$idc0719d81_item){
	$idc0719d81_item = json_encode($idc0719d81_item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
	$idc0719d81_n++;
	if (@is_dir("{$location}{$global_configuration_info['public_folder']}/databases/reverse_chronological") === TRUE){
		// Do nothing
	} else {
		mkdir("{$location}{$global_configuration_info['public_folder']}/databases/reverse_chronological", 0777, true);
	}
	file_put_contents("{$location}{$global_configuration_info['public_folder']}/databases/reverse_chronological/{$idc0719d81_n}.json", $idc0719d81_item);
}
unset($idc0719d81_item);
$idc0719d81_n = 0;
foreach ($idc0719d81_database_chronological as &$idc0719d81_item){
	$idc0719d81_item = json_encode($idc0719d81_item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
	$idc0719d81_n++;
	if (@is_dir("{$location}{$global_configuration_info['public_folder']}/databases/chronological") === TRUE){
		// Do nothing
	} else {
		mkdir("{$location}{$global_configuration_info['public_folder']}/databases/chronological", 0777, true);
	}
	file_put_contents("{$location}{$global_configuration_info['public_folder']}/databases/chronological/{$idc0719d81_n}.json", $idc0719d81_item);
}
unset($idc0719d81_item);
### Create database.js file which provides information about database size
if (@is_dir("{$location}{$global_configuration_info['public_folder']}/databases") === TRUE){
	// Do nothing
} else {
	mkdir("{$location}{$global_configuration_info['public_folder']}/databases", 0777, true);
}
$idc0719d81_content = "database_size_gvar = '{$idc0719d81_total}';";
file_put_contents("{$location}{$global_configuration_info['public_folder']}/databases/database-meta.js", $idc0719d81_content);
## Cleanup
// Do nothing
?>