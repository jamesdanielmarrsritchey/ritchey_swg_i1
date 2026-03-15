<?php

function fun_e16a0092_reorder_array_by_value_prefix_i1_v1($var_e16a0092_input_arr)
{
    $var_e16a0092_highest_prefix_num = 0;
    $var_e16a0092_matches_arr = array();
    $var_e16a0092_value_str = '';
    $var_e16a0092_prefix_num = 0;
    $var_e16a0092_new_arr = array();
    $var_e16a0092_result_arr = array();
    $var_e16a0092_seen_prefix_arr = array();

    // Empty array check
    if (!is_array($var_e16a0092_input_arr) || count($var_e16a0092_input_arr) === 0) {
        return false;
    }

    // Validate entries, find highest prefix, detect duplicates
    foreach ($var_e16a0092_input_arr as $var_e16a0092_value_str) {

        if (!is_string($var_e16a0092_value_str)) {
            return false;
        }

        $var_e16a0092_matches_arr = array();

        if (!preg_match('/^([0-9]+)_/', $var_e16a0092_value_str, $var_e16a0092_matches_arr)) {
            return false;
        }

        $var_e16a0092_prefix_num = (int)$var_e16a0092_matches_arr[1];

        // Duplicate prefix detection
        if (isset($var_e16a0092_seen_prefix_arr[$var_e16a0092_prefix_num])) {
            return false;
        }

        $var_e16a0092_seen_prefix_arr[$var_e16a0092_prefix_num] = true;

        if ($var_e16a0092_prefix_num > $var_e16a0092_highest_prefix_num) {
            $var_e16a0092_highest_prefix_num = $var_e16a0092_prefix_num;
        }
    }

    // Create new array sized by highest prefix
    $var_e16a0092_new_arr = array_fill(0, $var_e16a0092_highest_prefix_num + 1, null);

    // Place items based on prefix
    foreach ($var_e16a0092_input_arr as $var_e16a0092_value_str) {

        $var_e16a0092_matches_arr = array();
        preg_match('/^([0-9]+)_/', $var_e16a0092_value_str, $var_e16a0092_matches_arr);

        $var_e16a0092_prefix_num = (int)$var_e16a0092_matches_arr[1];
        $var_e16a0092_new_arr[$var_e16a0092_prefix_num] = $var_e16a0092_value_str;
    }

    // Remove empty entries while preserving order
    foreach ($var_e16a0092_new_arr as $var_e16a0092_value_str) {
        if ($var_e16a0092_value_str !== null) {
            $var_e16a0092_result_arr[] = $var_e16a0092_value_str;
        }
    }

    return $var_e16a0092_result_arr;
}
?>