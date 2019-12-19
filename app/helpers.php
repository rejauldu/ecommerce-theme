<?php
if (! function_exists('numhash')) {
	function numhash($n) {
		return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
	}
}