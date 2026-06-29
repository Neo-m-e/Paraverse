<?php
define('MBG', TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

$id = isset($_GET['id']) ? trim($_GET['id']) : '';

if (empty($id) || $id === $identification) {
    include('index-inc-profile-view.php');
} else {
    include('index-inc-profile-other.php');
}
?>
