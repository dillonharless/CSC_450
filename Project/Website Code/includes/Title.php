<?php
$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$title = str_replace('_', ' ', $title);
if ($title == 'Index'){

	$title = 'home';
}
$title = ucwords($title);
