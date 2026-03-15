<?php
# Meta
// Name: Define HTML Layout
// Description: Create the standard layout for webpages, and imports content from parent scripts.
// Status: Stable
// UUID: c836c568, entire file is a single UUID space, aside from foreign UUIDs.
# Content
## Prep
$var_c836c568_n_num = 1;
$var_c836c568_location_str = realpath(dirname(__FILE__, $var_c836c568_n_num));
while (is_file("{$var_c836c568_location_str}/application.php") !== TRUE) {
	$var_c836c568_n_num++;
	$var_c836c568_location_str = realpath(dirname(__FILE__, $var_c836c568_n_num));
	if ($var_c836c568_n_num > 50){
		exit(1);
	}
}
$var_c836c568_location_str = realpath(dirname($var_c836c568_location_str, 1));
eval(substr(file_get_contents("{$var_c836c568_location_str}/Source/Evals/import_configuration_file_data.php"), 5, -2)); // Only needed during individual file test.
### Set fallback values for variables which may be provided by the script evaling this file.
if (isset($var_c836c568_item_css_str) !== TRUE){
	$var_c836c568_item_css_str = '<!-- No item specific CSS provided. -->';
}
if (isset($var_c836c568_item_type_css_str) !== TRUE){
	$var_c836c568_item_type_css_str = '<!-- No item type CSS provided. -->';
}
if (isset($var_c836c568_item_js_str) !== TRUE){
	$var_c836c568_item_js_str = '<!-- No item specific JS provided. -->';
}
if (isset($var_c836c568_item_type_js_str) !== TRUE){
	$var_c836c568_item_type_js_str = '<!-- No item type JS provided. -->';
}
if (isset($var_c836c568_page_title_str) !== TRUE){
	$var_c836c568_page_title_str = '(PAGE TITLE NOT SET)';
}
if (isset($var_c836c568_page_content_1_str) !== TRUE){
	$var_c836c568_page_content_1_str = '(PAGE CONTENT 1 NOT SET)';
}
if (isset($var_c836c568_page_bio_switch_boo) !== TRUE){
	$var_c836c568_page_bio_switch_boo = FALSE;
}
## Task
### Define elements which may be disabled
// Heading 1
if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['parent_url'] === ''){
	$heading_1 = '';
} else {
$var_c836c568_page_heading_1_str = <<<HEREDOC
<div class='section_outter no_print' id='header_1_outter'>
	<div class='section_inner' id='header_1_inner'>
		<div class='item_holder' id='parent_button_holder'>
			<a class='item' id='parent_button' href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['parent_url']}">Go to Parent Site</a>
		</div>
	</div>
</div>
HEREDOC;
}
// Bio
require_once $var_c836c568_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
$var_c836c568_item_value_str = ritchey_get_lines_by_prefix_i1_v1("{$var_c836c568_location_str}/Source/Content Inputs/Assets/Bio.conf2", 'Content:', '"', NULL, TRUE);
if (trim($var_c836c568_item_value_str) === ''){
	$var_c836c568_page_bio_1_str = '';
} else if ($var_c836c568_page_bio_switch_boo === TRUE) { // This variable needs to be set by the script evaling this file. The following pages should set TRUE: Statistics, Navigation, Landing, 404, Legal, Search.
	$var_c836c568_page_bio_1_str = '';
} else {
$var_c836c568_page_bio_1_str = <<<HEREDOC
<div class='section_outter no_print' id='bio_1_outter'>
	<div class='section_inner' id='bio_1_inner'>	
		<div class='item_holder' id='bio_pic_holder'>
			 <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}"><img id='bio_pic' src="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['profile_picture_web_path']}" alt="Bio Pic"></a>
		</div>
		<div class='item_holder' id='bio_holder'>
			<h1 class='item' id='bio_name'>{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_owner']}</h1>
			<p class='item' id='bio'>{$var_c836c568_item_value_str}</p>
		</div>
	</div>
</div>
HEREDOC;
}
// Heading 2
//if ($var_c836c568_page_bio_1_str !== ''){
if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path'] === ''){
	$var_c836c568_page_heading_2_str = <<<HEREDOC
<div class='section_outter no_print' id='header_2_outter'>
	<div class='section_inner' id='header_2_inner'>
		<div class='item_holder' id='logo_holder'>
			 
		</div>
		<div class='item_holder' id='navigation_holder'>
			<nav id='navigation'>
				<a id='navigation_button' href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/navigation-pages/navigation.html">&#x2630;</a>
			</nav>
		</div>
	</div>
</div>
HEREDOC;
} else {
$var_c836c568_page_heading_2_str = <<<HEREDOC
<div class='section_outter no_print' id='header_2_outter'>
	<div class='section_inner' id='header_2_inner'>
		<div class='item_holder' id='logo_holder'>
			 <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}"><img id='logo' src="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['logo_web_path']}" alt="Logo"></a>
		</div>
		<div class='item_holder' id='navigation_holder'>
			<nav id='navigation'>
				<a id='navigation_button' href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/navigation-pages/navigation.html">&#x2630;</a>
			</nav>
		</div>
	</div>
</div>
HEREDOC;
}
// Footer 4
if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === ''){
	$var_c836c568_page_footer_4_str = '';
} else if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === 'Privately Operated'){
$var_c836c568_page_footer_4_str = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} is privately operated. To learn what this means <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/Privately Operated - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === 'Registered Business'){
$var_c836c568_page_footer_4_str = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_owner']} is a registered business. To learn what this means <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/Registered Business - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === 'Registered Non-profit'){
$var_c836c568_page_footer_4_str = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_owner']} is registered as a non-profit organization. To learn what this means <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/Non-Profit Organization - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === 'Governmental Organization'){
$var_c836c568_page_footer_4_str = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_name']} is a governmental organization. To learn what this means <a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/Governmental Organization - Definition v1.txt">click here</a>.
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else if ($var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['operation_type'] === 'Custom'){
require_once $var_c836c568_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
$var_c836c568_item_value_str = ritchey_get_lines_by_prefix_i1_v1("{$var_c836c568_location_str}/Source/Content Inputs/Assets/Custom Operation Type.conf2", 'Content:', '"', NULL, TRUE);
$var_c836c568_page_footer_4_str = <<<HEREDOC
<div class='section_outter' id='footer_4_outter'>
	<div class='section_inner' id='footer_4_inner'>
		<div class='item_holder' id='footer_info_holder'>
			<p class='item' id='footer_info'>
    			{$var_c836c568_item_value_str}
			</p>	
		</div>
	</div>
</div>
HEREDOC;
} else {
	$var_c836c568_page_footer_4_str = '';
}
// Comments 1
require_once $var_c836c568_location_str . '/Source/Dependencies/ritchey_get_lines_by_prefix_i1_v1/ritchey_get_lines_by_prefix_i1_v1.php';
$var_c836c568_item_value_str = ritchey_get_lines_by_prefix_i1_v1("{$var_c836c568_location_str}/Source/Content Inputs/Assets/Comment Section Plugin.conf2", 'Content:', '"', NULL, TRUE);
if (trim($var_c836c568_item_value_str) === ''){
	$var_c836c568_page_comments_1_str = '';
} else {
$var_c836c568_page_comments_1_str = <<<HEREDOC
<div class='section_outter' id='comments_1_outter'>
	<div class='section_inner' id='comments_1_inner'>
		<div class='item_holder' id='comments_1_holder'>
    			{$var_c836c568_item_value_str}
		</div>
	</div>
</div>
HEREDOC;
}
### Define full page
$var_c836c568_page_html_layout_str = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/global.css">
{$var_c836c568_item_type_css_str}
{$var_c836c568_item_css_str}
<title>{$var_c836c568_page_title_str}</title>
<style>
</style>
<script src="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/global.js"></script>
<script src="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/assets/global-variables.js"></script>
{$var_c836c568_item_type_js_str}
{$var_c836c568_item_js_str}
<script>
//# Task
//## Convert relative URLs to full ones. This is used by the user on content from content inputs, if the relative-url data attribute is present
document.addEventListener("DOMContentLoaded", function () {
	fun_c82d4f19_convert_relative_urls_to_full_urls_i2_v1(var_da1cdfc8_url_gstr);
});
</script>
</head>
<body>
{$var_c836c568_page_heading_1_str}
{$var_c836c568_page_heading_2_str}
{$var_c836c568_page_bio_1_str}
{$var_c836c568_page_content_1_str}
{$var_c836c568_page_comments_1_str}
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
			<p class='item' id='copyright_notice'><a href="https://laws-lois.justice.gc.ca/eng/acts/C-42/Index.html">Copyright &#169</a> {$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['website_owner']}, and others; <a href="https://en.wikipedia.org/wiki/All_rights_reserved">all rights reserved</a>, except where explicitly stated.</p>
		</div>
	</div>
</div>
<div class='section_outter' id='footer_3_outter'>
	<div class='section_inner' id='footer_3_inner'>
		<div class='item_holder' id='footer_links_holder'>
			<ul class='item' id='footer_links'>
    			<li class='footer_links_entry'><a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/regular-pages/legal.html#terms_of_service">Terms of Service</a></li>
    			<li class='footer_links_entry'><a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/regular-pages/legal.html#privacy_policy">Privacy Policy</a></li>
    			<li class='footer_links_entry'><a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/regular-pages/legal.html#licensing">Licensing</a></li>
    			<li class='footer_links_entry'><a href="{$var_114285e6616f4a028017a2c7cb9fd3cd_configuration_information_arr['url']}/widget-pages/supported-systems.html">Supported Systems</a></li>
			</ul>	
		</div>
	</div>
</div>
{$var_c836c568_page_footer_4_str}
</body>
</html>
HEREDOC;
## Cleanup
//goto goto_c836c568_cleaup;
goto_c836c568_cleaup:
// Do nothing
## Exit
//goto goto_c836c568_end;
goto_c836c568_end:
?>