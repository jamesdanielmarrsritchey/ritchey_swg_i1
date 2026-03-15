<?php
function fun_37f2a8c9_get_pixel_rgb_colours_i1_v2(string $var_9b1f0c32_image_path_str, array $var_0f4c1a77_pixels_arr)
{
    if (is_file($var_9b1f0c32_image_path_str) !== TRUE) {
        return FALSE;
    }

    if (is_readable($var_9b1f0c32_image_path_str) !== TRUE) {
        return FALSE;
    }

    if (is_array($var_0f4c1a77_pixels_arr) !== TRUE) {
        return FALSE;
    }

    $var_5b7a1c10_pixel_list_arr = array();

    foreach ($var_0f4c1a77_pixels_arr as $var_c9d0e4f2_index_num => $var_1e34a6d8_pixel_arr) {

        if (is_array($var_1e34a6d8_pixel_arr) !== TRUE) {
            return FALSE;
        }

        if (array_key_exists("x", $var_1e34a6d8_pixel_arr) !== TRUE) {
            return FALSE;
        }

        if (array_key_exists("y", $var_1e34a6d8_pixel_arr) !== TRUE) {
            return FALSE;
        }

        if (is_numeric($var_1e34a6d8_pixel_arr["x"]) !== TRUE) {
            return FALSE;
        }

        if (is_numeric($var_1e34a6d8_pixel_arr["y"]) !== TRUE) {
            return FALSE;
        }

        $var_5b7a1c10_pixel_list_arr[] = array(
            "x" => (int)$var_1e34a6d8_pixel_arr["x"],
            "y" => (int)$var_1e34a6d8_pixel_arr["y"],
        );
    }

    $var_6f26c8b1_image_info_arr = @getimagesize($var_9b1f0c32_image_path_str);
    if ($var_6f26c8b1_image_info_arr === FALSE) {
        return FALSE;
    }

    $var_7a0d3e18_image_type_num = (int)$var_6f26c8b1_image_info_arr[2];

    $var_1a9c2e77_img_obj = FALSE;

    if ($var_7a0d3e18_image_type_num === IMAGETYPE_PNG) {
        if (function_exists("imagecreatefrompng") !== TRUE) {
            return FALSE;
        }
        $var_1a9c2e77_img_obj = @imagecreatefrompng($var_9b1f0c32_image_path_str);

    } elseif ($var_7a0d3e18_image_type_num === IMAGETYPE_JPEG) {
        if (function_exists("imagecreatefromjpeg") !== TRUE) {
            return FALSE;
        }
        $var_1a9c2e77_img_obj = @imagecreatefromjpeg($var_9b1f0c32_image_path_str);

    } elseif ($var_7a0d3e18_image_type_num === IMAGETYPE_WEBP) {
        if (function_exists("imagecreatefromwebp") !== TRUE) {
            return FALSE;
        }
        $var_1a9c2e77_img_obj = @imagecreatefromwebp($var_9b1f0c32_image_path_str);

    } else {
        return FALSE;
    }

    if ($var_1a9c2e77_img_obj === FALSE) {
        return FALSE;
    }

    if (function_exists("imagesavealpha") === TRUE) {
        @imagesavealpha($var_1a9c2e77_img_obj, TRUE);
    }

    $var_8d9f04aa_width_num  = imagesx($var_1a9c2e77_img_obj);
    $var_29f3c1d0_height_num = imagesy($var_1a9c2e77_img_obj);

    if ($var_8d9f04aa_width_num === FALSE || $var_29f3c1d0_height_num === FALSE) {
        imagedestroy($var_1a9c2e77_img_obj);
        return FALSE;
    }

    $var_3a7f6d1b_results_arr = array();

    foreach ($var_5b7a1c10_pixel_list_arr as $var_2d0b7a6c_pixel_arr) {

        $var_4b8e2c19_x_num = (int)$var_2d0b7a6c_pixel_arr["x"];
        $var_6c1a0e55_y_num = (int)$var_2d0b7a6c_pixel_arr["y"];

        if (
            $var_4b8e2c19_x_num < 0 ||
            $var_6c1a0e55_y_num < 0 ||
            $var_4b8e2c19_x_num >= $var_8d9f04aa_width_num ||
            $var_6c1a0e55_y_num >= $var_29f3c1d0_height_num
        ) {
            $var_3a7f6d1b_results_arr[] = array(
                "x" => (string)$var_4b8e2c19_x_num,
                "y" => (string)$var_6c1a0e55_y_num,
                "error" => "out_of_bounds",
            );
            continue;
        }

        $var_1f8d3c61_color_index_num = imagecolorat(
            $var_1a9c2e77_img_obj,
            $var_4b8e2c19_x_num,
            $var_6c1a0e55_y_num
        );

        $var_0b5f2f99_rgba_arr = imagecolorsforindex(
            $var_1a9c2e77_img_obj,
            $var_1f8d3c61_color_index_num
        );

        $var_3b2e7c1a_r_num = (int)$var_0b5f2f99_rgba_arr["red"];
        $var_9f1a6e44_g_num = (int)$var_0b5f2f99_rgba_arr["green"];
        $var_1c6a9d33_b_num = (int)$var_0b5f2f99_rgba_arr["blue"];
        $var_f0b4a812_a_num = array_key_exists("alpha", $var_0b5f2f99_rgba_arr) === TRUE
            ? (int)$var_0b5f2f99_rgba_arr["alpha"]
            : 0;

        $var_5aa9d4d2_hex_str = sprintf(
            "#%02X%02X%02X",
            $var_3b2e7c1a_r_num,
            $var_9f1a6e44_g_num,
            $var_1c6a9d33_b_num
        );

        $var_3a7f6d1b_results_arr[] = array(
            "x" => (string)$var_4b8e2c19_x_num,
            "y" => (string)$var_6c1a0e55_y_num,
            "r" => (string)$var_3b2e7c1a_r_num,
            "g" => (string)$var_9f1a6e44_g_num,
            "b" => (string)$var_1c6a9d33_b_num,
            "a" => (string)$var_f0b4a812_a_num,
            "hex" => $var_5aa9d4d2_hex_str,
        );
    }

    imagedestroy($var_1a9c2e77_img_obj);

    return $var_3a7f6d1b_results_arr;
}
?>