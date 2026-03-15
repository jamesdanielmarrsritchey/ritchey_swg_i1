<?php
function fun_a9f4c2d8e1b3476fa8c92d7b3e5f104c_capitalize_string_v1(string $var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str, ?string $var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str = NULL): string
{
    // If mode is NULL, set default mode
    if ($var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str === NULL) {
        $var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str = "word";
    }

    // Normalize mode to lowercase
    $var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str = strtolower($var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str);

    // Mode: Capitalize every letter
    if ($var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str === "all") {
        return strtoupper($var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str);
    }

    // Mode: Capitalize first letter of each sentence
    if ($var_c7e2f104a9d2486bb3d1a7c9f4e8b6d2_mode_str === "sentence") {

        $var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str = strtolower($var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str);

        $var_f2a6c9e104b3478db3d1a7c9f4e2b6d8_length_num = strlen($var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str);
        $var_d8e2f104c7a9b3d1a7c9f4e2486bb6d2_result_str = "";
        $var_104c7a9d2b3d1a7c9f4e2486bb6d8e2f_capitalize_next_uns = TRUE;

        for ($var_6bb6d8e2f104c7a9d2b3d1a7c9f4e248_index_num = 0; $var_6bb6d8e2f104c7a9d2b3d1a7c9f4e248_index_num < $var_f2a6c9e104b3478db3d1a7c9f4e2b6d8_length_num; $var_6bb6d8e2f104c7a9d2b3d1a7c9f4e248_index_num++) {

            $var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str = $var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str[$var_6bb6d8e2f104c7a9d2b3d1a7c9f4e248_index_num];

            if ($var_104c7a9d2b3d1a7c9f4e2486bb6d8e2f_capitalize_next_uns === TRUE && ctype_alpha($var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str) === TRUE) {
                $var_d8e2f104c7a9b3d1a7c9f4e2486bb6d2_result_str .= strtoupper($var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str);
                $var_104c7a9d2b3d1a7c9f4e2486bb6d8e2f_capitalize_next_uns = FALSE;
            } else {
                $var_d8e2f104c7a9b3d1a7c9f4e2486bb6d2_result_str .= $var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str;
            }

            if ($var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str === "." || $var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str === "!" || $var_2486bb6d8e2f104c7a9d2b3d1a7c9f4e_char_str === "?") {
                $var_104c7a9d2b3d1a7c9f4e2486bb6d8e2f_capitalize_next_uns = TRUE;
            }
        }

        return $var_d8e2f104c7a9b3d1a7c9f4e2486bb6d2_result_str;
    }

    // Default mode: Capitalize first letter of each word
    $var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str = strtolower($var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str);
    return ucwords($var_b3d1a7c9f4e2486bb6d8e2f104c7a9d2_input_str);
}
?>