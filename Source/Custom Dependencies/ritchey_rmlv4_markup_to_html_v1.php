<?php
if (function_exists('ritchey_rmlv4_markup_to_html_v1') === FALSE){
function ritchey_rmlv4_markup_to_html_v1($source_string, $preserve_empty_lines = NULL, $display_errors = NULL){
	$errors = array();
	$location = realpath(dirname(__FILE__));
	if (isset($source_string) === FALSE){
		$errors[] = "source_string";
	}
	if ($preserve_empty_lines === NULL){
		$preserve_empty_lines = FALSE;
	} else if ($preserve_empty_lines === TRUE){
		// Do nothing
	} else if ($preserve_empty_lines === FALSE){
		// Do nothing
	} else {
		$errors[] = "preserve_empty_lines";
	}
	if ($display_errors === NULL){
		$display_errors = FALSE;
	} else if ($display_errors === TRUE){
		// Do nothing
	} else if ($display_errors === FALSE){
		// Do nothing
	} else {
		$errors[] = "display_errors";
	}
	## Task
	if (@empty($errors) === TRUE){
		### Import text
		$data = array();
		
		$source_string = explode("\n", $source_string);
		foreach ($source_string as &$item){
			$item = rtrim($item, "\n\r\v");
			$data[] = $item;
		}
		### Deletions
		// Remove commented lines
		foreach ($data as $key => $value) {
			// When encountering a commented line, remove it.
			if (substr($value, 0, 2) === '//'){
				unset($data[$key]);
			}
		}
		### Empty Lines
		if ($preserve_empty_lines === TRUE){
			foreach ($data as &$value){
			// When encountering an empty line mark it.
				if (trim($value) === ''){
					$value = '// Empty Line Entry Start';
				}
			}
			unset($value);
		}
		### Add more markup so replacements are easier.
		// Pages
		$markup_1 = '// Page Start';
		$markup_2 = '// Page End';
		array_unshift($data, $markup_1);
		foreach ($data as &$value){
			// When encountering end of page markup, close the page, and open another.
			if (rtrim($value) === '--'){
				$value = $value . PHP_EOL . $markup_2 . PHP_EOL . $markup_1;
			}
		}
		unset($value);
		// Close last page.
		$data[] = $markup_2;
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 0
		$markup_1 = '// Section 0 Start';
		$markup_2 = '// Section 0 End';
		foreach ($data as &$value){
			// When encountering start of page, open section
			if (rtrim($value) === '// Page Start'){
				$value = $value . PHP_EOL . $markup_1;
			}
			// When encountering end of page, close section
			else if (rtrim($value) === '// Page End'){
				$value = $markup_2 . PHP_EOL . $value;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 1
		$switch = FALSE;
		$markup_1 = '// Section 1 Start';
		$markup_2 = '// Section 1 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 2) === '# ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S1, close it
			else if (substr($value, 0, 2) === '# ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 2
		$switch = FALSE;
		$markup_1 = '// Section 2 Start';
		$markup_2 = '// Section 2 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 3) === '## ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S2, close it
			else if (substr($value, 0, 3) === '## ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S1 start/end, close it
			else if (substr($value, 0, 12) === '// Section 1' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 3
		$switch = FALSE;
		$markup_1 = '// Section 3 Start';
		$markup_2 = '// Section 3 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 4) === '### ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S3, close it
			else if (substr($value, 0, 4) === '### ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S2 start/end, close it
			else if (substr($value, 0, 12) === '// Section 2' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S1 start/end, close it
			else if (substr($value, 0, 12) === '// Section 1' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 4
		$switch = FALSE;
		$markup_1 = '// Section 4 Start';
		$markup_2 = '// Section 4 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 5) === '#### ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S4, close it
			else if (substr($value, 0, 5) === '#### ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S3 start/end, close it
			else if (substr($value, 0, 12) === '// Section 3' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S2 start/end, close it
			else if (substr($value, 0, 12) === '// Section 2' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S1 start/end, close it
			else if (substr($value, 0, 12) === '// Section 1' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 5
		$switch = FALSE;
		$markup_1 = '// Section 5 Start';
		$markup_2 = '// Section 5 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 6) === '##### ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S5, close it
			else if (substr($value, 0, 6) === '##### ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S4 start/end, close it
			else if (substr($value, 0, 12) === '// Section 4' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S3 start/end, close it
			else if (substr($value, 0, 12) === '// Section 3' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S2 start/end, close it
			else if (substr($value, 0, 12) === '// Section 2' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S1 start/end, close it
			else if (substr($value, 0, 12) === '// Section 1' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Section 6
		$switch = FALSE;
		$markup_1 = '// Section 6 Start';
		$markup_2 = '// Section 6 End';
		foreach ($data as &$value){
			// When encountering start of section, open it
			if (substr($value, 0, 7) === '###### ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $value;
				$switch = TRUE;
			}
			// When encountering another S6, close it
			else if (substr($value, 0, 7) === '###### ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S5 start/end, close it
			else if (substr($value, 0, 12) === '// Section 5' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S4 start/end, close it
			else if (substr($value, 0, 12) === '// Section 4' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S3 start/end, close it
			else if (substr($value, 0, 12) === '// Section 3' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S2 start/end, close it
			else if (substr($value, 0, 12) === '// Section 2' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S1 start/end, close it
			else if (substr($value, 0, 12) === '// Section 1' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
			// When encountering an S0 start/end, close it
			else if (substr($value, 0, 12) === '// Section 0' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Blockquotes
		$switch = FALSE;
		$markup_1 = '// Blockquote Start';
		$markup_2 = '// Blockquote End';
		foreach ($data as &$value){
			// When encountering start of blockquote, open it.
			if (rtrim($value) === '"' && $switch === FALSE){
				$value = $markup_1; // This replaces the "
				$switch = TRUE;
			}
			// When encountering end of blockquote, close it.
			else if (rtrim($value) === '"' && $switch === TRUE){
				$value = $markup_2; // This replaces the "
				$switch = FALSE;
			}
			// Add blockers
			else if ($switch === TRUE){
				$value = "\\\\ {$value}";
			}
		}
		unset($value);
		// Blockmessages
		$switch = FALSE;
		$markup_1 = '// Blockmessage Start';
		$markup_2 = '// Blockmessage End';
		foreach ($data as &$value){
			// When encountering start of blockmessage, open it.
			if (rtrim($value) === '(' && $switch === FALSE){
				$value = $markup_1; // This replaces the =
				$switch = TRUE;
			}
			// When encountering end of blockmessage, close it.
			else if (rtrim($value) === ')' && $switch === TRUE){
				$value = $markup_2; // This replaces the =
				$switch = FALSE;
			}
			// Add blockers
			else if ($switch === TRUE){
				$value = "\\\\ {$value}";
			}
		}
		unset($value);
		// Dot Lists
		$switch = FALSE;
		$markup_1 = '// Dot List Start';
		$markup_2 = '// Dot List End';
		$markup_3 = '// Dot List Entry Start';
		$markup_4 = '// Dot List Entry End';
		foreach ($data as &$value){
			// When encountering start of dot list, open it.
			if (substr(ltrim($value), 0, 2) === '- ' && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $markup_3 . PHP_EOL . $value . PHP_EOL . $markup_4;
				$switch = TRUE;
			}
			// When encountering dot list entry, open and close it.
			else if (substr(ltrim($value), 0, 2) === '- ' && $switch === TRUE){
				$value = $markup_3 . PHP_EOL . $value . PHP_EOL . $markup_4;
				$switch = TRUE;
			}
			// When encountering end of dot list, close it.
			else if (substr(ltrim($value), 0, 2) !== '- ' && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Numbered Lists
		$switch = FALSE;
		$markup_1 = '// Numbered List Start';
		$markup_2 = '// Numbered List End';
		$markup_3 = '// Numbered List Entry Start';
		$markup_4 = '// Numbered List Entry End';
		foreach ($data as &$value){
			// When encountering start of numbered list, open it.
			if (preg_match('/^\d+\. +/', ltrim($value)) === 1 && $switch === FALSE){
				$value = $markup_1 . PHP_EOL . $markup_3 . PHP_EOL . $value . PHP_EOL . $markup_4;
				$switch = TRUE;
			}
			// When encountering numbered list entry, open and close it.
			else if (preg_match('/^\d+\. +/', ltrim($value)) === 1 && $switch === TRUE){
				$value = $markup_3 . PHP_EOL . $value . PHP_EOL . $markup_4;
				$switch = TRUE;
			}
			// When encountering numbered of dot list, close it.
			else if (preg_match('/^\d+\. +/', ltrim($value)) !== 1 && $switch === TRUE){
				$value = $markup_2 . PHP_EOL . $value;
				$switch = FALSE;
			}
		}
		unset($value);	
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Remove blockers "\\ ". They were needed for block messages, and block quotes
		foreach ($data as &$value){
			// When encountering, remove.
			if (substr($value, 0, 3) === '\\\\ '){
				$value = substr($value, 3);
			}
		}
		unset($value);
		// Blockstyled
		$switch = FALSE;
		$markup_1 = '// Blockstyled Start';
		$markup_2 = '// Blockstyled End';
		foreach ($data as &$value){
			// When encountering start of blockstyled, open it.
			if (rtrim($value) === '[' && $switch === FALSE){
				$value = $markup_1; // This replaces the ~
				$switch = TRUE;
			}
			// When encountering end of blockstyled, close it.
			else if (rtrim($value) === ']' && $switch === TRUE){
				$value = $markup_2; // This replaces the ~
				$switch = FALSE;
			}
		}
		unset($value);
		### Replace markup with HTML (Multi-line Items)
		// Pages
		$markup_1 = '// Page Start';
		$markup_2 = '// Page End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "page{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='page_outter' id='page_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='page_inner' id='page_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='page_meta' id='page_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ <span class='page_number'>{$number}</span>
\\\\ </div>
\\\\ <div class='page_content' id='page_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);
		// Section 0
		$markup_1 = '// Section 0 Start';
		$markup_2 = '// Section 0 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_0_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_0_outter' id='section_0_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_0_inner' id='section_0_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_0_meta' id='section_0_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_0_content' id='section_0_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);
		// Section 1
		$markup_1 = '// Section 1 Start';
		$markup_2 = '// Section 1 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_1_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_1_outter' id='section_1_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_1_inner' id='section_1_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_1_meta' id='section_1_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_1_content' id='section_1_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);
		// Section 2
		$markup_1 = '// Section 2 Start';
		$markup_2 = '// Section 2 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_2_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_2_outter' id='section_2_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_2_inner' id='section_2_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_2_meta' id='section_2_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_2_content' id='section_2_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);	
		// Section 3
		$markup_1 = '// Section 3 Start';
		$markup_2 = '// Section 3 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_3_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_3_outter' id='section_3_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_3_inner' id='section_3_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_3_meta' id='section_3_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_3_content' id='section_3_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);			
		// Section 4
		$markup_1 = '// Section 4 Start';
		$markup_2 = '// Section 4 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_4_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_4_outter' id='section_4_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_4_inner' id='section_4_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_4_meta' id='section_4_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_4_content' id='section_4_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);			
		// Section 5
		$markup_1 = '// Section 5 Start';
		$markup_2 = '// Section 5 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_5_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_5_outter' id='section_5_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_5_inner' id='section_5_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_5_meta' id='section_5_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_5_content' id='section_5_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);			
		// Section 6
		$markup_1 = '// Section 6 Start';
		$markup_2 = '// Section 6 End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "section_6_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='section_6_outter' id='section_6_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='section_6_inner' id='section_6_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='section_6_meta' id='section_6_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='section_6_content' id='section_6_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);			
		// Blockquotes
		$markup_1 = '// Blockquote Start';
		$markup_2 = '// Blockquote End';
		$number = 1;
		$switch = FALSE;
		foreach ($data as &$value){
			$uuid = hash('md5', "blockquote_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='blockquote_outter' id='blockquote_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='blockquote_inner' id='blockquote_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='blockquote_meta' id='blockquote_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='blockquote_content' id='blockquote_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
				$switch = TRUE;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
				$switch = FALSE;
			}
			// If value is the content of the block, add blockers to prevent other replacements running on that line.
			else if ($switch === TRUE){
				if ($value === '// Empty Line Entry Start'){
					$value = '\\\\ <br>';
				} else {
					$value = "\\\\ {$value}<br>";
				}
			}
		}
		unset($value);
		// Blockmessages
		$markup_1 = '// Blockmessage Start';
		$markup_2 = '// Blockmessage End';
		$number = 1;
		$switch = FALSE;
		foreach ($data as &$value){
			$uuid = hash('md5', "blockmessage_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='blockmessage_outter' id='blockmessage_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='blockmessage_inner' id='blockmessage_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='blockmessage_meta' id='blockmessage_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='blockmessage_content' id='blockmessage_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
			// If value is the content of the block, add blockers to prevent other replacements running on that line.
			else if ($switch === TRUE){
				if ($value === '// Empty Line Entry Start'){
					$value = '\\\\ <br>';
				} else {
					$value = "\\\\ {$value}<br>";
				}
			}
		}
		unset($value);	
		// Blockstyled
		$markup_1 = '// Blockstyled Start';
		$markup_2 = '// Blockstyled End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "blockstyled_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='blockstyled_outter' id='blockstyled_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='blockstyled_inner' id='blockstyled_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='blockstyled_meta' id='blockstyled_{$number}_meta' data-uuid='{$uuid}_3'>
\\\\ </div>
\\\\ <div class='blockstyled_content' id='blockstyled_{$number}_content' data-uuid='{$uuid}_4'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);	
		// Dot Lists
		// Create the outter portion of the dot list
		$markup_1 = '// Dot List Start';
		$markup_2 = '// Dot List End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "dotlist_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='dotlist_outter' id='dotlist_{$number}_outter' data-uuid='{$uuid}_1'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);	
		// Create the entry portion of the dot list
		$markup_1 = '// Dot List Entry Start';
		$markup_2 = '// Dot List Entry End';
		$level = 1;
		foreach ($data as &$value){
			$html_1 = <<<HTML1
\\\\ <div class='dotlist_entry'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
			// Add level
			else if (substr(ltrim($value), 0, 2) === '- '){
				$level = intval(strpos($value, '-')) + 1;
				$value = "\\\\e001 <span class='dot_{$level}'>&bull;</span> " . preg_replace('/^\s*-\s*/', '', $value);
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Numbered Lists
		// Create the outter portion of the numbered list
		$markup_1 = '// Numbered List Start';
		$markup_2 = '// Numbered List End';
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "numberedlist_{$number}");
			$html_1 = <<<HTML1
\\\\ <div class='numberedlist_outter' id='numberedlist_{$number}_outter' data-uuid='{$uuid}_1'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
		}
		unset($value);	
		// Create the entry portion of the numbered list
		$markup_1 = '// Numbered List Entry Start';
		$markup_2 = '// Numbered List Entry End';
		$level = 1;
		foreach ($data as &$value){
			$html_1 = <<<HTML1
\\\\ <div class='numberedlist_entry'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>		
HTML2;
			// When encountering start, replace with start.
			if ($value === $markup_1){
				$value = $html_1;
				$number++;
			}
			// When encountering end, replace with end.
			else if ($value === $markup_2){
				$value = $html_2;
			}
			// Add level
			else if (preg_match('/^\d+\. +/', ltrim($value)) === 1){
				$level = preg_match('/\d/', $value, $matches, PREG_OFFSET_CAPTURE);
				$level = $matches[0][1];
				$level = intval($level) + 1;
				$bullet_number = preg_replace('/^\s*(\d+\.)\s.*$/', '$1', $value);
				$value = "\\\\e001 <span class='bullnum_{$level}'>{$bullet_number}</span> " . preg_replace('/^\s*\d+\.\s+/', '', $value);
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		### Replace markup with HTML (Single-line Items)
		// Empty Lines
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "br_{$number}");
			$html_1 = <<<HTML1
\\\\ <br class='br_content' id='br_{$number}_content' data-uuid='{$uuid}_1'>
HTML1;
			// When encountering start, replace with start.
			if ($value === '// Empty Line Entry Start'){
				$value = $html_1;
				$number++;
			}
		}
		unset($value);
		// Heading 1
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h1_outter' id='h1_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h1_inner' id='h1_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h1 class='h1_content' id='h1_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h1>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 2) === '# '){
				$value = $html_1 . substr($value, 2) . $html_2;
				$number++;
			}
		}
		unset($value);	
		// Heading 2
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h2_outter' id='h2_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h2_inner' id='h2_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h2 class='h2_content' id='h2_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h2>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 3) === '## '){
				$value = $html_1 . substr($value, 3) . $html_2;
				$number++;
			}
		}
		unset($value);	
		// Heading 3
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h3_outter' id='h3_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h3_inner' id='h3_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h3 class='h3_content' id='h3_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h3>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 4) === '### '){
				$value = $html_1 . substr($value, 4) . $html_2;
				$number++;
			}
		}
		unset($value);
		// Heading 4
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h4_outter' id='h4_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h4_inner' id='h4_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h4 class='h4_content' id='h4_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h4>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 5) === '#### '){
				$value = $html_1 . substr($value, 5) . $html_2;
				$number++;
			}
		}
		unset($value);
		// Heading 5
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h5_outter' id='h5_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h5_inner' id='h5_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h5 class='h5_content' id='h5_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h5>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 6) === '##### '){
				$value = $html_1 . substr($value, 6) . $html_2;
				$number++;
			}
		}
		unset($value);
		// Heading 6
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', $value);
			$html_1 = <<<HTML1
\\\\ <div class='h6_outter' id='h6_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='h6_inner' id='h6_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <h6 class='h6_content' id='h6_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
</h6>
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 7) === '###### '){
				$value = $html_1 . substr($value, 7) . $html_2;
				$number++;
			}
		}
		unset($value);
		// Page break (hr)
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "{$number}{$value}");
			$html_1 = <<<HTML1
\\\\ <div class='hr_outter' id='hr_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='hr_inner' id='hr_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <hr class='hr_content' id='hr_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>	
HTML2;
			// When encountering start, replace with start.
			if (substr($value, 0, 2) === '--'){
				$value = $html_1 . PHP_EOL . $html_2;
				$number++;
			}
		}
		unset($value);
		// Tabs
		foreach ($data as &$value){
			$html_1 = <<<HTML1
<span class='tab_outter'>
HTML1;
			$html_2 = <<<HTML2
</span>
HTML2;
			// When encountering start, replace with start.
			if (strpos($value, "\t") === 0){
				$value = $html_1 . $html_2 . substr($value, 1);
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Labels
		
		
		if (function_exists('regex_callback_for_labels_v1') === FALSE){
		function regex_callback_for_labels_v1($matches) {
			$uuid = hash('md5', $matches[0]);
			$html_1 = <<<HTML1
<span class='label_outter' data-uuid='{$uuid}_1'><span class='label_text' data-uuid='{$uuid}_2'>
HTML1;
			$html_2 = <<<HTML2
</span><span class='label_end' data-uuid='{$uuid}_3'>:</span></span>
HTML2;		
			$return = $html_1 . ucwords(strtolower($matches[1])) . $html_2;
    		return $return;
		}
		}
		
		
		foreach ($data as &$value){
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\' && substr($value, 0, 3) !== '\\\\e'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (strpos($value, '<') === FALSE || substr($value, 0, 6) === '\\\\e001'){ // So it doesn't run in lines that have HTML elements, unless they've got a blocker with an exception
				if (preg_match('/(?<!\S)([^a-z]*?):/', $value) === 1){
					$value = preg_replace_callback('/(?<!\S)([^a-z]*?):/', 'regex_callback_for_labels_v1', $value, 1);
				}
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Tags
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "{$number}{$value}");
			$html_1 = <<<HTML1
\\\\ <div class='tags_outter' id='tags_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='tags_inner' id='tags_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='tags_content' id='tags_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>	
HTML2;
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering tags start, replace with start, and end
			else if (substr($value, 0, 1) === '[' && substr($value, -1) === ']'){
				// Add individual tags
				$value = explode('][', substr($value, 1, -1));
				foreach ($value as &$value_2){
					$value_2 = "\\\\ <div class='tag_entry'>{$value_2}</div>";
				}
				unset($value_2);
				$value = implode(PHP_EOL, $value);
				// Add tags element
				$value = $html_1 . PHP_EOL . $value . PHP_EOL . $html_2;
				$number++;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Flat-lists (made as single row tables)
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "{$number}{$value}");
			$html_1 = <<<HTML1
\\\\ <div class='flatlist_outter' id='flatlist_{$number}_outter' data-uuid='{$uuid}_1'>
\\\\ <div class='flatlist_inner' id='flatlist_{$number}_inner' data-uuid='{$uuid}_2'>
\\\\ <div class='flatlist_content' id='flatlist_{$number}_content' data-uuid='{$uuid}_3'>
HTML1;
			$html_2 = <<<HTML2
\\\\ </div>
\\\\ </div>
\\\\ </div>	
HTML2;
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering start, replace with start, and end
			else if (substr($value, 0, 2) === '| '){
				// Add individual entries
				$value = explode(' | ', substr($value, 2));
				foreach ($value as &$value_2){
					$value_2 = "\\\\ <div class='flatlist_entry'>{$value_2}</div>";
				}
				unset($value_2);
				$value = implode(PHP_EOL, $value);
				// Add list element
				$value = $html_1 . PHP_EOL . $value . PHP_EOL . $html_2;
				$number++;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Special comments (e.g., "(SOMETHING)").
		if (function_exists('regex_callback_for_special_comments_v1') === FALSE){
		function regex_callback_for_special_comments_v1($matches) {
			$uuid = hash('md5', $matches[0]);
			$html_1 = <<<HTML1
<span class='special_comment_outter' data-uuid='{$uuid}_1'><span class='special_comment_text_text' data-uuid='{$uuid}_2'>
HTML1;
			$html_2 = <<<HTML2
</span></span>
HTML2;		
			$return = $html_1 . '(' . ucwords(strtolower($matches[1])) . ')' . $html_2;
    		return $return;
		}
		}
		foreach ($data as &$value){
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\' && substr($value, 0, 3) !== '\\\\e'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (strpos($value, '(') !== FALSE){ // This will run on lines with HTML elements, because otherwise some lines that have spans wouldn't get processed.
				if (preg_match('/\(([^a-z\n]*?)\)/', $value) === 1){
					$value = preg_replace_callback('/\(([^a-z\n]*?)\)/', 'regex_callback_for_special_comments_v1', $value);
				}
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Hyperlinks
		if (function_exists('regex_callback_for_hyperlinks_v1') === FALSE){
		function regex_callback_for_hyperlinks_v1($matches) {
			$uuid = hash('md5', $matches[0]);
			$html_1 = <<<HTML1
<span class='hyperlink_outter' data-uuid='{$uuid}_1'><span class='hyperlink_inner' data-uuid='{$uuid}_2'><a class='hyperlink_content' data-uuid='{$uuid}_3'
HTML1;
			$html_2 = <<<HTML2
</a></span></span>
HTML2;		
			$return = $html_1 . "href='" . $matches[2] . "'>" . $matches[1] . $html_2;
    		return $return;
		}
		}
		foreach ($data as &$value){
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\' && substr($value, 0, 3) !== '\\\\e'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (strpos($value, '{') !== FALSE){ // This will run on lines with HTML elements, because otherwise some lines that have spans wouldn't get processed.
				if (preg_match('/\{([^{}]+)\}\s*\(\s*((https?:|file:|ftp:)[^()\s]+)\s*\)/i', $value) === 1){
					$value = preg_replace_callback('/\{([^{}]+)\}\s*\(\s*((https?:|file:|ftp:)[^()\s]+)\s*\)/i', 'regex_callback_for_hyperlinks_v1', $value);

				}
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Styled Text
		if (function_exists('regex_callback_for_styledtext_v1') === FALSE){
		function regex_callback_for_styledtext_v1($matches) {
			$uuid = hash('md5', $matches[0]);
			$html_1 = <<<HTML1
<span class='styledtext_outter' data-uuid='{$uuid}_1'><span class='styledtext_inner' data-uuid='{$uuid}_2'>
HTML1;
			$html_2 = <<<HTML2
</span></span>
HTML2;
			$return = $html_1 . "<span class='" . strtolower($matches[2]) . "'>" . $matches[1] . "</span>" . $html_2;
    		return $return;
		}
		}
		foreach ($data as &$value){
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (strpos($value, '{') !== FALSE){ // This will run on lines with HTML elements, because otherwise some lines that have spans wouldn't get processed.
				if (preg_match('/\{([^\r\n{}]+?)\} \((Bold|Italic|Underline|Strikethrough)\)/i', $value) === 1){
					$value = preg_replace_callback('/\{([^\r\n{}]+?)\} \((Bold|Italic|Underline|Strikethrough)\)/i', 'regex_callback_for_styledtext_v1', $value);

				}
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Images
		if (function_exists('regex_callback_for_images_v1') === FALSE){
		function regex_callback_for_images_v1($matches) {
			$uuid = hash('md5', $matches[0]);
			$html_1 = <<<HTML1
<div class='image_outter' data-uuid='{$uuid}_1'><div class='image_inner' data-uuid='{$uuid}_2'><img class='image_content' data-uuid='{$uuid}_3' src='
HTML1;
			$html_2 = <<<HTML2
' alt="image"></div></div>
HTML2;
			$return = $html_1 . trim($matches[1]) . $html_2;
    		return $return;
		}
		}
		foreach ($data as &$value){
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (strpos($value, '<') === FALSE){ // So it doesn't run in lines that have HTML elements
				if (preg_match('/\(([^()]+\.(png|jpg|jpeg|webp))\)/i', $value) === 1){
					$value = preg_replace_callback('/\(([^()]+\.(png|jpg|jpeg|webp))\)/i', 'regex_callback_for_images_v1', $value);

				}
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		// Paragraphs. Anything that isn't blocked yet, should be treated as a paragraph in order to help preserve line endings.
		$number = 1;
		foreach ($data as &$value){
			$uuid = hash('md5', "{$number}{$value}");
			// Check for blockers
			if (substr($value, 0, 2) === '\\\\'){
				// Do nothing, because lines are blocked by \\
			}
			// When encountering, replace.
			else if (substr($value, 0, 2) !== '\\\\'){ // So it runs on all non-blocked lines. This could have merely been an else statement.
				$value = "<p id='p_{$number}_content' data-uuid='{$uuid}_1'>{$value}</p>";
				$number++;
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
		$data = explode(PHP_EOL, $data);
		### Remove blockers with exceptions "\\e001 ". Each exception code used must be stated.
		foreach ($data as &$value){
			// When encountering e001, remove.
			if (substr($value, 0, 7) === '\\\\e001 '){
				$value = substr($value, 7);
			}
		}
		unset($value);
		### Remove blockers "\\ "
		foreach ($data as &$value){
			// When encountering, remove.
			if (substr($value, 0, 3) === '\\\\ '){
				$value = substr($value, 3);
			}
		}
		unset($value);
		$data = implode(PHP_EOL, $data);
	}
	result:
	## Display Errors
	if ($display_errors === TRUE){
		if (@empty($errors) === FALSE){
			$message = @implode(", ", $errors);
			if (function_exists('ritchey_rmlv4_markup_to_html_v1_format_error') === FALSE){
				function ritchey_rmlv4_markup_to_html_v1_format_error($errno, $errstr){
					echo $errstr;
				}
			}
			set_error_handler("ritchey_rmlv4_markup_to_html_v1_format_error");
			trigger_error($message, E_USER_ERROR);
		}
	}
	## Return
	if (@empty($errors) === TRUE){
		return $data;
	} else {
		return FALSE;
	}
}
}
?>