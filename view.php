<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';

################################

$n = Newsletter::read($_GET['id']);

$u = new stdClass;
$u->id = $_GET['uid'];

$template = file_get_contents('template.html');
include_once 'template_str_replacement.php';
echo $user_template;