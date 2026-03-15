<?php
function fun_a7f3c2d1_convert_array_to_labelled_string_i1_v1(array $var_b4e91c8f_input_arr_arr)
{
    $var_c8d72a31_output_str_str = '';

    foreach ($var_b4e91c8f_input_arr_arr as $var_d19f3b6a_label_key_uns => $var_e73c4a92_value_var_uns)
    {
        // If a nested array is found, return FALSE
        if (is_array($var_e73c4a92_value_var_uns) === TRUE)
        {
            return FALSE;
        }

        $var_f62a9d10_label_str_str = (string)$var_d19f3b6a_label_key_uns;
        $var_a19c5e47_value_str_str = (string)$var_e73c4a92_value_var_uns;

        // Normalize line endings
        $var_a19c5e47_value_str_str = str_replace(
            array("\r\n", "\r"),
            "\n",
            $var_a19c5e47_value_str_str
        );

        // Check if value contains multiple lines
        if (strpos($var_a19c5e47_value_str_str, "\n") !== FALSE)
        {
            $var_c8d72a31_output_str_str .= $var_f62a9d10_label_str_str . ':' . PHP_EOL;
            $var_c8d72a31_output_str_str .= '"' . PHP_EOL;
            $var_c8d72a31_output_str_str .= $var_a19c5e47_value_str_str . PHP_EOL;
            $var_c8d72a31_output_str_str .= '"' . PHP_EOL;
        }
        else
        {
            $var_c8d72a31_output_str_str .=
                $var_f62a9d10_label_str_str .
                ': ' .
                $var_a19c5e47_value_str_str .
                PHP_EOL;
        }
    }

    return $var_c8d72a31_output_str_str;
}
?>