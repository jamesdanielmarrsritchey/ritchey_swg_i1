<?php
function fun_7c3f1a92_hash_file_with_sha3_512_variable_length_i2_v1($var_0b6c9d10_file_path_str, $var_8e7a2c11_return_length_num)
{
    // Validate path
    if (is_string($var_0b6c9d10_file_path_str) !== TRUE) {
        return FALSE;
    }

    if ($var_0b6c9d10_file_path_str === '') {
        return FALSE;
    }

    if (file_exists($var_0b6c9d10_file_path_str) !== TRUE) {
        return FALSE;
    }

    if (is_file($var_0b6c9d10_file_path_str) !== TRUE) {
        return FALSE;
    }

    if (is_readable($var_0b6c9d10_file_path_str) !== TRUE) {
        return FALSE;
    }

    // Validate length
    if (is_int($var_8e7a2c11_return_length_num) !== TRUE) {
        if (is_numeric($var_8e7a2c11_return_length_num) === TRUE) {
            $var_8e7a2c11_return_length_num = (int)$var_8e7a2c11_return_length_num;
        } else {
            return FALSE;
        }
    }

    if ($var_8e7a2c11_return_length_num < 1) {
        return FALSE;
    }

    $var_5a91d0c4_digest_hex_length_num = 128; // SHA3-512 in hex
    $var_2c0b1e77_output_str = '';

    // Small request: one digest is enough.
    if ($var_8e7a2c11_return_length_num <= $var_5a91d0c4_digest_hex_length_num) {
        $var_7b2d4f09_full_hash_str = hash_file('sha3-512', $var_0b6c9d10_file_path_str);
        if ($var_7b2d4f09_full_hash_str === FALSE) {
            return FALSE;
        }
        return substr($var_7b2d4f09_full_hash_str, 0, $var_8e7a2c11_return_length_num);
    }

    // Multi-section mode.
    $var_0f1a7c33_required_digests_num = (int)ceil($var_8e7a2c11_return_length_num / $var_5a91d0c4_digest_hex_length_num);

    $var_4b8c2d6e_file_size_num = filesize($var_0b6c9d10_file_path_str);
    if ($var_4b8c2d6e_file_size_num === FALSE) {
        return FALSE;
    }

    // Target a number of sections that would produce the required digest count.
    $var_1d2f9a60_section_size_num = (int)ceil($var_4b8c2d6e_file_size_num / $var_0f1a7c33_required_digests_num);
    if ($var_1d2f9a60_section_size_num < 1) {
        $var_1d2f9a60_section_size_num = 1;
    }

    // First pass: hash by chosen section size.
    $var_9c4a1b20_handle_obj = fopen($var_0b6c9d10_file_path_str, 'rb');
    if ($var_9c4a1b20_handle_obj === FALSE) {
        return FALSE;
    }

    while (strlen($var_2c0b1e77_output_str) < $var_8e7a2c11_return_length_num) {
        $var_0a8f2c7e_chunk_str = fread($var_9c4a1b20_handle_obj, $var_1d2f9a60_section_size_num);

        if ($var_0a8f2c7e_chunk_str === FALSE) {
            fclose($var_9c4a1b20_handle_obj);
            return FALSE;
        }

        if ($var_0a8f2c7e_chunk_str === '') {
            // EOF reached before desired output length.
            break;
        }

        $var_2c0b1e77_output_str .= hash('sha3-512', $var_0a8f2c7e_chunk_str);
    }

    fclose($var_9c4a1b20_handle_obj);

    // If we got enough, trim and return.
    if (strlen($var_2c0b1e77_output_str) >= $var_8e7a2c11_return_length_num) {
        return substr($var_2c0b1e77_output_str, 0, $var_8e7a2c11_return_length_num);
    }

    // Not enough: hash EACH BYTE separately and return whatever that produces.
    $var_2c0b1e77_output_str = '';

    $var_9c4a1b20_handle_obj = fopen($var_0b6c9d10_file_path_str, 'rb');
    if ($var_9c4a1b20_handle_obj === FALSE) {
        return FALSE;
    }

    while (TRUE) {
        $var_f1a2b3c4_byte_str = fread($var_9c4a1b20_handle_obj, 1);

        if ($var_f1a2b3c4_byte_str === FALSE) {
            fclose($var_9c4a1b20_handle_obj);
            return FALSE;
        }

        if ($var_f1a2b3c4_byte_str === '') {
            // EOF
            break;
        }

        $var_2c0b1e77_output_str .= hash('sha3-512', $var_f1a2b3c4_byte_str);
    }

    fclose($var_9c4a1b20_handle_obj);

    // Return whatever we produced (even if it's under requested length).
    // If the file is empty, this will be an empty string.
    return $var_2c0b1e77_output_str;
}
?>