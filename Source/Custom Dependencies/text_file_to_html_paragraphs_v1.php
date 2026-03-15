<?php
function text_file_to_html_paragraphs_v1($file_path_str) {

    $text_str = file_get_contents($file_path_str);
    if ($text_str === false) {
        return false;
    }

    // Escape HTML characters safely
    $text_str = htmlspecialchars($text_str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // Normalize line endings
    $text_str = str_replace(["\r\n", "\r"], "\n", $text_str);

    // Split into paragraphs (two or more line breaks)
    $paragraphs_arr = preg_split("/\n{2,}/", $text_str);

    $output_str = '';

    foreach ($paragraphs_arr as $paragraph_str) {
        $paragraph_str = trim($paragraph_str);
        if ($paragraph_str !== '') {
            $paragraph_str = str_replace("\n", "<br>\n", $paragraph_str);
            $output_str .= "<p>" . $paragraph_str . "</p>\n";
        }
    }

    return $output_str;
}
?>