<?php
function fun_a7c3f9e8b4d24c1e9f6a2b3c4d5e6f70_remove_extra_spaces_v1($var_d3b9a1f6c8e7421ab5d9c3e4f6a7b8c9_input_str) {

    // Remove leading and trailing spaces
    $var_f1a2b3c4d5e64789abcde1234567890a_trimmed_str = trim($var_d3b9a1f6c8e7421ab5d9c3e4f6a7b8c9_input_str);

    // Replace two or more spaces with a single space
    $var_b2c3d4e5f6a74891bcdef2345678901b_cleaned_str = preg_replace('/ {2,}/', ' ', $var_f1a2b3c4d5e64789abcde1234567890a_trimmed_str);

    return $var_b2c3d4e5f6a74891bcdef2345678901b_cleaned_str;
}
?>