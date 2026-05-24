<?php
function fun_ce50722f_string_to_array_by_lines_i1776011657_v0_2(
    $var_ce50722f_input_str,
    $var_ce50722f_remove_label_boo = false
)
{
    $var_ce50722f_output_arr = array();

    if (is_string($var_ce50722f_input_str) === false) {
        return $var_ce50722f_output_arr;
    }

    if (is_bool($var_ce50722f_remove_label_boo) === false) {
        $var_ce50722f_remove_label_boo = false;
    }

    $var_ce50722f_lines_arr = preg_split('/\r\n|\r|\n/', $var_ce50722f_input_str);

    foreach ($var_ce50722f_lines_arr as $var_ce50722f_line_str) {

        $var_ce50722f_colon_position_num = strpos($var_ce50722f_line_str, ':');

        if ($var_ce50722f_colon_position_num !== false) {

            $var_ce50722f_key_source_str = substr(
                $var_ce50722f_line_str,
                0,
                $var_ce50722f_colon_position_num
            );

            if ($var_ce50722f_remove_label_boo === true) {

                $var_ce50722f_value_str = substr(
                    $var_ce50722f_line_str,
                    $var_ce50722f_colon_position_num + 1
                );

                $var_ce50722f_value_str = ltrim($var_ce50722f_value_str);

            } else {

                $var_ce50722f_value_str = $var_ce50722f_line_str;

            }

        } else {

            $var_ce50722f_key_source_str = substr(
                $var_ce50722f_line_str,
                0,
                8
            );

            $var_ce50722f_value_str = $var_ce50722f_line_str;

        }

        $var_ce50722f_key_str = strtolower($var_ce50722f_key_source_str);

        $var_ce50722f_key_str = preg_replace(
            '/[^a-z0-9]+/',
            ' ',
            $var_ce50722f_key_str
        );

        $var_ce50722f_key_str = str_replace(
            ' ',
            '_',
            $var_ce50722f_key_str
        );

        $var_ce50722f_key_str = preg_replace(
            '/_+/',
            '_',
            $var_ce50722f_key_str
        );

        $var_ce50722f_key_str = trim(
            $var_ce50722f_key_str,
            '_'
        );

        if ($var_ce50722f_key_str !== '') {

            if (
                array_key_exists(
                    $var_ce50722f_key_str,
                    $var_ce50722f_output_arr
                ) === false
            ) {

                $var_ce50722f_output_arr[$var_ce50722f_key_str] =
                    $var_ce50722f_value_str;

            }

        }

    }

    return $var_ce50722f_output_arr;
}

?>