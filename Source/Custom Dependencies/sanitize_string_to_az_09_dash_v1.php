<?php
function fun_9c4a7e2f1b8d43c6a5e9f0b2c7d8e1f3_sanitize_string_to_az_09_dash_v1($var_2f7a9c1e4b8d43a6e5c9f0b2d7e8a1c4_input_str) {

    // Convert to lowercase
    $var_5a1c9e2f7b8d43c6e4f0a2b7d9c1e3f6_lower_str =
        strtolower($var_2f7a9c1e4b8d43a6e5c9f0b2d7e8a1c4_input_str);

    // Replace line endings with underscores
    $var_6b2d9c1e4f8a43c7e5a0b2d9f1c3e7a8_lines_str =
        str_replace(array("\r\n", "\r", "\n"), "_", $var_5a1c9e2f7b8d43c6e4f0a2b7d9c1e3f6_lower_str);

    // Replace spaces with underscores
    $var_7c3e1a9d4f8b43c6e2a0d9f1b5c7e8a9_spaces_str =
        str_replace(" ", "_", $var_6b2d9c1e4f8a43c7e5a0b2d9f1c3e7a8_lines_str);

    // Remove any character that is not a letter, number, or underscore
    $var_8d4f1a9c7b3e46c2a5e0f9b1d7c8e2a3_clean_str =
        preg_replace('/[^a-z0-9_]/', '', $var_7c3e1a9d4f8b43c6e2a0d9f1b5c7e8a9_spaces_str);

    // Replace multiple underscores with a single underscore
    $var_9e5a2c1f7b4d43c8a6e0f9b2d1c7e3a4_single_str =
        preg_replace('/_+/', '_', $var_8d4f1a9c7b3e46c2a5e0f9b1d7c8e2a3_clean_str);

    // Remove leading and trailing underscores
    $var_a6f3b1c9e7d442c8a5e0f9b2d7c1e4a3_final_str =
        trim($var_9e5a2c1f7b4d43c8a6e0f9b2d1c7e3a4_single_str, '_');

    return $var_a6f3b1c9e7d442c8a5e0f9b2d7c1e4a3_final_str;
}
?>