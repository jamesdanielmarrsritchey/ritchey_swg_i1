<?php
function fun_a3c91f2d_subtract_days_from_timestamp_i1_v1($var_7b2d9c11_timestamp_num, $var_1f0a8e77_days_num) {

    if ($var_7b2d9c11_timestamp_num === NULL || $var_1f0a8e77_days_num === NULL) {
        return FALSE;
    }

    if (is_numeric($var_7b2d9c11_timestamp_num) !== TRUE) {
        return FALSE;
    }

    if (is_numeric($var_1f0a8e77_days_num) !== TRUE) {
        return FALSE;
    }

    $var_4e6d1c8a_seconds_per_day_num = 60 * 60 * 24;
    $var_9a0b3c7e_seconds_to_subtract_num = $var_4e6d1c8a_seconds_per_day_num * $var_1f0a8e77_days_num;
    $var_6c8f2d10_new_timestamp_num = $var_7b2d9c11_timestamp_num - $var_9a0b3c7e_seconds_to_subtract_num;

    return $var_6c8f2d10_new_timestamp_num;
}
?>