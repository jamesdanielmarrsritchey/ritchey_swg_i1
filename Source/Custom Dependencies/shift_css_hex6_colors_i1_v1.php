<?php

function fun_6d1a3f90_shift_css_hex6_colors_i1_v1($var_9b2c7a11_css_str, $var_3f8d1c22_shift_num)
{
    if (is_string($var_9b2c7a11_css_str) !== TRUE) {
        return FALSE;
    }

    if (is_numeric($var_3f8d1c22_shift_num) !== TRUE) {
        return FALSE;
    }

    $var_3f8d1c22_shift_num = (int)$var_3f8d1c22_shift_num;

    // Only match 6-digit hex colors: #RRGGBB
    // Tries to avoid IDs/selectors by requiring a likely "value" prefix char.
    $var_7a1c0d55_pattern_str = '/(^|[\s:(,=])#([0-9a-fA-F]{6})(?![0-9a-fA-F])/';

    $var_0c9e2b77_output_str = preg_replace_callback(
        $var_7a1c0d55_pattern_str,
        function ($var_1e4a8c33_match_arr) use ($var_3f8d1c22_shift_num) {
            $var_5b7d1a20_prefix_str = $var_1e4a8c33_match_arr[1];
            $var_2a1f9c88_hex_str = strtoupper($var_1e4a8c33_match_arr[2]);

            // Convert #RRGGBB -> integer in [0, 16777215]
            $var_8c2a0d11_value_num = hexdec($var_2a1f9c88_hex_str);

            // Shift with wrap-around across the full 24-bit color space
            // 24-bit max: 0xFFFFFF = 16777215, modulus: 16777216
            $var_4d1b7c02_mod_num = 16777216;

            // Proper modulo for negatives
            $var_8c2a0d11_value_num = ($var_8c2a0d11_value_num + $var_3f8d1c22_shift_num) % $var_4d1b7c02_mod_num;
            if ($var_8c2a0d11_value_num < 0) {
                $var_8c2a0d11_value_num = $var_8c2a0d11_value_num + $var_4d1b7c02_mod_num;
            }

            $var_6a2d9f10_new_hex_str = strtoupper(dechex($var_8c2a0d11_value_num));
            $var_6a2d9f10_new_hex_str = str_pad($var_6a2d9f10_new_hex_str, 6, "0", STR_PAD_LEFT);

            return $var_5b7d1a20_prefix_str . "#" . $var_6a2d9f10_new_hex_str;
        },
        $var_9b2c7a11_css_str
    );

    if (is_string($var_0c9e2b77_output_str) !== TRUE) {
        return FALSE;
    }

    return $var_0c9e2b77_output_str;
}

?>