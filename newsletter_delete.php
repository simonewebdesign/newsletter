<?php include_once 'bootstrap.php' ?>

<h1><?=DELETE ." ". NEWSLETTER?></h1><?php

if ( Newsletter::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

include_once "back.php";
include_once "foot.php";
