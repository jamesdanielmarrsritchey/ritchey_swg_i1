<?php
function fun_e16a0092_get_file_extension_from_path_by_dot_level_i1_v1($var_e16a0092_path_str, $var_e16a0092_dot_level_num)
{
    $var_e16a0092_basename_str = basename($var_e16a0092_path_str);
    $var_e16a0092_parts_arr = explode('.', $var_e16a0092_basename_str);
    $var_e16a0092_parts_count_num = count($var_e16a0092_parts_arr);
    $var_e16a0092_extension_parts_arr = array();

    if (!is_int($var_e16a0092_dot_level_num) && !ctype_digit((string)$var_e16a0092_dot_level_num))
    {
        return false;
    }

    $var_e16a0092_dot_level_num = (int)$var_e16a0092_dot_level_num;

    if ($var_e16a0092_dot_level_num < 1)
    {
        return false;
    }

    if ($var_e16a0092_parts_count_num <= $var_e16a0092_dot_level_num)
    {
        return false;
    }

    $var_e16a0092_extension_parts_arr = array_slice($var_e16a0092_parts_arr, 0 - $var_e16a0092_dot_level_num);

    if (count($var_e16a0092_extension_parts_arr) !== $var_e16a0092_dot_level_num)
    {
        return false;
    }

    return implode('.', $var_e16a0092_extension_parts_arr);
}
?>