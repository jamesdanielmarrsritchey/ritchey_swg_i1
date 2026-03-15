<?php
# Meta
// Name: HTML Layout 1
// Description: Creates the webpage layout, and imports page content.
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
//eval(@substr(@file_get_contents("{$location}/evals/configuration_info_importers/import_global_configuration_info.php"), 5, -2));
### Set default values for variables that are expected to be provided by script that evals this file
if (isset($localized_css) !== TRUE){
	$localized_css = '<!-- localized_css is not set. -->';
}
if (isset($page_title) !== TRUE){
	$page_title = '(page_title is not set.)';
}
if (isset($content_1) !== TRUE){
	$content_1 = '(content_1 is not set.)';
}
## Task
if ($global_configuration_info['parent_url'] === ''){
	$heading_1 = '';
} else {
$heading_1 = <<<HEREDOC
<div class='section_outter no_print' id='header_1_outter'>
	<div class='section_inner' id='header_1_inner'>
		<div class='item_holder' id='parent_button_holder'>
			<a class='item' id='parent_button' href="{$global_configuration_info['parent_url']}">Go to Parent Site</a>
		</div>
	</div>
</div>
HEREDOC;
}
if ($global_configuration_info['bio'] !== ''){
	$heading_2 = <<<HEREDOC
<div class='section_outter no_print' id='header_2_outter'>
	<div class='section_inner' id='header_2_inner'>
		<div class='item_holder' id='logo_holder'>
			 
		</div>
		<div class='item_holder' id='navigation_holder'>
			<nav id='navigation'>
				<a id='navigation_button' href="{$global_configuration_info['address']}/pages/navigation.html">&#x2630;</a>
			</nav>
		</div>
	</div>
</div>
HEREDOC;
} else {
$heading_2 = <<<HEREDOC
<div class='section_outter no_print' id='header_2_outter'>
	<div class='section_inner' id='header_2_inner'>
		<div class='item_holder' id='logo_holder'>
			 <a href="{$global_configuration_info['address']}"><img id='logo' src="{$global_configuration_info['logo_address']}" alt="Logo"></a>
		</div>
		<div class='item_holder' id='navigation_holder'>
			<nav id='navigation'>
				<a id='navigation_button' href="{$global_configuration_info['address']}/pages/navigation.html">&#x2630;</a>
			</nav>
		</div>
	</div>
</div>
HEREDOC;
}
if ($global_configuration_info['operation_type'] === ''){
	$footer_4 = '';
} else if ($global_configuration_info['operation_type'] === 'privately operated'){
$footer_4 = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$global_configuration_info['site_name']} is privately operated. To learn what this means <a href="{$global_configuration_info['address']}/assets/localized/Privately Operated - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($global_configuration_info['operation_type'] === 'registered business'){
$footer_4 = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$global_configuration_info['site_owner']} is a registered business. To learn what this means <a href="{$global_configuration_info['address']}/assets/localized/Registered Business - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($global_configuration_info['operation_type'] === 'registered non-profit'){
$footer_4 = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$global_configuration_info['site_owner']} is registered as a non-profit organization. To learn what this means <a href="{$global_configuration_info['address']}/assets/localized/Non-Profit Organization - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else {
	$footer_4 = '';
}

$switch_1 = FALSE;
if (isset($page_name) === TRUE) {
	if ($page_name === 'Statistics' || $page_name === 'Navigation' || $page_name === 'Landing' || $page_name === 'Legal' || $page_name === '404' || $page_name === 'Search'){
		$switch_1 = TRUE;	
	}
}
if (isset($script_id) === TRUE) {
	if ($script_id === 'other resources'){
		$switch_1 = TRUE;	
	}
}
if ($global_configuration_info['bio'] === ''){
	$bio_1 = '';
} else if ($switch_1 === TRUE) {
	$bio_1 = '';
} else {
$bio_1 = <<<HEREDOC
<div class='section_outter no_print' id='bio_1_outter'>
	<div class='section_inner' id='bio_1_inner'>	
		<div class='item_holder' id='bio_pic_holder'>
			 <a href="{$global_configuration_info['address']}"><img id='bio_pic' src="{$global_configuration_info['logo_address']}" alt="Bio Pic"></a>
		</div>
		<div class='item_holder' id='bio_holder'>
			<h1 class='item' id='bio_name'>{$global_configuration_info['site_owner']}</h1>
			<p class='item' id='bio'>{$global_configuration_info['bio']}</p>
		</div>
	</div>
</div>
HEREDOC;
} 
$html_layout = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{$global_configuration_info['address']}/assets/global/default.css">
{$localized_css}
<title>{$page_title}</title>
<style>
</style>
<script src="{$global_configuration_info['address']}/assets/global/global-variables.js"></script>
<script src="{$global_configuration_info['address']}/assets/global/default.js"></script>
<script src="{$global_configuration_info['address']}/assets/global/search-browse.js"></script>
<script src="{$global_configuration_info['address']}/databases/database-meta.js"></script>
<script>
set_global_variables_v1();
</script>
</head>
<body>
{$heading_1}
{$heading_2}
{$bio_1}
{$content_1}
<div class='section_outter no_print' id='footer_1_outter'>
	<div class='section_inner' id='footer_1_inner'>
		<div class='item_holder' id='top_button_holder'>
			<button class='item' onclick="scroll_to_top_v1()" id="top_button">&uArr;</button>
			<script>
				function scroll_to_top_v1() {
					document.body.scrollTop = 0;
					document.documentElement.scrollTop = 0;
				}
			</script>
		</div>
	</div>
</div>
<div class='section_outter' id='footer_2_outter'>
	<div class='section_inner' id='footer_2_inner'>
		<div class='item_holder' id='copyright_notice_holder'>
			<p class='item' id='copyright_notice'><a href="https://laws-lois.justice.gc.ca/eng/acts/C-42/Index.html">Copyright &#169</a> {$global_configuration_info['site_owner']}, and others; <a href="https://en.wikipedia.org/wiki/All_rights_reserved">all rights reserved</a>, except where explicitly stated.</p>
		</div>
	</div>
</div>
<div class='section_outter' id='footer_3_outter'>
	<div class='section_inner' id='footer_3_inner'>
		<div class='item_holder' id='footer_links_holder'>
			<ul class='item' id='footer_links'>
    			<li class='footer_links_entry'><a href="{$global_configuration_info['address']}/pages/legal.html#terms_of_service">Terms of Service</a></li>
    			<li class='footer_links_entry'><a href="{$global_configuration_info['address']}/pages/legal.html#privacy_policy">Privacy Policy</a></li>
    			<li class='footer_links_entry'><a href="{$global_configuration_info['address']}/pages/legal.html#licensing">Licensing</a></li>
			</ul>	
		</div>
	</div>
</div>
{$footer_4}
</body>
</html>
HEREDOC;
## Cleanup
// Do nothing
?>