<?php
/**
 * Covert ascii string to utf8
 */

//ascii string
$str = '\xd8ez\xe1n\xed';

//solution with preg replace callback
$utf8str = preg_replace_callback("/\\\\x([0-9a-fA-F]{2})/isU", 
		function($m) {
			//solution 1
			//return chr(hexdec($m[1]));
			//solution 2
			return pack('H*',utf8_decode($m[1]));
		},
		$str);

echo $utf8str;


/*
//
// solution with preg replace callback function with E modifier / is deprecated
//

function convertAsciiToUtf8($s){
	return pack('H*',utf8_decode($s));
}

$utf8str = preg_replace ('/\\\\x([0-9a-fA-F]{2})/e', "convertAsciiToUtf8('\\1')",$str);
*/