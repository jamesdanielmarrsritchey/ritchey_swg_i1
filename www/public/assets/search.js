
// Create Or Update Key Value Object
// This function makes an object from a provided key and value. If an existing object is provided is will add to it.
function fun_9c6e2b41_create_or_update_key_value_object_i1_v1(var_a13f0d22_input_obj, var_b4c9e311_key_str, var_c8e71a54_value_uns) {

    // Validate key
    if (typeof var_b4c9e311_key_str !== "string") {
        return false;
    }

    // If null, create a new object
    if (var_a13f0d22_input_obj === null) {
        var_a13f0d22_input_obj = {};
    }

    // Ensure the first argument is an object and not an array
    if (typeof var_a13f0d22_input_obj !== "object" || Array.isArray(var_a13f0d22_input_obj) === true) {
        return false;
    }

    // Add or update the key/value pair
    var_a13f0d22_input_obj[var_b4c9e311_key_str] = var_c8e71a54_value_uns;

    return var_a13f0d22_input_obj;
}

// Replace URL Parameter Values
// Takes a provided URL, or the current URL, and a object, then uses the values from the object to update values in the url, if key exists. Returns the updated url.
function fun_9d2e6a41_replace_url_parameter_values_i1_v1(var_4a71f9c2_url_str, var_8b3c0d55_values_obj) {

    // If URL not provided, use current page URL
    if (typeof var_4a71f9c2_url_str !== "string" || var_4a71f9c2_url_str === "") {
        if (typeof window === "undefined" || !window.location || !window.location.href) {
            return false;
        }
        var_4a71f9c2_url_str = window.location.href;
    }

    // Validate object
    if (typeof var_8b3c0d55_values_obj !== "object" || var_8b3c0d55_values_obj === null || Array.isArray(var_8b3c0d55_values_obj)) {
        return false;
    }

    var var_3f1b7c66_url_obj;

    try {
        var_3f1b7c66_url_obj = new URL(var_4a71f9c2_url_str);
    } catch (var_2a8d4e11_err_uns) {
        return false;
    }

    var var_5c0e2b77_params_obj = var_3f1b7c66_url_obj.searchParams;

    // Iterate through parameters in the URL
    var_5c0e2b77_params_obj.forEach(function(var_7d6a1f33_value_str, var_1e9c5a44_key_str) {

        if (Object.prototype.hasOwnProperty.call(var_8b3c0d55_values_obj, var_1e9c5a44_key_str)) {

            var var_6f2b8d99_new_value_uns = var_8b3c0d55_values_obj[var_1e9c5a44_key_str];

            // Convert arrays to comma-separated strings
            if (Array.isArray(var_6f2b8d99_new_value_uns)) {
                var_6f2b8d99_new_value_uns = var_6f2b8d99_new_value_uns.join(",");
            }

            // Ensure string value
            if (typeof var_6f2b8d99_new_value_uns !== "string") {
                var_6f2b8d99_new_value_uns = String(var_6f2b8d99_new_value_uns);
            }

            var_5c0e2b77_params_obj.set(var_1e9c5a44_key_str, var_6f2b8d99_new_value_uns);
        }

    });

    return var_3f1b7c66_url_obj.toString();
}

// Set Checkbox If Value Exists
// For a specified HTML checkbox element by ID, if a provided array contains the provided string, then check the box.
function set_checkbox_if_value_exists(var_9a4b1f3c_arr, var_2c6e4a91_str, var_7d3f8b20_str) {

    // Ensure first argument is an array
    if (!Array.isArray(var_9a4b1f3c_arr)) {
        return false;
    }

    // Ensure string arguments
    if (typeof var_2c6e4a91_str !== "string" || typeof var_7d3f8b20_str !== "string") {
        return false;
    }

    // Get the checkbox element
    var var_5f1e7c2d_obj = document.getElementById(var_7d3f8b20_str);

    if (!var_5f1e7c2d_obj) {
        return false;
    }

    // Check if array contains the string
    if (var_9a4b1f3c_arr.includes(var_2c6e4a91_str)) {
        var_5f1e7c2d_obj.checked = true;
    } else {
        var_5f1e7c2d_obj.checked = false;
    }

    return true;
}

// Set Radio If Strings Match
// Takes an element ID for a radio button, and if the 2 input strings match, it sets the radio button as selected
function set_radio_if_strings_match(var_4b2e9a71_str, var_8c1d5f33_str, var_7a6e2c19_str) {

    // Ensure first argument is a string
    if (typeof var_4b2e9a71_str !== "string") {
        return false;
    }

    // Ensure second argument is a string
    if (typeof var_8c1d5f33_str !== "string") {
        return false;
    }

    // Ensure element ID is a string
    if (typeof var_7a6e2c19_str !== "string") {
        return false;
    }

    // Get the element
    var var_1f9c7b22_obj = document.getElementById(var_7a6e2c19_str);

    if (!var_1f9c7b22_obj) {
        return false;
    }

    // Compare the strings
    if (var_4b2e9a71_str === var_8c1d5f33_str) {
        var_1f9c7b22_obj.checked = true;
    }

    return true;
}

// Write Array Words To Input
// Takes an array of words and fills them into a specified text input
function write_array_words_to_input_v1(var_8c2f_input_id_str, var_a41d_words_arr) {

    // Validate input id
    if (typeof var_8c2f_input_id_str !== "string") {
        return false;
    }

    // Validate array
    if (Array.isArray(var_a41d_words_arr) === false) {
        return false;
    }

    // Get the input element
    var var_2e11_input_ele = document.getElementById(var_8c2f_input_id_str);

    if (var_2e11_input_ele === null) {
        return false;
    }

    // Create cleaned array
    var var_5d7c_clean_arr = [];

    for (var var_9b10_i_num = 0; var_9b10_i_num < var_a41d_words_arr.length; var_9b10_i_num++) {

        var var_7a33_value_str = var_a41d_words_arr[var_9b10_i_num];

        if (typeof var_7a33_value_str === "string") {

            var_7a33_value_str = var_7a33_value_str.trim();

            if (var_7a33_value_str !== "") {
                var_5d7c_clean_arr.push(var_7a33_value_str);
            }

        }

    }

    // Join values with spaces
    var var_f4b2_joined_str = var_5d7c_clean_arr.join(" ");

    // Write to input
    var_2e11_input_ele.value = var_f4b2_joined_str;

    return true;

}

// Update Number Input Value
// For the provided number input (by ID) update the number to the provided number.
function fun_a1c4d8e2_update_number_input_value_i1_v1(var_a1c4d8e2_value_uns, var_a1c4d8e2_input_id_str) {

    // Validate input ID
    if (typeof var_a1c4d8e2_input_id_str !== "string" || var_a1c4d8e2_input_id_str === "") {
        return false;
    }

    // Get element
    var var_a1c4d8e2_element_obj = document.getElementById(var_a1c4d8e2_input_id_str);

    if (var_a1c4d8e2_element_obj === null) {
        return false;
    }

    // Determine numeric value
    var var_a1c4d8e2_value_num;

    if (typeof var_a1c4d8e2_value_uns === "number") {
        var_a1c4d8e2_value_num = var_a1c4d8e2_value_uns;
    }
    else if (typeof var_a1c4d8e2_value_uns === "string") {

        if (var_a1c4d8e2_value_uns.trim() === "") {
            return false;
        }

        var_a1c4d8e2_value_num = Number(var_a1c4d8e2_value_uns);

        if (isNaN(var_a1c4d8e2_value_num) === true) {
            return false;
        }
    }
    else {
        return false;
    }

    // Update input value
    var_a1c4d8e2_element_obj.value = var_a1c4d8e2_value_num;

    return true;
}

// Replace Or Add URL Parameter Values Preserve Commas
// Updates a URL string with values from an object, or adds them if they exist in the object but not the url.
function fun_3e41b7c2_replace_or_add_url_parameter_values_preserve_commas_i1_v1(
    var_1a4f6d8e_url_str,
    var_7c3b9e21_values_obj,
    var_5f8a2d33_add_missing_boo
) {

    // Use current URL if not provided
    if (typeof var_1a4f6d8e_url_str !== "string" || var_1a4f6d8e_url_str === "") {
        if (typeof window === "undefined" || !window.location || !window.location.href) {
            return false;
        }
        var_1a4f6d8e_url_str = window.location.href;
    }

    // Validate inputs
    if (typeof var_7c3b9e21_values_obj !== "object" || var_7c3b9e21_values_obj === null || Array.isArray(var_7c3b9e21_values_obj)) {
        return false;
    }

    if (typeof var_5f8a2d33_add_missing_boo !== "boolean") {
        return false;
    }

    var var_6e2c1a55_url_obj;

    try {
        var_6e2c1a55_url_obj = new URL(var_1a4f6d8e_url_str);
    } catch (var_9b5c8f77_error_uns) {
        return false;
    }

    var var_8d1f3b90_params_arr = [];
    var var_2c6a4d11_seen_keys_obj = {};

    var var_4f3e7c22_query_str = var_6e2c1a55_url_obj.search.replace(/^\?/, "");

    if (var_4f3e7c22_query_str !== "") {

        var var_1d8b2e66_parts_arr = var_4f3e7c22_query_str.split("&");

        for (var var_5b3f1c99_i_num = 0; var_5b3f1c99_i_num < var_1d8b2e66_parts_arr.length; var_5b3f1c99_i_num++) {

            var var_7a2c8e55_part_str = var_1d8b2e66_parts_arr[var_5b3f1c99_i_num];
            var var_3c6f2a18_split_arr = var_7a2c8e55_part_str.split("=");

            var var_9d1e5c44_key_str = decodeURIComponent(var_3c6f2a18_split_arr[0]);
            var var_0a4d7f33_val_str = var_3c6f2a18_split_arr.slice(1).join("=");

            var_2c6a4d11_seen_keys_obj[var_9d1e5c44_key_str] = true;

            if (Object.prototype.hasOwnProperty.call(var_7c3b9e21_values_obj, var_9d1e5c44_key_str)) {

                var var_1f2e8b77_new_val_uns = var_7c3b9e21_values_obj[var_9d1e5c44_key_str];

                if (Array.isArray(var_1f2e8b77_new_val_uns)) {
                    var_1f2e8b77_new_val_uns = var_1f2e8b77_new_val_uns.join(",");
                }

                if (typeof var_1f2e8b77_new_val_uns !== "string") {
                    var_1f2e8b77_new_val_uns = String(var_1f2e8b77_new_val_uns);
                }

                var_0a4d7f33_val_str = encodeURIComponent(var_1f2e8b77_new_val_uns).replace(/%2C/g, ",");
            }

            var_8d1f3b90_params_arr.push(
                encodeURIComponent(var_9d1e5c44_key_str) + "=" + var_0a4d7f33_val_str
            );
        }
    }

    // Add missing parameters if allowed
    if (var_5f8a2d33_add_missing_boo === true) {

        for (var var_6f9b2c14_key_str in var_7c3b9e21_values_obj) {

            if (Object.prototype.hasOwnProperty.call(var_7c3b9e21_values_obj, var_6f9b2c14_key_str)) {

                if (!var_2c6a4d11_seen_keys_obj[var_6f9b2c14_key_str]) {

                    var var_8a7d3e66_add_val_uns = var_7c3b9e21_values_obj[var_6f9b2c14_key_str];

                    if (Array.isArray(var_8a7d3e66_add_val_uns)) {
                        var_8a7d3e66_add_val_uns = var_8a7d3e66_add_val_uns.join(",");
                    }

                    if (typeof var_8a7d3e66_add_val_uns !== "string") {
                        var_8a7d3e66_add_val_uns = String(var_8a7d3e66_add_val_uns);
                    }

                    var var_2e4f6c11_encoded_val_str =
                        encodeURIComponent(var_8a7d3e66_add_val_uns).replace(/%2C/g, ",");

                    var_8d1f3b90_params_arr.push(
                        encodeURIComponent(var_6f9b2c14_key_str) + "=" + var_2e4f6c11_encoded_val_str
                    );
                }
            }
        }
    }

    var var_7c8e5b22_new_query_str = var_8d1f3b90_params_arr.join("&");

    return (
        var_6e2c1a55_url_obj.origin +
        var_6e2c1a55_url_obj.pathname +
        (var_7c8e5b22_new_query_str ? "?" + var_7c8e5b22_new_query_str : "") +
        var_6e2c1a55_url_obj.hash
    );
}

// Update Inputs From HTML Data
// Uses a specified element's innerHTML to update content of a specified input. For text inputs, any text matches if bool true is the value searched for.
function fun_e16a0092_innerhtml_input_update_i1776011660_v1(var_e16a0092_source_id_str, var_e16a0092_input_id_str, var_e16a0092_value_uns) {

    var var_e16a0092_source_value_str = '';
    var var_e16a0092_source_array_arr = [];
    var var_e16a0092_match_found_boo = false;
    var var_e16a0092_matched_value_str = '';
    var var_e16a0092_text_value_to_write_str = '';

    var_e16a0092_source_id_str = String(var_e16a0092_source_id_str);
    var_e16a0092_input_id_str = String(var_e16a0092_input_id_str);

    var var_e16a0092_source_ele = document.getElementById(var_e16a0092_source_id_str);

    if (!var_e16a0092_source_ele) {
        return false;
    }

    var_e16a0092_source_value_str = String(var_e16a0092_source_ele.innerHTML || '').trim();

    if (!var_e16a0092_source_value_str) {
        return false;
    }

    if (var_e16a0092_source_value_str.indexOf(',') !== -1) {
        var_e16a0092_source_array_arr = var_e16a0092_source_value_str.split(',');
    } else {
        var_e16a0092_source_array_arr = [var_e16a0092_source_value_str];
    }

    for (var var_e16a0092_i_num = 0; var_e16a0092_i_num < var_e16a0092_source_array_arr.length; var_e16a0092_i_num++) {
        var_e16a0092_source_array_arr[var_e16a0092_i_num] = String(var_e16a0092_source_array_arr[var_e16a0092_i_num]).trim();
    }

    var var_e16a0092_input_ele = document.getElementById(var_e16a0092_input_id_str);

    if (!var_e16a0092_input_ele) {
        return false;
    }

    var var_e16a0092_input_type_str = String(var_e16a0092_input_ele.type || '').toLowerCase();

    if (var_e16a0092_input_type_str === 'checkbox' || var_e16a0092_input_type_str === 'radio') {

        var var_e16a0092_value_str = String(var_e16a0092_value_uns);
        var var_e16a0092_value_lower_str = var_e16a0092_value_str.toLowerCase();

        for (var var_e16a0092_j_num = 0; var_e16a0092_j_num < var_e16a0092_source_array_arr.length; var_e16a0092_j_num++) {
            var var_e16a0092_current_value_str = String(var_e16a0092_source_array_arr[var_e16a0092_j_num]).trim();

            if (var_e16a0092_current_value_str.toLowerCase() === var_e16a0092_value_lower_str) {
                var_e16a0092_match_found_boo = true;
                var_e16a0092_matched_value_str = var_e16a0092_current_value_str;
                break;
            }
        }

        if (!var_e16a0092_match_found_boo) {
            return false;
        }

        var_e16a0092_input_ele.checked = true;
        return true;
    }

    if (var_e16a0092_value_uns === true) {
        var_e16a0092_match_found_boo = true;
        var_e16a0092_text_value_to_write_str = var_e16a0092_source_array_arr.join(' ');
    } else {
        var var_e16a0092_value_str = String(var_e16a0092_value_uns);
        var var_e16a0092_value_lower_str = var_e16a0092_value_str.toLowerCase();

        for (var var_e16a0092_k_num = 0; var_e16a0092_k_num < var_e16a0092_source_array_arr.length; var_e16a0092_k_num++) {
            var var_e16a0092_current_value_str = String(var_e16a0092_source_array_arr[var_e16a0092_k_num]).trim();

            if (var_e16a0092_current_value_str.toLowerCase() === var_e16a0092_value_lower_str) {
                var_e16a0092_match_found_boo = true;
                var_e16a0092_matched_value_str = var_e16a0092_current_value_str;
                break;
            }
        }

        if (!var_e16a0092_match_found_boo) {
            return false;
        }

        var_e16a0092_text_value_to_write_str = var_e16a0092_matched_value_str;
    }

    var var_e16a0092_existing_value_str = String(var_e16a0092_input_ele.value || '').trim();

    if (var_e16a0092_existing_value_str.length > 0) {
        var_e16a0092_input_ele.value = var_e16a0092_existing_value_str + ' ' + var_e16a0092_text_value_to_write_str;
    } else {
        var_e16a0092_input_ele.value = var_e16a0092_text_value_to_write_str;
    }

    return true;
}

// Update Inputs From HTML Data
// Uses a specified elements innerHTML to update content of a specified input
function fun_e16a0092_innerhtml_input_update_i1776011659_v1(var_e16a0092_source_id_str, var_e16a0092_input_id_str, var_e16a0092_value_str) {

    var var_e16a0092_return_boo = false;
    var var_e16a0092_source_value_str = '';
    var var_e16a0092_source_array_arr = [];
    var var_e16a0092_match_found_boo = false;
    var var_e16a0092_matched_value_str = '';

    // Normalize inputs
    var_e16a0092_source_id_str = String(var_e16a0092_source_id_str);
    var_e16a0092_input_id_str = String(var_e16a0092_input_id_str);
    var_e16a0092_value_str = String(var_e16a0092_value_str);

    // Get source element
    var var_e16a0092_source_ele = document.getElementById(var_e16a0092_source_id_str);

    if (!var_e16a0092_source_ele) {
        return false;
    }

    var_e16a0092_source_value_str = String(var_e16a0092_source_ele.innerHTML || '').trim();

    if (!var_e16a0092_source_value_str) {
        return false;
    }

    // Convert to array if comma-separated
    if (var_e16a0092_source_value_str.indexOf(',') !== -1) {
        var_e16a0092_source_array_arr = var_e16a0092_source_value_str.split(',');
    } else {
        var_e16a0092_source_array_arr = [var_e16a0092_source_value_str];
    }

    // Normalize comparison
    var var_e16a0092_value_lower_str = var_e16a0092_value_str.toLowerCase();

    // Find match
    for (var var_e16a0092_i_num = 0; var_e16a0092_i_num < var_e16a0092_source_array_arr.length; var_e16a0092_i_num++) {
        var var_e16a0092_current_value_str = String(var_e16a0092_source_array_arr[var_e16a0092_i_num]).trim();

        if (var_e16a0092_current_value_str.toLowerCase() === var_e16a0092_value_lower_str) {
            var_e16a0092_match_found_boo = true;
            var_e16a0092_matched_value_str = var_e16a0092_current_value_str;
            break;
        }
    }

    if (!var_e16a0092_match_found_boo) {
        return false;
    }

    // Get input element
    var var_e16a0092_input_ele = document.getElementById(var_e16a0092_input_id_str);

    if (!var_e16a0092_input_ele) {
        return false;
    }

    var var_e16a0092_input_type_str = (var_e16a0092_input_ele.type || '').toLowerCase();

    // Checkbox
    if (var_e16a0092_input_type_str === 'checkbox') {
        var_e16a0092_input_ele.checked = true;
        return true;
    }

    // Radio
    if (var_e16a0092_input_type_str === 'radio') {
        var_e16a0092_input_ele.checked = true;
        return true;
    }

    // Text-like input (append, do not overwrite)
    var var_e16a0092_existing_value_str = String(var_e16a0092_input_ele.value || '').trim();

    if (var_e16a0092_existing_value_str.length > 0) {
        var_e16a0092_input_ele.value = var_e16a0092_existing_value_str + ' ' + var_e16a0092_matched_value_str;
    } else {
        var_e16a0092_input_ele.value = var_e16a0092_matched_value_str;
    }

    return true;
}

// Update Inputs From Parameters
// Uses a specified parameter to update the content of a specified input
function fun_e16a0092_url_param_input_update_i1776011658_v1(var_e16a0092_param_str, var_e16a0092_input_id_str, var_e16a0092_value_str) {

    var var_e16a0092_return_boo = false;
    var var_e16a0092_param_value_str = '';
    var var_e16a0092_param_array_arr = [];
    var var_e16a0092_match_found_boo = false;
    var var_e16a0092_matched_value_str = '';

    // Normalize inputs
    var_e16a0092_param_str = String(var_e16a0092_param_str);
    var_e16a0092_input_id_str = String(var_e16a0092_input_id_str);
    var_e16a0092_value_str = String(var_e16a0092_value_str);

    // Get URL params
    var var_e16a0092_url_obj = new URL(window.location.href);
    var var_e16a0092_search_params_obj = var_e16a0092_url_obj.searchParams;

    if (!var_e16a0092_search_params_obj.has(var_e16a0092_param_str)) {
        return false;
    }

    var_e16a0092_param_value_str = var_e16a0092_search_params_obj.get(var_e16a0092_param_str);

    if (!var_e16a0092_param_value_str) {
        return false;
    }

    // Convert to array if needed
    if (var_e16a0092_param_value_str.indexOf(',') !== -1) {
        var_e16a0092_param_array_arr = var_e16a0092_param_value_str.split(',');
    } else {
        var_e16a0092_param_array_arr = [var_e16a0092_param_value_str];
    }

    // Normalize comparison
    var var_e16a0092_value_lower_str = var_e16a0092_value_str.toLowerCase();

    // Find match
    for (var var_e16a0092_i_num = 0; var_e16a0092_i_num < var_e16a0092_param_array_arr.length; var_e16a0092_i_num++) {
        var var_e16a0092_current_value_str = String(var_e16a0092_param_array_arr[var_e16a0092_i_num]).trim();

        if (var_e16a0092_current_value_str.toLowerCase() === var_e16a0092_value_lower_str) {
            var_e16a0092_match_found_boo = true;
            var_e16a0092_matched_value_str = var_e16a0092_current_value_str;
            break;
        }
    }

    if (!var_e16a0092_match_found_boo) {
        return false;
    }

    // Get element
    var var_e16a0092_input_ele = document.getElementById(var_e16a0092_input_id_str);

    if (!var_e16a0092_input_ele) {
        return false;
    }

    var var_e16a0092_input_type_str = (var_e16a0092_input_ele.type || '').toLowerCase();

    // Checkbox
    if (var_e16a0092_input_type_str === 'checkbox') {
        var_e16a0092_input_ele.checked = true;
        return true;
    }

    // Radio
    if (var_e16a0092_input_type_str === 'radio') {
        var_e16a0092_input_ele.checked = true;
        return true;
    }

    // Text-like input
    var var_e16a0092_existing_value_str = String(var_e16a0092_input_ele.value || '').trim();

    if (var_e16a0092_existing_value_str.length > 0) {
        var_e16a0092_input_ele.value = var_e16a0092_existing_value_str + ' ' + var_e16a0092_matched_value_str;
    } else {
        var_e16a0092_input_ele.value = var_e16a0092_matched_value_str;
    }

    return true;
}

