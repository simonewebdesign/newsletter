<?php

include_once 'bootstrap.php';

?><h1><?=DELETE ." ". TEMPLATE?></h1><?php

if ( Template::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

include_once "back.php";
include_once "foot.php";
