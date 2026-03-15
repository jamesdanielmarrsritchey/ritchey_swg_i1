<?php
# Meta
// Name: Application
// Description: This script runs the application. It will generate the website.
// Status: Stable
# Content
## Prep
$var_9066c90b71624498b535d98f779424d8_n_num = 1;
$var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str = realpath(dirname(__FILE__, $var_9066c90b71624498b535d98f779424d8_n_num));
while (is_file("{$var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str}/application.php") !== TRUE) {
	$var_9066c90b71624498b535d98f779424d8_n_num++;
	$var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str = realpath(dirname(__FILE__, $var_9066c90b71624498b535d98f779424d8_n_num));
	if ($var_9066c90b71624498b535d98f779424d8_n_num > 50){
		exit(1);
	}
}
$var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str = realpath(dirname($var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str, 1));
## Task
### Run Includes
require_once $var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str . '/Source/Dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_61bcd8c82e8b41fdb917e575fe67a068_files_arr = ritchey_list_files_with_prefix_postfix_i1_v1("{$var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str}/Source/Includes", NULL, '.php', TRUE);
require_once $var_bfadc9b3c88a41c4af1167fb4bd2f0a1_location_str . '/Source/Custom Dependencies/reorder_array_by_basename_prefix_i1_v1.php';
$var_61bcd8c82e8b41fdb917e575fe67a068_files_arr = fun_e16a0092_reorder_array_by_basename_prefix_i1_v1($var_61bcd8c82e8b41fdb917e575fe67a068_files_arr);
foreach ($var_61bcd8c82e8b41fdb917e575fe67a068_files_arr as &$var_3cb36fea777245efa41e66dc0edd7942_item_str){
	require_once $var_3cb36fea777245efa41e66dc0edd7942_item_str;
}
unset($var_3cb36fea777245efa41e66dc0edd7942_item_str);
## Cleanup
//goto goto_ad56484facbb46789b7405e5c273d812_cleaup;
goto_ad56484facbb46789b7405e5c273d812_cleaup:
// Do nothing
## Exit
//goto goto_920f26dd47934e2c9d9e83f9fe76af62_end;
goto_920f26dd47934e2c9d9e83f9fe76af62_end:
?>