<?php

function fun_e16a0092_reorder_array_by_basename_prefix_i1_v1($var_e16a0092_input_arr)
{
    $var_e16a0092_highest_prefix_num = 0;
    $var_e16a0092_matches_arr = array();
    $var_e16a0092_value_str = '';
    $var_e16a0092_basename_str = '';
    $var_e16a0092_prefix_num = 0;
    $var_e16a0092_new_arr = array();
    $var_e16a0092_result_arr = array();
    $var_e16a0092_seen_prefix_arr = array();

    if (!is_array($var_e16a0092_input_arr) || count($var_e16a0092_input_arr) === 0) {
        return false;
    }

    foreach ($var_e16a0092_input_arr as $var_e16a0092_value_str) {
        if (!is_string($var_e16a0092_value_str)) {
            return false;
        }

        $var_e16a0092_basename_str = basename($var_e16a0092_value_str);
        $var_e16a0092_matches_arr = array();

        if (!preg_match('/^([0-9]+)_/', $var_e16a0092_basename_str, $var_e16a0092_matches_arr)) {
            return false;
        }

        $var_e16a0092_prefix_num = (int)$var_e16a0092_matches_arr[1];

        if (isset($var_e16a0092_seen_prefix_arr[$var_e16a0092_prefix_num])) {
            return false;
        }

        $var_e16a0092_seen_prefix_arr[$var_e16a0092_prefix_num] = true;

        if ($var_e16a0092_prefix_num > $var_e16a0092_highest_prefix_num) {
            $var_e16a0092_highest_prefix_num = $var_e16a0092_prefix_num;
        }
    }

    $var_e16a0092_new_arr = array_fill(0, $var_e16a0092_highest_prefix_num + 1, null);

    foreach ($var_e16a0092_input_arr as $var_e16a0092_value_str) {
        $var_e16a0092_basename_str = basename($var_e16a0092_value_str);
        $var_e16a0092_matches_arr = array();

        preg_match('/^([0-9]+)_/', $var_e16a0092_basename_str, $var_e16a0092_matches_arr);

        $var_e16a0092_prefix_num = (int)$var_e16a0092_matches_arr[1];
        $var_e16a0092_new_arr[$var_e16a0092_prefix_num] = $var_e16a0092_value_str;
    }

    foreach ($var_e16a0092_new_arr as $var_e16a0092_value_str) {
        if ($var_e16a0092_value_str !== null) {
            $var_e16a0092_result_arr[] = $var_e16a0092_value_str;
        }
    }

    return $var_e16a0092_result_arr;
}
?>