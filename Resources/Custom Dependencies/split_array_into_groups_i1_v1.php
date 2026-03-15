<?php
function fun_a4c91f2b_split_array_into_groups_i1_v1($var_a4c91f2b_input_arr, $var_a4c91f2b_group_size_num)
{
    $var_a4c91f2b_output_arr = array();
    $var_a4c91f2b_current_group_arr = array();
    $var_a4c91f2b_count_num = 0;

    foreach ($var_a4c91f2b_input_arr as $var_a4c91f2b_key_uns => $var_a4c91f2b_value_uns)
    {
        $var_a4c91f2b_current_group_arr[$var_a4c91f2b_key_uns] = $var_a4c91f2b_value_uns;
        $var_a4c91f2b_count_num++;

        if ($var_a4c91f2b_count_num >= $var_a4c91f2b_group_size_num)
        {
            $var_a4c91f2b_output_arr[] = $var_a4c91f2b_current_group_arr;
            $var_a4c91f2b_current_group_arr = array();
            $var_a4c91f2b_count_num = 0;
        }
    }

    if (count($var_a4c91f2b_current_group_arr) > 0)
    {
        $var_a4c91f2b_output_arr[] = $var_a4c91f2b_current_group_arr;
    }

    return $var_a4c91f2b_output_arr;
}
?>