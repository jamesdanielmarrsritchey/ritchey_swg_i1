<?php
# Meta
// Name: Create Meta Files For Uploads
// Description: Checks if each upload has a metadata file, and if not, it creates them. These files are used to hold additional information about uploads, such as when they were uploaded, which is used by database creation scripts.
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
### Create meta-files as needed
require_once $location . '/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$files = ritchey_list_files_with_prefix_postfix_i1_v1("{$location}/uploads", NULL, NULL, TRUE);
foreach ($files as &$item){
	if (substr($item, -5) !== '.meta' && is_file("{$item}.meta") !== TRUE){
		$destination = "{$item}.meta";
		$value = array();
		$ext = pathinfo($item);
		$ext = $ext['extension'];
		$name = basename($item, ".{$ext}");
		$name = preg_replace('/[^a-zA-Z0-9 ]/', ' ', $name);
		$name = ucwords($name);
		$value[] = "Name: " . $name . PHP_EOL;
		$value[] = "Filename: " . basename($item) . PHP_EOL;
		date_default_timezone_set('UTC');
		//$date = date("Y-m-d");
		$date_uploaded = date("F j, Y");
		$value[] = "Date Uploaded: {$date_uploaded}" . PHP_EOL;
		$value[] = "SHA3-256: " . hash_file('sha3-256', $item) . PHP_EOL;
		$value[] = "SHA-256: " . hash_file('sha256', $item) . PHP_EOL;
		$value[] = "MD5: " . hash_file('md5', $item) . PHP_EOL;
		$value[] = "SHA-1: " . hash_file('sha1', $item) . PHP_EOL;
		$value[] = "CRC32: " . hash_file('crc32', $item) . PHP_EOL;
		$ext = pathinfo($item);
		$ext = $ext['extension'];
		if ($ext === 'jpg' OR $ext === 'webp' OR $ext === 'png'){
			$content_type = 'Image';
		} else if ($ext === 'mp4' OR $ext === 'mkv' OR $ext === 'webm' OR $ext === 'avi'){
			$content_type = 'Video';
		} else if ($ext === 'txt' OR $ext === 'odt' OR $ext === 'docx' OR $ext === 'pdf'){
			$content_type = 'Document';
		} else if ($ext === 'zip' OR $ext === 'tar' OR $ext === 'gz' OR $ext === 'xz' OR $ext === 'bz2'){
			$content_type = 'Archive';
		} else if ($ext === 'iso'){
			$content_type = 'Disc Image';
		} else if ($ext === 'img'){
			$content_type = 'Disk Image';
		} else if ($ext === 'deb' OR $ext === 'exe' OR $ext === 'AppImage'){
			$content_type = 'Software';
		} else if ($ext === 'js' OR $ext === 'sh' OR $ext === 'php'){
			$content_type = 'Script';
		} else if ($ext === 'html' OR $ext === 'css' OR $ext === 'xml'){
			$content_type = 'Web Document';
		} else if ($ext === 'squashfs'){
			$content_type = 'Filesystem Archive';
		} else {
			$content_type = '';
		}
		$value[] = "Content Type: " . $content_type . PHP_EOL;
		$value = implode($value);
		file_put_contents($destination, $value);	
	}
}
unset($item);
//var_dump($files);
## Cleanup
// Do nothing
?>