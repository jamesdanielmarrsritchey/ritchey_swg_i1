<?php
function fun_4b3c7a1f_hash_string_multiple_times_i1_v1($arg_input_str, $arg_algo_str, $arg_iterations_num)
{
    $var_8a2d6c19_result_arr = array();

    // Validate input types
    if (is_string($arg_input_str) !== TRUE) {
        return FALSE;
    }

    if (is_string($arg_algo_str) !== TRUE) {
        return FALSE;
    }

    if (is_int($arg_iterations_num) !== TRUE) {
        return FALSE;
    }

    if ($arg_iterations_num < 1) {
        return FALSE;
    }

    // Validate algorithm
    $var_1c9f0d7e_algos_arr = hash_algos();
    if (in_array($arg_algo_str, $var_1c9f0d7e_algos_arr, TRUE) !== TRUE) {
        return FALSE;
    }

    $var_62e1b9a3_current_str = $arg_input_str;

    $var_f2a7d4c8_counter_num = 1;
    while ($var_f2a7d4c8_counter_num <= $arg_iterations_num) {

        $var_62e1b9a3_current_str = hash($arg_algo_str, $var_62e1b9a3_current_str);

        // hash() should return a string; if anything unexpected happens, fail
        if (is_string($var_62e1b9a3_current_str) !== TRUE) {
            return FALSE;
        }

        // Keys are iteration numbers starting from 1
        $var_8a2d6c19_result_arr[$var_f2a7d4c8_counter_num] = $var_62e1b9a3_current_str;

        $var_f2a7d4c8_counter_num = $var_f2a7d4c8_counter_num + 1;
    }

    return $var_8a2d6c19_result_arr;
}
?>