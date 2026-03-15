<?php
# Meta
// Name: Copy Uploads to Website
// Description: Clears out the uploads in public, and then copies each upload, that is below, or equal the max age, to the public uploads directory.
# Content
## Prep
$uuid_1771622871_n_num = 1;
$uuid_1771622871_location_str = realpath(dirname(__FILE__, $uuid_1771622871_n_num));
while (is_file("{$uuid_1771622871_location_str}/app.php") !== TRUE) {
	$uuid_1771622871_n_num++;
	$uuid_1771622871_location_str = realpath(dirname(__FILE__, $uuid_1771622871_n_num));
	if ($uuid_1771622871_n_num > 50){
		exit(1);
	}
}
eval(@substr(@file_get_contents("{$uuid_1771622871_location_str}/evals/configuration_info_importers/import_global_configuration_info.php"), 5, -2));
eval(@substr(@file_get_contents("{$uuid_1771622871_location_str}/evals/configuration_info_importers/import_localized_configuration_info.php"), 5, -2));
## Task
### Empty public downloads
require_once $uuid_1771622871_location_str . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$uuid_1771622871_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$uuid_1771622871_location_str}{$global_configuration_info['downloads_folder']}", NULL, NULL, TRUE);
//var_dump($uuid_1771622871_files_arr);
foreach ($uuid_1771622871_files_arr as &$uuid_1771622871_item_str){
	@unlink($uuid_1771622871_item_str);
}
unset($uuid_1771622871_item_str);
### Copy eligible uploads
require_once $uuid_1771622871_location_str . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$uuid_1771622871_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$uuid_1771622871_location_str}/uploads", NULL, NULL, TRUE);
$uuid_1771622871_n_var = 0;
foreach ($uuid_1771622871_files_arr as &$uuid_1771622871_item_str){
	if (substr($uuid_1771622871_item_str, -5) !== '.meta' AND is_file("{$uuid_1771622871_item_str}.meta") === TRUE){
		require_once $uuid_1771622871_location_str . '/dependencies/ritchey_get_line_by_prefix_i1_v3/ritchey_get_line_by_prefix_i1_v3.php';
		$uuid_1771622871_date_uploaded_obj = ritchey_get_line_by_prefix_i1_v3("{$uuid_1771622871_item_str}.meta", 'Date Uploaded: ', FALSE, FALSE, TRUE);
		$uuid_1771622871_date_uploaded_obj = new DateTime($uuid_1771622871_date_uploaded_obj);
		$uuid_1771622871_date_obj = new DateTime();
		$uuid_1771622871_diff_obj = $uuid_1771622871_date_obj->diff($uuid_1771622871_date_uploaded_obj);
		$uuid_1771622871_days_old_obj = $uuid_1771622871_diff_obj->days;
		if ($uuid_1771622871_days_old_obj <= intval($localized_configuration_info['uploads_age_limit']) || $localized_configuration_info['uploads_age_limit'] === ''){
			if ($uuid_1771622871_n_var < intval($localized_configuration_info['uploads_quantity_limit']) || $localized_configuration_info['uploads_quantity_limit'] === ''){
				$uuid_1771622871_n_var++;
				$uuid_1771622871_destination_str = "{$uuid_1771622871_location_str}{$global_configuration_info['downloads_folder']}/" . basename($uuid_1771622871_item_str);
				copy($uuid_1771622871_item_str, $uuid_1771622871_destination_str);
			}
		}
	}
}
unset($uuid_1771622871_item_str);
//var_dump($uuid_1771622871_files_arr);
## Cleanup
// Do nothing
?>