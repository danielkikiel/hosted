<?php
/**
	 *
	 * @copyright	(c) 2016 hosted.pl
	 * @author 		Daniel Kikiel for hosted.pl
	 *
	 */

require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');