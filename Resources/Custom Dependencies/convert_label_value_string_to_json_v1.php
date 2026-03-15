<?php
function fun_a1b2c3d4_convert_label_value_string_to_json_v1($var_9e8d7c6b_input_str, $var_0f1e2d3c_pretty_print_boo = true)
{
    if (is_string($var_9e8d7c6b_input_str) !== true) {
        return json_encode(array("error" => "Input must be a string."));
    }

    $var_11223344_output_arr = array();

    // Normalize line endings to "\n"
    $var_55667788_normalized_str = str_replace("\r\n", "\n", $var_9e8d7c6b_input_str);
    $var_55667788_normalized_str = str_replace("\r", "\n", $var_55667788_normalized_str);

    $var_99aabbcc_lines_arr = explode("\n", $var_55667788_normalized_str);

    $var_ddeeff00_line_count_num = count($var_99aabbcc_lines_arr);
    for ($var_13579bdf_i_num = 0; $var_13579bdf_i_num < $var_ddeeff00_line_count_num; $var_13579bdf_i_num++) {
        $var_2468ace0_line_str = trim($var_99aabbcc_lines_arr[$var_13579bdf_i_num]);

        if ($var_2468ace0_line_str === "") {
            continue;
        }

        $var_fedcba98_colon_pos_num = strpos($var_2468ace0_line_str, ":");
        if ($var_fedcba98_colon_pos_num === false) {
            // No ":" found; ignore the line
            continue;
        }

        $var_abcdef12_label_str = trim(substr($var_2468ace0_line_str, 0, $var_fedcba98_colon_pos_num));
        $var_12345678_value_str = trim(substr($var_2468ace0_line_str, $var_fedcba98_colon_pos_num + 1));

        if ($var_abcdef12_label_str === "") {
            // Empty label; ignore the line
            continue;
        }

        $var_11223344_output_arr[$var_abcdef12_label_str] = $var_12345678_value_str;
    }

    $var_0a0b0c0d_options_num = 0;
    if ($var_0f1e2d3c_pretty_print_boo === true) {
        $var_0a0b0c0d_options_num = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
    }

    return json_encode($var_11223344_output_arr, $var_0a0b0c0d_options_num);
}
?>