<?php
require_once 'eval_conf.php';

$auth = GangliaAuth::getInstance();
$auth->destroyAuthCookie();
$redirect_to = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header("Location: $redirect_to");
?>
