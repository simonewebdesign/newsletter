<?php include_once 'bootstrap.php' ?>

<h1><?=READ ." ". NEWSLETTER?></h1>

<?php

$n = Newsletter::read($_GET['id']);

include_once 'template_load.php';
include_once 'template_str_replacement.php';

echo $user_template;

include_once "back.php";
include_once "foot.php";
