<?php
function fun_c8a4e19d_get_current_dates_v1($var_7e2a1c9b_timezone_str = null) {

    // If no timezone provided, default to UTC
    if ($var_7e2a1c9b_timezone_str === null) {
        $var_7e2a1c9b_timezone_str = 'UTC';
    }

    // Set timezone
    date_default_timezone_set($var_7e2a1c9b_timezone_str);

    // Create DateTime object using provided (or default) timezone
    $var_3b9e1a7c_timezone_obj = new DateTimeZone($var_7e2a1c9b_timezone_str);
    $var_1a7c3b9e_now_obj = new DateTimeImmutable('now', $var_3b9e1a7c_timezone_obj);

    // 1) Full Unix timestamp
    $var_9e2a7c1b_timestamp_num = $var_1a7c3b9e_now_obj->getTimestamp();

    // 2) Ritchey Date Format
    $var_2c1a9e7b_year_num   = (int)$var_1a7c3b9e_now_obj->format('Y');
    $var_4e7b2c1a_month_num  = (int)$var_1a7c3b9e_now_obj->format('n');
    $var_6a1c9e7b_day_num    = (int)$var_1a7c3b9e_now_obj->format('j');
    $var_8b2c1a9e_hour_num   = (int)$var_1a7c3b9e_now_obj->format('G');
    $var_1e9b7a2c_minute_num = (int)$var_1a7c3b9e_now_obj->format('i');
    $var_7c1a2e9b_second_num = (int)$var_1a7c3b9e_now_obj->format('s');

    $var_5a9e2c1b_ritchey_date_format_str =
        'Y' . $var_2c1a9e7b_year_num .
        'M' . $var_4e7b2c1a_month_num .
        'D' . $var_6a1c9e7b_day_num;
	
    $var_0e2e2edc_ritchey_date_format_full_str =
        'Y' . $var_2c1a9e7b_year_num .
        'M' . $var_4e7b2c1a_month_num .
        'D' . $var_6a1c9e7b_day_num .
        'H' . $var_8b2c1a9e_hour_num .
        'M' . $var_1e9b7a2c_minute_num .
        'S' . $var_7c1a2e9b_second_num;

    // 3) Human-readable long format
    $var_3e7a1c9b_human_readable_long_str = $var_1a7c3b9e_now_obj->format('F j, Y');

    // 4) ISO 8601:2000 extended format (YYYY-MM-DD)
    $var_2a9e1c7b_iso_8601_2000_extended_format_str = $var_1a7c3b9e_now_obj->format('Y-m-d');

    // 5) ISO 8601:2000 basic format (YYYYMMDD)
    $var_9b1c7a2e_iso_8601_2000_str = $var_1a7c3b9e_now_obj->format('Ymd');

    $var_8a2c1e9b_output_arr = array(
        'timestamp' => $var_9e2a7c1b_timestamp_num,
        'ritchey_date_format' => $var_5a9e2c1b_ritchey_date_format_str,
	'ritchey_date_format_full' => $var_0e2e2edc_ritchey_date_format_full_str,
        'human_readable_long' => $var_3e7a1c9b_human_readable_long_str,
        'iso_8601_2000_extended_format' => $var_2a9e1c7b_iso_8601_2000_extended_format_str,
        'iso_8601_2000' => $var_9b1c7a2e_iso_8601_2000_str
    );

    return $var_8a2c1e9b_output_arr;
}
?>