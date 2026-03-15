<?php

function fun_9a6f3c12_invert_css_hex6_colors_i1_v1($var_3f2a9d10_css_str, $var_6c1d8b44_percent_num)
{
    if (is_string($var_3f2a9d10_css_str) !== TRUE) {
        return FALSE;
    }

    if (is_numeric($var_6c1d8b44_percent_num) !== TRUE) {
        return FALSE;
    }

    $var_6c1d8b44_percent_num = (float)$var_6c1d8b44_percent_num;

    if ($var_6c1d8b44_percent_num < 0 || $var_6c1d8b44_percent_num > 100) {
        return FALSE;
    }

    $var_5d0a1c88_t_num = $var_6c1d8b44_percent_num / 100.0;

    // Only match 6-digit hex colors: #RRGGBB
    // Also tries to avoid matching IDs/selectors by requiring a likely "value" prefix char.
    $var_7b2c0e91_pattern_str = '/(^|[\s:(,=])#([0-9a-fA-F]{6})(?![0-9a-fA-F])/';

    $var_1a8c0d3e_output_str = preg_replace_callback(
        $var_7b2c0e91_pattern_str,
        function ($var_9e1b2a70_match_arr) use ($var_5d0a1c88_t_num) {
            $var_0d4a9c2e_prefix_str = $var_9e1b2a70_match_arr[1];
            $var_2f8b1d66_hex_str = strtoupper($var_9e1b2a70_match_arr[2]);

            $var_1c3a0b55_r_num = hexdec(substr($var_2f8b1d66_hex_str, 0, 2));
            $var_7e0d1a44_g_num = hexdec(substr($var_2f8b1d66_hex_str, 2, 2));
            $var_3b9c2a11_b_num = hexdec(substr($var_2f8b1d66_hex_str, 4, 2));

            // Partial invert toward (255 - c)
            $var_1c3a0b55_r_num = (int)round($var_1c3a0b55_r_num + ((255 - $var_1c3a0b55_r_num) - $var_1c3a0b55_r_num) * $var_5d0a1c88_t_num);
            $var_7e0d1a44_g_num = (int)round($var_7e0d1a44_g_num + ((255 - $var_7e0d1a44_g_num) - $var_7e0d1a44_g_num) * $var_5d0a1c88_t_num);
            $var_3b9c2a11_b_num = (int)round($var_3b9c2a11_b_num + ((255 - $var_3b9c2a11_b_num) - $var_3b9c2a11_b_num) * $var_5d0a1c88_t_num);

            if ($var_1c3a0b55_r_num < 0) { $var_1c3a0b55_r_num = 0; }
            if ($var_1c3a0b55_r_num > 255) { $var_1c3a0b55_r_num = 255; }
            if ($var_7e0d1a44_g_num < 0) { $var_7e0d1a44_g_num = 0; }
            if ($var_7e0d1a44_g_num > 255) { $var_7e0d1a44_g_num = 255; }
            if ($var_3b9c2a11_b_num < 0) { $var_3b9c2a11_b_num = 0; }
            if ($var_3b9c2a11_b_num > 255) { $var_3b9c2a11_b_num = 255; }

            $var_5c7d1b22_new_hex_str =
                str_pad(strtoupper(dechex($var_1c3a0b55_r_num)), 2, "0", STR_PAD_LEFT) .
                str_pad(strtoupper(dechex($var_7e0d1a44_g_num)), 2, "0", STR_PAD_LEFT) .
                str_pad(strtoupper(dechex($var_3b9c2a11_b_num)), 2, "0", STR_PAD_LEFT);

            return $var_0d4a9c2e_prefix_str . "#" . $var_5c7d1b22_new_hex_str;
        },
        $var_3f2a9d10_css_str
    );

    if (is_string($var_1a8c0d3e_output_str) !== TRUE) {
        return FALSE;
    }

    return $var_1a8c0d3e_output_str;
}
?>