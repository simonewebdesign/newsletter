<?php

include_once 'bootstrap.php';
include_once 'User.php';

################################

?><h1><?=DELETE ." ". USER?></h1><?php

if ( User::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

include_once "back.php";
include_once "foot.php";
