<?php

include_once 'bootstrap.php';
include_once 'Template.php';

################################

?><h1><?=UPDATE ." ". TEMPLATE?></h1><?php

$t = Template::read($_GET['id']);

if ( isset($_POST['submit']) ) {
  if ( Template::update($_GET['id'], $_POST['name'], $_POST['body']) ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

$t = Template::read($_GET['id']);
include_once '_template_form.php';


include_once "back.php";
include_once "foot.php";
