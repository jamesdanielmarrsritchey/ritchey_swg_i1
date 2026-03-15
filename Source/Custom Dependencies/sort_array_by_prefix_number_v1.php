<?php
function fun_59c11587048449e5b72ee3b55f1a6585_sort_array_by_prefix_number_v1($var_2f3e4d5c6b7a4891a0b1c2d3e4f5a6b7_arr)
{
    if (is_array($var_2f3e4d5c6b7a4891a0b1c2d3e4f5a6b7_arr) !== TRUE) {
        return [];
    }

    $var_9a8b7c6d5e4f3210a1b2c3d4e5f6a7b8_arr = $var_2f3e4d5c6b7a4891a0b1c2d3e4f5a6b7_arr;

    usort(
        $var_9a8b7c6d5e4f3210a1b2c3d4e5f6a7b8_arr,
        function ($var_11112222333344445555666677778888_str, $var_88887777666655554444333322221111_str)
        {
            $var_a1a1a1a1b2b2b2b2c3c3c3c3d4d4d4d4_uns = explode('_', $var_11112222333344445555666677778888_str, 2);
            $var_d4d4d4d4c3c3c3c3b2b2b2b2a1a1a1a1_uns = explode('_', $var_88887777666655554444333322221111_str, 2);

            $var_aaaaaaaa11111111bbbbbbbb22222222_uns = PHP_INT_MAX;
            if (isset($var_a1a1a1a1b2b2b2b2c3c3c3c3d4d4d4d4_uns[0]) === TRUE) {
                $var_aaaaaaaa11111111bbbbbbbb22222222_uns = (int)$var_a1a1a1a1b2b2b2b2c3c3c3c3d4d4d4d4_uns[0];
            }

            $var_22222222bbbbbbbb11111111aaaaaaaa_uns = PHP_INT_MAX;
            if (isset($var_d4d4d4d4c3c3c3c3b2b2b2b2a1a1a1a1_uns[0]) === TRUE) {
                $var_22222222bbbbbbbb11111111aaaaaaaa_uns = (int)$var_d4d4d4d4c3c3c3c3b2b2b2b2a1a1a1a1_uns[0];
            }

            if ($var_aaaaaaaa11111111bbbbbbbb22222222_uns < $var_22222222bbbbbbbb11111111aaaaaaaa_uns) {
                return -1;
            }

            if ($var_aaaaaaaa11111111bbbbbbbb22222222_uns > $var_22222222bbbbbbbb11111111aaaaaaaa_uns) {
                return 1;
            }

            return strcmp(
                $var_11112222333344445555666677778888_str,
                $var_88887777666655554444333322221111_str
            );
        }
    );

    return $var_9a8b7c6d5e4f3210a1b2c3d4e5f6a7b8_arr;
}
?>