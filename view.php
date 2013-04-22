<?php

include_once 'bootstrap.php';

$n = Newsletter::read($_GET['id']);

$u = new stdClass;
$u->id = $_GET['uid'];

include_once 'template_load.php';
include_once 'template_str_replacement.php';

echo $user_template;
