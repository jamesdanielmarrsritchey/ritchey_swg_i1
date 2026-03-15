<?php
function fun_7a3c9f2b_flatten_array_v1($var_a91f3c7d_input_arr) {

    $var_b82d6e4a_result_arr = array();

    foreach ($var_a91f3c7d_input_arr as $var_c73e5b1f_value_uns) {

        if (is_array($var_c73e5b1f_value_uns) === TRUE) {

            $var_d64f2a9c_flattened_arr =
                fun_7a3c9f2b_flatten_array_v1(
                    $var_c73e5b1f_value_uns
                );

            foreach ($var_d64f2a9c_flattened_arr as $var_e55a8d3b_sub_value_uns) {

                $var_b82d6e4a_result_arr[] =
                    $var_e55a8d3b_sub_value_uns;

            }

        } else {

            $var_b82d6e4a_result_arr[] =
                $var_c73e5b1f_value_uns;

        }

    }

    return $var_b82d6e4a_result_arr;

}
?>