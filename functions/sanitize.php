<?php
/**
	 *
	 * @copyright	(c) 2016 hosted.pl
	 * @author 		Daniel Kikiel for hosted.pl
	 *
	 */

require_once 'core/init.php';

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}