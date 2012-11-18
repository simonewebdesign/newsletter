<?php

include_once 'bootstrap.php';
include_once 'User.php';
include_once 'Lista.php';

################################

$lists = Lista::all();
$u = User::read($_GET['id']);

?><h1><?=UPDATE_USER?></h1><?php

if ( isset($_POST['submit']) ) {
  if ( User::update($u->id, $_POST['email'], $_POST['name'], $_POST['list_id']) ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

$u = User::read($_GET['id']);
include_once '_user_form.php';

?><p><a href="javascript:history.back(1)"><?=BACK?></a></p>