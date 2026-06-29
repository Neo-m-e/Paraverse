<?php
define('MBG', TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

if (isset($_GET['c'])) {
    include('index-inc-community-view.php');
} else {
    include('index-inc-community-list.php');
}
?>
