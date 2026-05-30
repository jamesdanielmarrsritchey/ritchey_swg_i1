// Add Class To Element By ID
// Adds a specified class to an element, after any existing classes
function fun_a3f91c2b_add_class_to_element_by_id_i1714752000_v1(var_a3f91c2b_id_str, var_a3f91c2b_class_str) {
    var var_a3f91c2b_element_obj = document.getElementById(var_a3f91c2b_id_str);

    if (var_a3f91c2b_element_obj === null) {
        return false;
    }

    var var_a3f91c2b_existing_classes_str = String(var_a3f91c2b_element_obj.className);
    var var_a3f91c2b_new_class_str = String(var_a3f91c2b_class_str);

    var var_a3f91c2b_classes_arr = var_a3f91c2b_existing_classes_str.split(" ");
    var var_a3f91c2b_exists_boo = false;

    for (var var_a3f91c2b_i_num = 0; var_a3f91c2b_i_num < var_a3f91c2b_classes_arr.length; var_a3f91c2b_i_num++) {
        if (var_a3f91c2b_classes_arr[var_a3f91c2b_i_num] === var_a3f91c2b_new_class_str) {
            var_a3f91c2b_exists_boo = true;
        }
    }

    if (var_a3f91c2b_exists_boo === false) {
        if (var_a3f91c2b_existing_classes_str.trim() === "") {
            var_a3f91c2b_element_obj.className = var_a3f91c2b_new_class_str;
        } else {
            var_a3f91c2b_element_obj.className = var_a3f91c2b_existing_classes_str + " " + var_a3f91c2b_new_class_str;
        }
    }

    return true;
}

// Redirect To URL
function fun_9f3a7c2e_redirect_to_url_i1_v1(var_9f3a7c2e_url_str) {

    // Check that the provided value is a string
    if (typeof var_9f3a7c2e_url_str !== "string") {
        console.error("Error: URL must be a string.");
        return false;
    }

    // Trim whitespace
    var var_9f3a7c2e_url_trimmed_str = var_9f3a7c2e_url_str.trim();

    // Check that the string is not empty
    if (var_9f3a7c2e_url_trimmed_str === "") {
        console.error("Error: URL cannot be empty.");
        return false;
    }

    // Perform redirect
    window.location.href = var_9f3a7c2e_url_trimmed_str;

    return true;
}

// Get Input Values By ID
// Get the text or return true if input is selected
function fun_e16a0092_get_input_value_by_id_i1713225600_v2(var_e16a0092_input_id_str) {
    var var_e16a0092_element_obj = document.getElementById(var_e16a0092_input_id_str);

    // If element doesn't exist
    if (!var_e16a0092_element_obj) {
        return false;
    }

    var var_e16a0092_type_str = (var_e16a0092_element_obj.type || "").toLowerCase();

    // Text-based inputs (ONLY return if user has modified it)
    if (
        var_e16a0092_type_str === "text" ||
        var_e16a0092_type_str === "password" ||
        var_e16a0092_type_str === "email" ||
        var_e16a0092_type_str === "search" ||
        var_e16a0092_type_str === "url" ||
        var_e16a0092_type_str === "tel"
    ) {
        // Check if user has changed the value from default
        if (var_e16a0092_element_obj.value !== var_e16a0092_element_obj.defaultValue) {
            var var_e16a0092_value_str = var_e16a0092_element_obj.value;

            if (var_e16a0092_value_str && var_e16a0092_value_str.trim() !== "") {
                return var_e16a0092_value_str;
            }
        }

        return false;
    }

    // Checkbox or radio (checked state is always current state, not default)
    if (
        var_e16a0092_type_str === "checkbox" ||
        var_e16a0092_type_str === "radio"
    ) {
        return var_e16a0092_element_obj.checked === true ? true : false;
    }

    return false;
}


// Convert Relative URLs To Full URLs
// Description: Finds elements with the attribute "data-relative-url="true"", and prepends a provided base URL to them.
function fun_c82d4f19_convert_relative_urls_to_full_urls_i2_v1(var_a19f3e77_base_url_str) {

    // Validate base URL
    if (typeof var_a19f3e77_base_url_str !== "string") {
        return false;
    }

    // Remove trailing slash from base URL if present
    if (var_a19f3e77_base_url_str.endsWith("/") === true) {
        var_a19f3e77_base_url_str =
            var_a19f3e77_base_url_str.slice(0, -1);
    }

    // Get all elements that contain data-relative-url
    var var_4d7b91ac_elements_arr =
        document.querySelectorAll("[data-relative-url]");

    var var_0f93a6e2_index_num = 0;

    while (var_0f93a6e2_index_num < var_4d7b91ac_elements_arr.length) {

        var var_73c2d9e4_element_obj =
            var_4d7b91ac_elements_arr[var_0f93a6e2_index_num];

        var var_9c2fa410_data_value_str =
            var_73c2d9e4_element_obj.getAttribute("data-relative-url");

        // Only process if explicitly "true"
        if (var_9c2fa410_data_value_str !== "true") {
            var_0f93a6e2_index_num++;
            continue;
        }

        var var_5ab1c832_url_str = null;

        // Determine where the URL is stored
        if (var_73c2d9e4_element_obj.hasAttribute("href") === true) {
            var_5ab1c832_url_str =
                var_73c2d9e4_element_obj.getAttribute("href");
        }
        else if (var_73c2d9e4_element_obj.hasAttribute("src") === true) {
            var_5ab1c832_url_str =
                var_73c2d9e4_element_obj.getAttribute("src");
        }

        // If no URL found, skip
        if (typeof var_5ab1c832_url_str !== "string") {
            var_0f93a6e2_index_num++;
            continue;
        }

        // Skip absolute URLs
        if (
            var_5ab1c832_url_str.indexOf("http://") === 0 ||
            var_5ab1c832_url_str.indexOf("https://") === 0 ||
            var_5ab1c832_url_str.indexOf("//") === 0
        ) {
            var_0f93a6e2_index_num++;
            continue;
        }

        // Ensure URL starts with "/"
        if (var_5ab1c832_url_str.charAt(0) !== "/") {
            var_5ab1c832_url_str =
                "/" + var_5ab1c832_url_str;
        }

        var var_6e48db71_full_url_str =
            var_a19f3e77_base_url_str +
            var_5ab1c832_url_str;

        // Update element
        if (var_73c2d9e4_element_obj.hasAttribute("href") === true) {
            var_73c2d9e4_element_obj.setAttribute(
                "href",
                var_6e48db71_full_url_str
            );
        }
        else if (var_73c2d9e4_element_obj.hasAttribute("src") === true) {
            var_73c2d9e4_element_obj.setAttribute(
                "src",
                var_6e48db71_full_url_str
            );
        }

        // Mark as processed
        var_73c2d9e4_element_obj.setAttribute(
            "data-relative-url",
            "1"
        );

        var_0f93a6e2_index_num++;
    }

    return true;
}

// Set Element InnerHTML By ID
// Description: Assigns a string value to the innerHTML of an element by ID.
function fun_e16a0092_set_element_innerhtml_by_id_i2_v1(var_e16a0092_element_id_str, var_e16a0092_content_str)
{
    var var_e16a0092_element_obj = null;

    if (typeof var_e16a0092_element_id_str !== "string")
    {
        return false;
    }

    var_e16a0092_element_obj = document.getElementById(var_e16a0092_element_id_str);

    if (!var_e16a0092_element_obj)
    {
        return false;
    }

    try
    {
        var_e16a0092_element_obj.innerHTML = String(var_e16a0092_content_str);
        return true;
    }
    catch (var_e16a0092_error_obj)
    {
        return false;
    }
}

// Get Parameter Value
// This function returns the value of a parameter in the URL, or false if there isn't a value, or it doesn't exist.
function fun_7c2a9b1e_get_parameter_value_i1_v1(var_a81d4f21_parameter_name_str)
{

    // Ensure input is a string
    if (typeof var_a81d4f21_parameter_name_str !== "string") {
        return false;
    }

    // Get the query string without the "?"
    var_b12f6c44_query_string_str = window.location.search.substring(1);

    // If there are no parameters
    if (var_b12f6c44_query_string_str.length === 0) {
        return false;
    }

    // Split parameters into array
    var_c73e91a2_parameters_arr = var_b12f6c44_query_string_str.split("&");

    // Loop through parameters
    for (var_d98a4c17_index_num = 0; var_d98a4c17_index_num < var_c73e91a2_parameters_arr.length; var_d98a4c17_index_num++)
    {

        var_e63f1a55_pair_arr = var_c73e91a2_parameters_arr[var_d98a4c17_index_num].split("=");

        var_f21c4b8d_name_str = decodeURIComponent(var_e63f1a55_pair_arr[0]);

        if (var_f21c4b8d_name_str === var_a81d4f21_parameter_name_str)
        {

            // Parameter exists but has no value
            if (typeof var_e63f1a55_pair_arr[1] === "undefined" || var_e63f1a55_pair_arr[1] === "") {
                return false;
            }

            var_g14d8e63_value_str = decodeURIComponent(var_e63f1a55_pair_arr[1]);

            return var_g14d8e63_value_str;
        }

    }

    // Parameter not found
    return false;

}

// Split String By Multiple Delimiters
// Converts a string into an array by splitting on whitespace, line endings, comma, underscore, plus, and percent characters. Split characters are not retained.
function fun_9a7c4c2b_split_string_by_multiple_delimiters_i1_v1(var_4b6f7c2d_input_str)
{
    
    // Ensure input is a string
    if (typeof var_4b6f7c2d_input_str !== "string")
    {
        return false;
    }

    // Split the string using a regex for the specified delimiters
    var var_a3c9f1e7_result_arr = var_4b6f7c2d_input_str.split(/[\s,\_\+\%]+/);

    // Remove empty values that may occur from leading/trailing delimiters
    var var_f7a82d11_clean_arr = [];

    for (var var_11c3d9aa_index_num = 0; var_11c3d9aa_index_num < var_a3c9f1e7_result_arr.length; var_11c3d9aa_index_num++)
    {
        if (var_a3c9f1e7_result_arr[var_11c3d9aa_index_num] !== "")
        {
            var_f7a82d11_clean_arr.push(var_a3c9f1e7_result_arr[var_11c3d9aa_index_num]);
        }
    }

    return var_f7a82d11_clean_arr;

}

// Convert Any To String
// Converts any variable to a string
function convert_any_to_string_v1(var_a1b2c3_input_mix) {

    // If the value is already a string, return it as-is
    if (typeof var_a1b2c3_input_mix === "string") {
        return var_a1b2c3_input_mix;
    }

    // If the value is null or undefined, return empty string
    if (var_a1b2c3_input_mix === null || typeof var_a1b2c3_input_mix === "undefined") {
        return "";
    }

    // If the value is an array
    if (Array.isArray(var_a1b2c3_input_mix)) {
        return var_a1b2c3_input_mix.join(",");
    }

    // If the value is an object
    if (typeof var_a1b2c3_input_mix === "object") {

        var var_d4e5f6_values_arr = [];

        for (var var_g7h8i9_key_str in var_a1b2c3_input_mix) {
            if (Object.prototype.hasOwnProperty.call(var_a1b2c3_input_mix, var_g7h8i9_key_str)) {
                var_d4e5f6_values_arr.push(String(var_a1b2c3_input_mix[var_g7h8i9_key_str]));
            }
        }

        return var_d4e5f6_values_arr.join(",");
    }

    // For numbers, booleans, etc.
    return String(var_a1b2c3_input_mix);
}

// Toggle Element Display
// Change whether an element is displayed, or display none
function fun_a4c92b1e_toggle_element_display_i2_v1(var_a4c92b1e_element_id_str)
{
    if(typeof var_a4c92b1e_element_id_str !== "string")
    {
        return false;
    }

    var var_a4c92b1e_element_obj = document.getElementById(var_a4c92b1e_element_id_str);

    if(!var_a4c92b1e_element_obj)
    {
        return false;
    }

    var var_a4c92b1e_current_display_str = window.getComputedStyle(var_a4c92b1e_element_obj).display;
    var var_a4c92b1e_previous_display_str = var_a4c92b1e_element_obj.getAttribute("data-previous-display");

    if(var_a4c92b1e_current_display_str !== "none")
    {
        var_a4c92b1e_previous_display_str = var_a4c92b1e_element_obj.style.display;

        if(!var_a4c92b1e_previous_display_str || var_a4c92b1e_previous_display_str === "")
        {
            var_a4c92b1e_previous_display_str = "";
        }

        var_a4c92b1e_element_obj.setAttribute("data-previous-display", var_a4c92b1e_previous_display_str);
        var_a4c92b1e_element_obj.style.display = "none";

        return true;
    }
    else
    {
        if(var_a4c92b1e_previous_display_str && var_a4c92b1e_previous_display_str !== "none")
        {
            var_a4c92b1e_element_obj.style.display = var_a4c92b1e_previous_display_str;
        }
        else
        {
            var_a4c92b1e_element_obj.style.display = "";
        }

        var_a4c92b1e_element_obj.setAttribute("data-previous-display", "none");

        return true;
    }
}



// Convert Any Value to Space Separated String
// This function takes a value, and converts it to a string. If it's a variable with multiple values in it (e.g., array, or object) all values are put in the string with spaces to separate them.
/*
    Function:
    fun_e16a0092_convert_any_value_to_space_separated_string_i2_v1

    Description:
    Accepts any input type and converts it to a string.
    Multiple values are separated by a single space.
    Arrays and objects are processed recursively.

    Returns:
    - string on success
    - bool false on failure
*/

function fun_e16a0092_convert_any_value_to_space_separated_string_i2_v1(var_e16a0092_input_uns) {

    try {

        function fun_e16a0092_extract_values_to_array_i2_v1(var_e16a0092_value_uns) {

            var var_e16a0092_output_arr = [];
            var var_e16a0092_index_num = 0;
            var var_e16a0092_keys_arr = [];
            var var_e16a0092_key_str = "";
            var var_e16a0092_child_values_arr = [];

            if (var_e16a0092_value_uns === null || typeof var_e16a0092_value_uns === "undefined") {
                return var_e16a0092_output_arr;
            }

            if (typeof var_e16a0092_value_uns === "string") {
                var_e16a0092_output_arr.push(var_e16a0092_value_uns);
                return var_e16a0092_output_arr;
            }

            if (typeof var_e16a0092_value_uns === "number") {
                var_e16a0092_output_arr.push(String(var_e16a0092_value_uns));
                return var_e16a0092_output_arr;
            }

            if (typeof var_e16a0092_value_uns === "boolean") {
                var_e16a0092_output_arr.push(String(var_e16a0092_value_uns));
                return var_e16a0092_output_arr;
            }

            if (Array.isArray(var_e16a0092_value_uns) === true) {
                for (var_e16a0092_index_num = 0; var_e16a0092_index_num < var_e16a0092_value_uns.length; var_e16a0092_index_num++) {
                    var_e16a0092_child_values_arr = fun_e16a0092_extract_values_to_array_i2_v1(var_e16a0092_value_uns[var_e16a0092_index_num]);
                    var_e16a0092_output_arr = var_e16a0092_output_arr.concat(var_e16a0092_child_values_arr);
                }
                return var_e16a0092_output_arr;
            }

            if (typeof var_e16a0092_value_uns === "object") {
                var_e16a0092_keys_arr = Object.keys(var_e16a0092_value_uns);

                for (var_e16a0092_index_num = 0; var_e16a0092_index_num < var_e16a0092_keys_arr.length; var_e16a0092_index_num++) {
                    var_e16a0092_key_str = var_e16a0092_keys_arr[var_e16a0092_index_num];
                    var_e16a0092_child_values_arr = fun_e16a0092_extract_values_to_array_i2_v1(var_e16a0092_value_uns[var_e16a0092_key_str]);
                    var_e16a0092_output_arr = var_e16a0092_output_arr.concat(var_e16a0092_child_values_arr);
                }

                return var_e16a0092_output_arr;
            }

            var_e16a0092_output_arr.push(String(var_e16a0092_value_uns));
            return var_e16a0092_output_arr;
        }

        var var_e16a0092_result_arr = fun_e16a0092_extract_values_to_array_i2_v1(var_e16a0092_input_uns);
        var var_e16a0092_result_str = var_e16a0092_result_arr.join(" ");

        return var_e16a0092_result_str;

    } catch (var_e16a0092_error_uns) {
        return false;
    }
}

// Compare String Values
// This function checks if the words in string 1 are present in string 2, and returns an object which contains the number of items searched for, the number of them that were found, and which percentage of the searched for items were found.
function fun_a91f3c2d_compare_string_values_i1_v4(var_7c3e91ab_input_one_str, var_4f2d88c1_input_two_str) {

    // Ensure both inputs are strings
    if (typeof var_7c3e91ab_input_one_str !== "string") {
        return false;
    }

    if (typeof var_4f2d88c1_input_two_str !== "string") {
        return false;
    }

    function fun_b82d4e19_clean_and_split_i1_v2(var_19a7c3e4_input_str) {

        // Remove all characters except letters, numbers, spaces, and dashes
        var_19a7c3e4_input_str = var_19a7c3e4_input_str.replace(/[^a-zA-Z0-9\- ]+/g, "");

        // Convert dashes to spaces
        var_19a7c3e4_input_str = var_19a7c3e4_input_str.replace(/-/g, " ");

        // Replace multiple spaces with a single space
        var_19a7c3e4_input_str = var_19a7c3e4_input_str.replace(/\s+/g, " ");

        // Trim leading and trailing spaces
        var_19a7c3e4_input_str = var_19a7c3e4_input_str.trim();

        // Convert to lowercase for case-insensitive comparison
        var_19a7c3e4_input_str = var_19a7c3e4_input_str.toLowerCase();

        if (var_19a7c3e4_input_str === "") {
            return [];
        }

        var var_3d8f2b77_output_arr = var_19a7c3e4_input_str.split(" ");

        return var_3d8f2b77_output_arr;
    }

    var var_aa12bc34_array_one_arr = fun_b82d4e19_clean_and_split_i1_v2(var_7c3e91ab_input_one_str);
    var var_bb23cd45_array_two_arr = fun_b82d4e19_clean_and_split_i1_v2(var_4f2d88c1_input_two_str);

    // If either array is empty, return FALSE
    if (var_aa12bc34_array_one_arr.length === 0) {
        return false;
    }

    if (var_bb23cd45_array_two_arr.length === 0) {
        return false;
    }

    var var_cc34de56_search_values_number_num = var_aa12bc34_array_one_arr.length;
    var var_dd45ef67_found_values_number_num = 0;

    for (var var_ee56fa78_index_num = 0; var_ee56fa78_index_num < var_aa12bc34_array_one_arr.length; var_ee56fa78_index_num++) {

        var var_ff67ab89_current_value_str = var_aa12bc34_array_one_arr[var_ee56fa78_index_num];

        if (var_bb23cd45_array_two_arr.indexOf(var_ff67ab89_current_value_str) !== -1) {
            var_dd45ef67_found_values_number_num =
                var_dd45ef67_found_values_number_num + 1;
        }
    }

    var var_1122aa33_found_values_percent_num = 0;

    if (var_cc34de56_search_values_number_num > 0) {
        var_1122aa33_found_values_percent_num =
            (var_dd45ef67_found_values_number_num / var_cc34de56_search_values_number_num) * 100;
    }

    var var_2233bb44_output_obj = {
        search_values_number: var_cc34de56_search_values_number_num,
        found_values_number: var_dd45ef67_found_values_number_num,
        found_values_percent: var_1122aa33_found_values_percent_num
    };

    return var_2233bb44_output_obj;
}

// Clean String Spaces
// Description: Takes a string and replaces any commas with spaces. Also removes extra spaces.
function fun_e16a0092_clean_string_spaces_i1712726400_v1(var_e16a0092_input_str_str) {
    // Ensure input is a string
    if (typeof var_e16a0092_input_str_str !== "string") {
        return false;
    }

    // Replace commas with spaces
    var var_e16a0092_step1_str = var_e16a0092_input_str_str.replace(/,/g, " ");

    // Replace multiple spaces with a single space
    var var_e16a0092_step2_str = var_e16a0092_step1_str.replace(/\s+/g, " ");

    // Trim leading and trailing spaces (optional but usually desired)
    var var_e16a0092_output_str = var_e16a0092_step2_str.trim();

    return var_e16a0092_output_str;
}

// String Cleaner
// Description: Removes anything that isn't a letter, number, or space. Removes extra space. Converst letters to lowercase.
function fun_a1b2c3d4_string_cleaner_i1712764800_v1(var_a1b2c3d4_input_str) {
    // Validate input
    if (typeof var_a1b2c3d4_input_str !== "string" || var_a1b2c3d4_input_str.length === 0) {
        return false;
    }

    // Convert to lowercase
    var var_a1b2c3d4_output_str = var_a1b2c3d4_input_str.toLowerCase();

    // Remove all non-alphanumeric characters except spaces
    var_a1b2c3d4_output_str = var_a1b2c3d4_output_str.replace(/[^a-z0-9 ]/g, "");

    // Replace multiple spaces with a single space
    var_a1b2c3d4_output_str = var_a1b2c3d4_output_str.replace(/ +/g, " ");

    // Trim spaces from start and end
    var_a1b2c3d4_output_str = var_a1b2c3d4_output_str.trim();

    // Return false if empty after processing
    if (var_a1b2c3d4_output_str.length === 0) {
        return false;
    }

    return var_a1b2c3d4_output_str;
}

// Update Link URL
// Updates the URL for an HTML link
function fun_a6c31d90_update_link_url_i1_v1(var_2c1e1b71_url_str, var_3f0c2a44_element_id_str) {

    // Ensure inputs are valid strings
    if (typeof var_2c1e1b71_url_str !== "string" || typeof var_3f0c2a44_element_id_str !== "string") {
        return false;
    }

    // Get the element
    var var_8b6a9c21_element_obj = document.getElementById(var_3f0c2a44_element_id_str);

    // Check if the element exists
    if (var_8b6a9c21_element_obj === null) {
        return false;
    }

    // Ensure the element supports href
    if (typeof var_8b6a9c21_element_obj.href === "undefined") {
        return false;
    }

    // Update the link URL
    var_8b6a9c21_element_obj.href = var_2c1e1b71_url_str;

    return true;
}

// Replace All URL Parameters From Object
// Take a URL and replaces the paramters with those supplied in an object.
function fun_b73e4c19_replace_all_url_parameters_from_object_i1_v1(
    var_2d84f6a1_url_str,
    var_7a31c9e5_values_obj
) {

    // Use current URL if not provided
    if (typeof var_2d84f6a1_url_str !== "string" || var_2d84f6a1_url_str === "") {
        if (typeof window === "undefined" || !window.location || !window.location.href) {
            return false;
        }
        var_2d84f6a1_url_str = window.location.href;
    }

    // Validate object
    if (typeof var_7a31c9e5_values_obj !== "object" || var_7a31c9e5_values_obj === null || Array.isArray(var_7a31c9e5_values_obj) === true) {
        return false;
    }

    var var_5f92b8d3_url_obj;
    var var_1c47e6a9_parameters_arr = [];
    var var_8e15d4b2_key_str;
    var var_3b64f1c7_value_uns;
    var var_6d28a5f4_encoded_key_str;
    var var_9f73c2e1_encoded_value_str;

    try {
        var_5f92b8d3_url_obj = new URL(var_2d84f6a1_url_str);
    } catch (var_4a86e9d7_error_uns) {
        return false;
    }

    // Build parameters only from the supplied object
    for (var_8e15d4b2_key_str in var_7a31c9e5_values_obj) {
        if (Object.prototype.hasOwnProperty.call(var_7a31c9e5_values_obj, var_8e15d4b2_key_str) === true) {

            var_3b64f1c7_value_uns = var_7a31c9e5_values_obj[var_8e15d4b2_key_str];

            // Convert arrays to comma-separated strings
            if (Array.isArray(var_3b64f1c7_value_uns) === true) {
                var_3b64f1c7_value_uns = var_3b64f1c7_value_uns.join(",");
            }

            // Convert non-string values to strings
            if (typeof var_3b64f1c7_value_uns !== "string") {
                var_3b64f1c7_value_uns = String(var_3b64f1c7_value_uns);
            }

            var_6d28a5f4_encoded_key_str = encodeURIComponent(var_8e15d4b2_key_str);
            var_9f73c2e1_encoded_value_str = encodeURIComponent(var_3b64f1c7_value_uns).replace(/%2C/g, ",");

            var_1c47e6a9_parameters_arr.push(
                var_6d28a5f4_encoded_key_str + "=" + var_9f73c2e1_encoded_value_str
            );
        }
    }

    return (
        var_5f92b8d3_url_obj.origin +
        var_5f92b8d3_url_obj.pathname +
        (var_1c47e6a9_parameters_arr.length > 0 ? "?" + var_1c47e6a9_parameters_arr.join("&") : "")
    );
}

// Get InnerHTML
// Description: Get the innerHTML value of an element by its ID
function fun_e16a0092_get_element_innerhtml_by_id_i1_v1(var_e16a0092_id_str, var_e16a0092_convert_to_array_uns) {
    
    // Set defaults inside function
    if (typeof var_e16a0092_convert_to_array_uns === "undefined") {
        var_e16a0092_convert_to_array_uns = false;
    }

    // Get element
    var var_e16a0092_element_obj = document.getElementById(var_e16a0092_id_str);

    // Check if element exists
    if (!var_e16a0092_element_obj) {
        return false;
    }

    // Get innerHTML
    var var_e16a0092_value_str = var_e16a0092_element_obj.innerHTML;

    // Check if empty or whitespace
    if (!var_e16a0092_value_str || var_e16a0092_value_str.trim() === "") {
        return false;
    }

    // Convert to array if requested
    if (var_e16a0092_convert_to_array_uns === true) {
        var var_e16a0092_value_arr = var_e16a0092_value_str.split(",").map(function(var_e16a0092_item_str) {
            return var_e16a0092_item_str.trim();
        });
        return var_e16a0092_value_arr;
    }

    // Default: return string
    return var_e16a0092_value_str;
}


/*
 * Creates or updates an object using a label and value.
*/
function fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_a1b2c3d4_label_uns, var_a1b2c3d4_value_uns, var_a1b2c3d4_existing_obj)
{
    // Helper: convert any value to string
    function fun_a1b2c3d4_convert_to_string_i1776012000_v1(var_a1b2c3d4_input_uns)
    {
        // If already string
        if (typeof var_a1b2c3d4_input_uns === "string")
        {
            return var_a1b2c3d4_input_uns;
        }

        // If boolean
        if (typeof var_a1b2c3d4_input_uns === "boolean")
        {
            if (var_a1b2c3d4_input_uns === true)
            {
                return "true";
            }
            else
            {
                return "false";
            }
        }

        // If number
        if (typeof var_a1b2c3d4_input_uns === "number")
        {
            return String(var_a1b2c3d4_input_uns);
        }

        // If array
        if (Array.isArray(var_a1b2c3d4_input_uns) === true)
        {
            return var_a1b2c3d4_input_uns.join(",");
        }

        // If object (not null)
        if (typeof var_a1b2c3d4_input_uns === "object" && var_a1b2c3d4_input_uns !== null)
        {
            var var_a1b2c3d4_parts_arr = [];

            for (var var_a1b2c3d4_key_str in var_a1b2c3d4_input_uns)
            {
                if (Object.prototype.hasOwnProperty.call(var_a1b2c3d4_input_uns, var_a1b2c3d4_key_str))
                {
                    var var_a1b2c3d4_val_str = fun_a1b2c3d4_convert_to_string_i1776012000_v1(var_a1b2c3d4_input_uns[var_a1b2c3d4_key_str]);
                    var_a1b2c3d4_parts_arr.push(var_a1b2c3d4_key_str + ":" + var_a1b2c3d4_val_str);
                }
            }

            return var_a1b2c3d4_parts_arr.join("|");
        }

        // null / undefined fallback
        return String(var_a1b2c3d4_input_uns);
    }

    // Convert inputs
    var var_a1b2c3d4_label_str = fun_a1b2c3d4_convert_to_string_i1776012000_v1(var_a1b2c3d4_label_uns);
    var var_a1b2c3d4_value_str = fun_a1b2c3d4_convert_to_string_i1776012000_v1(var_a1b2c3d4_value_uns);

    // Determine object to use
    var var_a1b2c3d4_output_obj;

    if (typeof var_a1b2c3d4_existing_obj === "object" && var_a1b2c3d4_existing_obj !== null)
    {
        var_a1b2c3d4_output_obj = var_a1b2c3d4_existing_obj;
    }
    else
    {
        var_a1b2c3d4_output_obj = {};
    }

    // Assign value
    var_a1b2c3d4_output_obj[var_a1b2c3d4_label_str] = var_a1b2c3d4_value_str;

    return var_a1b2c3d4_output_obj;
}


// Create Entry DIV For Search / Browse.
// Creates div for entry, and subdivs.
function fun_a1b2c3d4_create_item_entry_holder_i1713030003_v1(
    var_a1b2c3d4_data_obj,
    var_a1b2c3d4_parent_id_str,
    var_a1b2c3d4_id_num
) {
    var var_a1b2c3d4_parent_el_obj = document.getElementById(var_a1b2c3d4_parent_id_str);
    if (!var_a1b2c3d4_parent_el_obj) {
        return false;
    }

    var var_a1b2c3d4_holder_id_num = var_a1b2c3d4_id_num;
    if (!var_a1b2c3d4_holder_id_num) {
        var_a1b2c3d4_holder_id_num = Math.floor(Date.now() / 1000);
    }

    var var_a1b2c3d4_holder_div_obj = document.createElement("div");
    var_a1b2c3d4_holder_div_obj.className = "item_entry_holder";
    var_a1b2c3d4_holder_div_obj.id = "item_entry_" + var_a1b2c3d4_holder_id_num + "_holder";

    for (var var_a1b2c3d4_key_str in var_a1b2c3d4_data_obj) {
        if (Object.prototype.hasOwnProperty.call(var_a1b2c3d4_data_obj, var_a1b2c3d4_key_str)) {
            var var_a1b2c3d4_item_value_uns = var_a1b2c3d4_data_obj[var_a1b2c3d4_key_str];
            var var_a1b2c3d4_item_holder_div_obj = document.createElement("div");
            var var_a1b2c3d4_item_element_obj = null;

            var_a1b2c3d4_item_holder_div_obj.className = "item_entry_" + var_a1b2c3d4_key_str + "_holder";
            var_a1b2c3d4_item_holder_div_obj.id = "item_entry_" + var_a1b2c3d4_holder_id_num + "_" + var_a1b2c3d4_key_str + "_holder";

            if (var_a1b2c3d4_key_str === "icon" || var_a1b2c3d4_key_str === "thumbnail") {
                var_a1b2c3d4_item_element_obj = document.createElement("img");
                var_a1b2c3d4_item_element_obj.className = "item_entry_" + var_a1b2c3d4_key_str;
                var_a1b2c3d4_item_element_obj.id = "item_entry_" + var_a1b2c3d4_holder_id_num + "_" + var_a1b2c3d4_key_str;
                var_a1b2c3d4_item_element_obj.src = var_a1b2c3d4_item_value_uns;
                var_a1b2c3d4_item_element_obj.alt = var_a1b2c3d4_key_str;
            } else if (var_a1b2c3d4_key_str === "destination") {
                var_a1b2c3d4_item_element_obj = document.createElement("a");
                var_a1b2c3d4_item_element_obj.className = "item_entry_destination";
                var_a1b2c3d4_item_element_obj.id = "item_entry_" + var_a1b2c3d4_holder_id_num + "_destination";
                var_a1b2c3d4_item_element_obj.href = var_a1b2c3d4_item_value_uns;
                var_a1b2c3d4_item_element_obj.textContent = var_a1b2c3d4_item_value_uns;
            } else {
                var_a1b2c3d4_item_element_obj = document.createElement("span");
                var_a1b2c3d4_item_element_obj.className = "item_entry_" + var_a1b2c3d4_key_str;
                var_a1b2c3d4_item_element_obj.id = "item_entry_" + var_a1b2c3d4_holder_id_num + "_" + var_a1b2c3d4_key_str;
                var_a1b2c3d4_item_element_obj.textContent = var_a1b2c3d4_item_value_uns;
            }

            var_a1b2c3d4_item_holder_div_obj.appendChild(var_a1b2c3d4_item_element_obj);
            var_a1b2c3d4_holder_div_obj.appendChild(var_a1b2c3d4_item_holder_div_obj);
        }
    }

    var_a1b2c3d4_parent_el_obj.appendChild(var_a1b2c3d4_holder_div_obj);

    return var_a1b2c3d4_holder_div_obj;
}

// Get Previous Page URL
// Returns the full URL of the previous page (including parameters), or false if unavailable
function fun_7a3c9f21_get_previous_page_url_i1_v1() {
    var var_7a3c9f21_previous_url_str = "";

    // Check if referrer exists
    if (document.referrer && document.referrer !== "") {
        var_7a3c9f21_previous_url_str = String(document.referrer);
        return var_7a3c9f21_previous_url_str;
    }

    // No previous page available
    return false;
}

// Base64 URL Encode
// Encode a string to base64 in a URL friendly manner.
function fun_3fa8c1b2_base64_url_encode_i1_v1(var_3fa8c1b2_input_str) {
    // Ensure input is a string
    var var_3fa8c1b2_input_str = String(var_3fa8c1b2_input_str);

    // Encode to UTF-8 then Base64
    var var_3fa8c1b2_base64_str = btoa(unescape(encodeURIComponent(var_3fa8c1b2_input_str)));

    // Make URL-safe
    var var_3fa8c1b2_base64_url_str = var_3fa8c1b2_base64_str
        .replace(/\+/g, '-')
        .replace(/\//g, '_')
        .replace(/=+$/g, '');

    return var_3fa8c1b2_base64_url_str;
}

// Base64 URL Decode
// Decode a string from URL-friendly Base64
function fun_3fa8c1b2_base64_url_decode_i1_v1(var_3fa8c1b2_input_str) {
    // Ensure input is a string
    var var_3fa8c1b2_input_str = String(var_3fa8c1b2_input_str);

    // Restore Base64 format
    var var_3fa8c1b2_base64_str = var_3fa8c1b2_input_str
        .replace(/-/g, '+')
        .replace(/_/g, '/');

    // Add padding if needed
    while (var_3fa8c1b2_base64_str.length % 4 !== 0) {
        var_3fa8c1b2_base64_str += '=';
    }

    // Decode from Base64 to UTF-8
    var var_3fa8c1b2_decoded_str = decodeURIComponent(escape(atob(var_3fa8c1b2_base64_str)));

    return var_3fa8c1b2_decoded_str;
}

/*
Function: Check if a URL string contains a specific parameter and if its value matches a given string.
Returns: true if match, false otherwise
*/
function fun_e16a0092_check_url_param_match_i1776011658_v1(var_e16a0092_url_str, var_e16a0092_param_name_str, var_e16a0092_expected_value_str)
{
    // Ensure inputs are strings
    var_e16a0092_url_str = String(var_e16a0092_url_str);
    var_e16a0092_param_name_str = String(var_e16a0092_param_name_str);
    var_e16a0092_expected_value_str = String(var_e16a0092_expected_value_str);

    // Try to parse URL
    var var_e16a0092_url_obj = null;

    try
    {
        var_e16a0092_url_obj = new URL(var_e16a0092_url_str);
    }
    catch (e)
    {
        return false;
    }

    // Get parameter value
    var var_e16a0092_param_value_str = var_e16a0092_url_obj.searchParams.get(var_e16a0092_param_name_str);

    // If parameter doesn't exist
    if (var_e16a0092_param_value_str === null)
    {
        return false;
    }

    // Compare values
    if (var_e16a0092_param_value_str === var_e16a0092_expected_value_str)
    {
        return true;
    }

    return false;
}


// Update Item Entry Status Classes
// Checks if elements in item_entry_status class have a value of "removed" or "exists" and adds related classes to them.
function fun_a1b2c3d4_update_item_entry_status_classes_i1713030000_v1() {
    var var_a1b2c3d4_item_entry_status_elements_arr = document.getElementsByClassName("item_entry_status");

    for (var var_a1b2c3d4_index_num = 0; var_a1b2c3d4_index_num < var_a1b2c3d4_item_entry_status_elements_arr.length; var_a1b2c3d4_index_num++) {
        var var_a1b2c3d4_item_entry_status_element_obj = var_a1b2c3d4_item_entry_status_elements_arr[var_a1b2c3d4_index_num];
        var var_a1b2c3d4_item_entry_status_value_str = var_a1b2c3d4_item_entry_status_element_obj.innerHTML.trim().toLowerCase();

        if (var_a1b2c3d4_item_entry_status_value_str === "exists") {
            var_a1b2c3d4_item_entry_status_element_obj.classList.add("item_entry_status_exists");
        } else if (var_a1b2c3d4_item_entry_status_value_str === "removed") {
            var_a1b2c3d4_item_entry_status_element_obj.classList.add("item_entry_status_removed");
        }
    }
}

// Load Sequential JSON Files
// Description: Used to load JSON database files for search/browse. The processing action function handles each JSON. The end action function is when enough entries are loaded for the page.
async function fun_a7c4d912_load_sequential_json_files_i1_v7(
	str_json_directory_url,
	num_required_true_returns,
	num_start_file_number = 1,
	num_max_file_number = 100,
	bool_use_cache = true,
	num_cache_max_age_min = 1440,
	fun_json_processing_action_i1_v1 = fun_a7c4d912_json_processing_action_i1_v1,
	fun_end_actions_i1_v1 = fun_a7c4d912_end_actions_i1_v3
) {

	let var_a7c4d912_cache_max_age_ms_num =
		num_cache_max_age_min * 60 * 1000;

	let var_a7c4d912_results_obj = {
		num_true_returns: 0,
		num_false_returns: 0,
		num_total_loops: 0,
		num_start_file_number: num_start_file_number,
		num_max_file_number: num_max_file_number,
		num_current_file_number: num_start_file_number,
		num_last_attempted_file_number: 0,
		num_cache_max_age_min: num_cache_max_age_min,
		str_stop_reason: "",
		arr_loaded_urls: []
	};

	let var_a7c4d912_directory_url_str =
		fun_a7c4d912_normalize_json_directory_url_i1_v1(str_json_directory_url);

	while (true) {

		if (var_a7c4d912_results_obj.num_true_returns >= num_required_true_returns) {
			var_a7c4d912_results_obj.str_stop_reason = "required_true_returns_reached";
			break;
		}

		if (var_a7c4d912_results_obj.num_current_file_number > num_max_file_number) {
			var_a7c4d912_results_obj.str_stop_reason = "max_file_number_reached";
			break;
		}

		let var_a7c4d912_json_url_str =
			var_a7c4d912_directory_url_str +
			var_a7c4d912_results_obj.num_current_file_number +
			".json";

		let var_a7c4d912_json_data_obj = null;
		let var_a7c4d912_action_result_uns = false;

		var_a7c4d912_results_obj.num_total_loops++;
		var_a7c4d912_results_obj.num_last_attempted_file_number =
			var_a7c4d912_results_obj.num_current_file_number;

		var_a7c4d912_results_obj.arr_loaded_urls.push(var_a7c4d912_json_url_str);

		var_a7c4d912_json_data_obj =
			await fun_a7c4d912_get_json_file_with_cache_i1_v4(
				var_a7c4d912_json_url_str,
				bool_use_cache,
				var_a7c4d912_cache_max_age_ms_num
			);

		var_a7c4d912_action_result_uns =
			fun_json_processing_action_i1_v1(
				var_a7c4d912_json_data_obj,
				var_a7c4d912_results_obj.num_current_file_number,
				var_a7c4d912_json_url_str
			);

		if (var_a7c4d912_action_result_uns === true) {
			var_a7c4d912_results_obj.num_true_returns++;
		} else {
			var_a7c4d912_results_obj.num_false_returns++;
		}

		var_a7c4d912_results_obj.num_current_file_number++;
	}

	fun_end_actions_i1_v1(var_a7c4d912_results_obj);

	return var_a7c4d912_results_obj;
}


function fun_a7c4d912_normalize_json_directory_url_i1_v1(
	str_json_directory_url
) {
	if (typeof str_json_directory_url !== "string") {
		return "";
	}

	if (str_json_directory_url.endsWith("/")) {
		return str_json_directory_url;
	}

	return str_json_directory_url + "/";
}


async function fun_a7c4d912_get_json_file_with_cache_i1_v4(
	str_json_url,
	bool_use_cache = true,
	num_cache_max_age_ms = 86400000
) {

	let var_a7c4d912_cache_key_str = "json_cache_a7c4d912_" + str_json_url;
	let var_a7c4d912_cached_json_str = "";
	let var_a7c4d912_cache_wrapper_obj = null;
	let var_a7c4d912_json_data_obj = null;
	let var_a7c4d912_now_num = Date.now();
	let var_a7c4d912_cache_age_num = 0;

	if (bool_use_cache === true && typeof localStorage !== "undefined") {
		try {

			var_a7c4d912_cached_json_str =
				localStorage.getItem(var_a7c4d912_cache_key_str);

			if (
				typeof var_a7c4d912_cached_json_str === "string" &&
				var_a7c4d912_cached_json_str !== ""
			) {
				var_a7c4d912_cache_wrapper_obj =
					JSON.parse(var_a7c4d912_cached_json_str);

				if (
					var_a7c4d912_cache_wrapper_obj !== null &&
					typeof var_a7c4d912_cache_wrapper_obj === "object" &&
					typeof var_a7c4d912_cache_wrapper_obj.num_cached_at_ms === "number" &&
					"value_cached_obj" in var_a7c4d912_cache_wrapper_obj
				) {
					var_a7c4d912_cache_age_num =
						var_a7c4d912_now_num -
						var_a7c4d912_cache_wrapper_obj.num_cached_at_ms;

					if (var_a7c4d912_cache_age_num <= num_cache_max_age_ms) {
						return var_a7c4d912_cache_wrapper_obj.value_cached_obj;
					}
				}
			}

		} catch (var_a7c4d912_error_obj) {
		}
	}

	try {

		let var_a7c4d912_response_obj =
			await fetch(str_json_url, { cache: "no-store" });

		if (!var_a7c4d912_response_obj.ok) {
			return null;
		}

		var_a7c4d912_json_data_obj =
			await var_a7c4d912_response_obj.json();

		if (bool_use_cache === true && typeof localStorage !== "undefined") {
			try {

				var_a7c4d912_cache_wrapper_obj = {
					num_cached_at_ms: Date.now(),
					value_cached_obj: var_a7c4d912_json_data_obj
				};

				localStorage.setItem(
					var_a7c4d912_cache_key_str,
					JSON.stringify(var_a7c4d912_cache_wrapper_obj)
				);

			} catch (var_a7c4d912_error_obj) {
			}
		}

		return var_a7c4d912_json_data_obj;

	} catch (var_a7c4d912_error_obj) {
		return null;
	}
}


function fun_a7c4d912_json_processing_action_i1_v1(
	obj_json_data,
	num_file_number,
	str_json_url
) {

	console.log("JSON Processing Action: Running");

	if (obj_json_data === null) {
		return false;
	}

	if (typeof obj_json_data !== "object") {
		return false;
	}
	// Filter entries (type, keywords, status, etc)
	// // Type
	// // // Get Type From HTML Data
	if (fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_types') != false){
		var var_7c2a9b1e_types_str = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_types');
		var_7c2a9b1e_types_str = fun_e16a0092_clean_string_spaces_i1712726400_v1(var_7c2a9b1e_types_str);
		var_7c2a9b1e_types_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(var_7c2a9b1e_types_str);
} else {
	return false;
}
	// // // Apply Filter
	var var_7c2a9b1e_entry_type_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(obj_json_data['type']);
	if (var_7c2a9b1e_entry_type_str === 'status update'){
		var_7c2a9b1e_entry_type_str = 'su';
	} else if (var_7c2a9b1e_entry_type_str === 'other resource') {
		var_7c2a9b1e_entry_type_str = 'or';
	}
	var_7c2a9b1e_types_check_obj =  fun_a91f3c2d_compare_string_values_i1_v4(var_7c2a9b1e_entry_type_str, var_7c2a9b1e_types_str);
	if (var_7c2a9b1e_types_check_obj['found_values_percent'] < 1){
		//console.log('21832824: ' + var_7c2a9b1e_entry_type_str + ' does not match ' + var_7c2a9b1e_types_str);
		return false;
	}
	// // Statuses
	// // // Get Statuses From HTML Data
	if (fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_statuses') != false){
		var var_7c2a9b1e_statuses_str = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_statuses');
		var_7c2a9b1e_statuses_str = fun_e16a0092_clean_string_spaces_i1712726400_v1(var_7c2a9b1e_statuses_str);
		var_7c2a9b1e_statuses_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(var_7c2a9b1e_statuses_str);
	} else {
		return false;
	}
	// // // Apply Filter
	var var_7c2a9b1e_entry_status_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(obj_json_data['status']);
	var_7c2a9b1e_statuses_check_obj =  fun_a91f3c2d_compare_string_values_i1_v4(var_7c2a9b1e_entry_status_str, var_7c2a9b1e_statuses_str);
	if (var_7c2a9b1e_statuses_check_obj['found_values_percent'] < 1){
		//console.log('90882824: ' + var_7c2a9b1e_entry_status_str + ' does not match ' + var_7c2a9b1e_statuses_str);
		return false;
	}
	// // Keywords (and KMT). Search both "name" and "overview" fields.
	// // // Get Keywords From HTML Data
	if (fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_keywords') != false){
		var var_7c2a9b1e_keywords_str = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_keywords');
		var_7c2a9b1e_keywords_str = fun_e16a0092_clean_string_spaces_i1712726400_v1(var_7c2a9b1e_keywords_str);
		var_7c2a9b1e_keywords_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(var_7c2a9b1e_keywords_str);
	} else {
		//return false;
		var var_7c2a9b1e_keywords_str = null;
	}
	// // // Get KMT
	if (fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_kmt') != false){
		var var_7c2a9b1e_kmt_num = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_kmt');
		var_7c2a9b1e_kmt_num = Number(var_7c2a9b1e_kmt_num);
	}

	// // // Add KMT To Page Entry
	////// THIS IS NOT IMPLEMENTED


	// // // Apply Filter
	if (var_7c2a9b1e_keywords_str !== null){
	var var_7c2a9b1e_entry_keywords_str = fun_a1b2c3d4_string_cleaner_i1712764800_v1(obj_json_data['name'] + ' ' + obj_json_data['overview']); // Some entries don't have an overview in which case this results in undefined being added to the string, but that's okay.
	var_7c2a9b1e_keywords_check_obj =  fun_a91f3c2d_compare_string_values_i1_v4(var_7c2a9b1e_keywords_str, var_7c2a9b1e_entry_keywords_str); // This is reverse order compared to other filters, because we only want to ensure the keywords we're looking for are present in the entry name and overview.
	if (var_7c2a9b1e_keywords_check_obj['found_values_percent'] <= var_7c2a9b1e_kmt_num){
		//console.log('77772894: ' + var_7c2a9b1e_entry_keywords_str + ' does not match ' + var_7c2a9b1e_keywords_str);
		return false;
	}
	}
	// Generate HTML Entry
	fun_a1b2c3d4_create_item_entry_holder_i1713030003_v1(obj_json_data, 'sb_entries_holder', num_file_number);
	fun_a1b2c3d4_update_item_entry_status_classes_i1713030000_v1();
	
	// Return
	return true;
}


function fun_a7c4d912_end_actions_i1_v3(
	obj_results
) {

	console.log("End Actions: Running");
	console.log("TRUE returns:", obj_results.num_true_returns);
	console.log("FALSE returns:", obj_results.num_false_returns);
	console.log("Total loops:", obj_results.num_total_loops);
	console.log("Start file number:", obj_results.num_start_file_number);
	console.log("Max file number:", obj_results.num_max_file_number);
	console.log("Last attempted file number:", obj_results.num_last_attempted_file_number);
	console.log("Cache max age (minutes):", obj_results.num_cache_max_age_min);
	console.log("Stop reason:", obj_results.str_stop_reason);
	console.log("Loaded URLs:", obj_results.arr_loaded_urls);

	// Update HTML Data
	fun_e16a0092_set_element_innerhtml_by_id_i2_v1('sb_state_ne', obj_results.num_current_file_number);
	
	// Update Prev/Next Buttons. 
	var var_7c2a9b1e_prev_url_str = window.location.href;
	var var_7c2a9b1e_next_url_str = window.location.href;
	// // Add Quantity
	var var_label = 'sb_quantity';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_quantity');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value);
	// // Add Current Entry
	var var_label = 'sb_current_entry';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_ne');
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);

	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_pce');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	// // Add PCE (Next button only)
	var var_label = 'sb_pce';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_current_entry');
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add Mode
	var var_label = 'sb_mode';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_mode');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add Order
	var var_label = 'sb_order';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_order');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add Types
	var var_label = 'sb_types';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_types');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add Statuses
	var var_label = 'sb_statuses';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_statuses');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add Keywords
	var var_label = 'sb_keywords';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_keywords');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Add KMT
	var var_label = 'sb_kmt';
	var var_value = fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_kmt');
	var var_7c2a9b1e_prev_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_prev_url_parameters_obj);
	var var_7c2a9b1e_next_url_parameters_obj = fun_a1b2c3d4_create_object_from_strings_i1776012000_v1(var_label, var_value, var_7c2a9b1e_next_url_parameters_obj);
	// Update
	var_7c2a9b1e_prev_url_str = fun_b73e4c19_replace_all_url_parameters_from_object_i1_v1(var_7c2a9b1e_prev_url_str, var_7c2a9b1e_prev_url_parameters_obj);
	fun_a6c31d90_update_link_url_i1_v1(var_7c2a9b1e_prev_url_str, 'prev_next_control_button_link_previous');
var_7c2a9b1e_next_url_str = fun_b73e4c19_replace_all_url_parameters_from_object_i1_v1(var_7c2a9b1e_next_url_str, var_7c2a9b1e_next_url_parameters_obj);
	fun_a6c31d90_update_link_url_i1_v1(var_7c2a9b1e_next_url_str, 'prev_next_control_button_link_next');

	// Determine if Prev/Next Buttons Should Be Displayed Or Hidden
	// // If number of TRUE returns is less than sb_quantity, there's no next page.
	if (obj_results.num_true_returns < fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_quantity')){
		fun_a4c92b1e_toggle_element_display_i2_v1('prev_next_control_button_link_next');
	}

	// // If is sb_state_current_entry is "1" there's no previous page, because it's the first entry.
	if (fun_e16a0092_get_element_innerhtml_by_id_i1_v1('sb_state_current_entry') == '1'){
		fun_a4c92b1e_toggle_element_display_i2_v1('prev_next_control_button_link_previous');
	}

	// Hide Loading Icon
	fun_a4c92b1e_toggle_element_display_i2_v1('sb_loading_section');
}
