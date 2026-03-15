<?php
# Meta
// Name: Create Meta Files For Uploads
// Description: Checks if each upload in '/Source/Uploads' has a metadata file, and if not, it creates one. Metafiles hold additional information about uploads, such as when they were uploaded, their checksums, and names.
// Status: Stable
# Content
## Prep
$var_5e194c72_n_num = 1;
$var_c53a26e9_location_str = realpath(dirname(__FILE__, $var_5e194c72_n_num));
while (is_file("{$var_c53a26e9_location_str}/application.php") !== TRUE) {
	$var_5e194c72_n_num++;
	$var_c53a26e9_location_str = realpath(dirname(__FILE__, $var_5e194c72_n_num));
	if ($var_5e194c72_n_num > 50){
		exit(1);
	}
}
$var_c53a26e9_location_str = realpath(dirname($var_c53a26e9_location_str, 1));
eval(substr(file_get_contents("{$var_c53a26e9_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2));
## Task
require_once $var_c53a26e9_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_ed07b65e_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_c53a26e9_location_str}/Source/Uploads", NULL, NULL, TRUE);
foreach ($var_ed07b65e_files_arr as &$var_ea1cebfe_item_str){
	if (substr($var_ea1cebfe_item_str, -5) !== '.meta' && substr($var_ea1cebfe_item_str, -14) !== '.thumbnail.jpg' && is_file("{$var_ea1cebfe_item_str}.meta") !== TRUE){
		$var_54c6ab7a_destination_str = "{$var_ea1cebfe_item_str}.meta";
		$var_5b92a49f_value_arr = array();
		// Name
		$var_25b24456_file_extension_str = pathinfo($var_ea1cebfe_item_str);
		$var_25b24456_file_extension_str = $var_25b24456_file_extension_str['extension'];
		$var_5b319626_name_str = basename($var_ea1cebfe_item_str, ".{$var_25b24456_file_extension_str}");
		$var_5b319626_name_str = preg_replace('/[^a-zA-Z0-9- ]/', ' ', $var_5b319626_name_str);
		require_once $var_c53a26e9_location_str . '/Source/Custom Dependencies/remove_extra_spaces_v1.php';
		$var_5b319626_name_str = fun_a7c3f9e8b4d24c1e9f6a2b3c4d5e6f70_remove_extra_spaces_v1($var_5b319626_name_str);
		$var_5b319626_name_str = ucwords($var_5b319626_name_str);
		$var_5b92a49f_value_arr[] = "Name: " . $var_5b319626_name_str . PHP_EOL;	
		// Filename
		$var_5b92a49f_value_arr[] = "Filename: " . basename($var_ea1cebfe_item_str) . PHP_EOL;
		// Date Uploaded
		require_once $var_c53a26e9_location_str . '/Source/Custom Dependencies/get_current_dates_v1.php';
		$var_01759e6b_date_uploaded_arr = fun_c8a4e19d_get_current_dates_v1(NULL);
		$var_5b92a49f_value_arr[] = "Date Uploaded: {$var_01759e6b_date_uploaded_arr['iso_8601_2000_extended_format']}" . PHP_EOL;
		// Checksums
		$var_5b92a49f_value_arr[] = "SHA3-256: " . hash_file('sha3-256', $var_ea1cebfe_item_str) . PHP_EOL;
		$var_5b92a49f_value_arr[] = "SHA-256: " . hash_file('sha256', $var_ea1cebfe_item_str) . PHP_EOL;
		$var_5b92a49f_value_arr[] = "MD5: " . hash_file('md5', $var_ea1cebfe_item_str) . PHP_EOL;
		$var_5b92a49f_value_arr[] = "SHA-1: " . hash_file('sha1', $var_ea1cebfe_item_str) . PHP_EOL;
		$var_5b92a49f_value_arr[] = "CRC32: " . hash_file('crc32', $var_ea1cebfe_item_str) . PHP_EOL;
		// Content Type
		$var_25b24456_file_extension_str = pathinfo($var_ea1cebfe_item_str);
		$var_25b24456_file_extension_str = $var_25b24456_file_extension_str['extension'];
		if ($var_25b24456_file_extension_str === 'jpg' OR $var_25b24456_file_extension_str === 'webp' OR $var_25b24456_file_extension_str === 'png'){
			$var_5f9ffde5_content_type_str = 'Image';
		} else if ($var_25b24456_file_extension_str === 'mp4' OR $var_25b24456_file_extension_str === 'mkv' OR $var_25b24456_file_extension_str === 'webm' OR $var_25b24456_file_extension_str === 'avi'){
			$var_5f9ffde5_content_type_str = 'Video';
		} else if ($var_25b24456_file_extension_str === 'txt' OR $var_25b24456_file_extension_str === 'odt' OR $var_25b24456_file_extension_str === 'docx' OR $var_25b24456_file_extension_str === 'pdf'){
			$var_5f9ffde5_content_type_str = 'Document';
		} else if ($var_25b24456_file_extension_str === 'zip' OR $var_25b24456_file_extension_str === 'tar' OR $var_25b24456_file_extension_str === 'gz' OR $var_25b24456_file_extension_str === 'xz' OR $var_25b24456_file_extension_str === 'bz2'){
			$var_5f9ffde5_content_type_str = 'Archive';
		} else if ($var_25b24456_file_extension_str === 'iso'){
			$var_5f9ffde5_content_type_str = 'Disc Image';
		} else if ($var_25b24456_file_extension_str === 'img'){
			$var_5f9ffde5_content_type_str = 'Disk Image';
		} else if ($var_25b24456_file_extension_str === 'deb' OR $var_25b24456_file_extension_str === 'exe' OR $var_25b24456_file_extension_str === 'AppImage'){
			$var_5f9ffde5_content_type_str = 'Software';
		} else if ($var_25b24456_file_extension_str === 'js' OR $var_25b24456_file_extension_str === 'sh' OR $var_25b24456_file_extension_str === 'php'){
			$var_5f9ffde5_content_type_str = 'Script';
		} else if ($var_25b24456_file_extension_str === 'html' OR $var_25b24456_file_extension_str === 'css' OR $var_25b24456_file_extension_str === 'xml'){
			$var_5f9ffde5_content_type_str = 'Web Document';
		} else if ($var_25b24456_file_extension_str === 'squashfs'){
			$var_5f9ffde5_content_type_str = 'Filesystem Archive';
		} else {
			$var_5f9ffde5_content_type_str = '';
		}
		$var_5b92a49f_value_arr[] = "Content Type: " . $var_5f9ffde5_content_type_str . PHP_EOL;	
		// Icon
		if ($var_5f9ffde5_content_type_str === 'Image'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Image - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Video'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Video - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Document'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Document v2 - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Archive'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Archive - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Disc Image'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Disc Image - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Disk Image'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Disk Image - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Software'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Software - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Script'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Script - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'Web Document'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Web Document - 400x400.jpg" . PHP_EOL;	
		} else if ($var_5f9ffde5_content_type_str === 'squashfs'){
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Unknown - 400x400.jpg" . PHP_EOL;	
		} else {
			$var_5b92a49f_value_arr[] = "Icon: /assets/Upload Icon - Unknown - 400x400.jpg" . PHP_EOL;	
		}
		// Thumbnail (If present)
		if (is_file("{$var_ea1cebfe_item_str}.thumbnail.jpg") === TRUE){
			$var_454eaa26_thumbnail_web_path_str = "/assets/" . basename("{$var_ea1cebfe_item_str}.thumbnail.jpg");
			$var_5b92a49f_value_arr[] = "Thumbnail: " . $var_454eaa26_thumbnail_web_path_str . PHP_EOL;	
		} else {
			$var_5b92a49f_value_arr[] = "Thumbnail: ";
		}
		$var_5b92a49f_value_str = implode($var_5b92a49f_value_arr);
		file_put_contents($var_54c6ab7a_destination_str, $var_5b92a49f_value_str);	
	}
}
unset($var_ea1cebfe_item_str);
## Cleanup
//goto goto_755f6c66_cleaup;
goto_755f6c66_cleaup:
// Do nothing
## Exit
//goto goto_a5747823_end;
goto_a5747823_end:
?>