<?php
function fun_b7c9d2e4_merge_arrays_reindex_i1_v2($var_a1f4e8c2_array_one_arr, $var_c3d6f9a7_array_two_arr)
{
    // Validate first parameter
    if (is_array($var_a1f4e8c2_array_one_arr) !== TRUE)
    {
        return FALSE;
    }

    // Validate second parameter
    if (is_array($var_c3d6f9a7_array_two_arr) !== TRUE)
    {
        return FALSE;
    }

    $var_d8e2a4b6_result_arr = array();

    // Add values from first array
    foreach ($var_a1f4e8c2_array_one_arr as $var_e1f3b5c7_value_uns)
    {
        $var_d8e2a4b6_result_arr[] = $var_e1f3b5c7_value_uns;
    }

    // Add values from second array
    foreach ($var_c3d6f9a7_array_two_arr as $var_f9a8b7c6_value_uns)
    {
        $var_d8e2a4b6_result_arr[] = $var_f9a8b7c6_value_uns;
    }

    return $var_d8e2a4b6_result_arr;
}
?>