<?php

include_once 'bootstrap.php';
include_once 'Lista.php';
include_once 'Newsletter.php';
//include_once '.php';

#############################

?>

<h1>Invio veloce!</h1>

<form action="send.php">

  <fieldset>
    <legend>1) Scegli la mailing list:</legend>
    <?php $lists = Lista::all(); include_once '_list_select.php'; ?>
    <a href="list_create.php">creane una nuova</a>
  </fieldset>
  
  
  <fieldset>
    <legend>2) Scegli la newsletter:</legend>
    <?php $newsletters = Newsletter::all(); include_once '_newsletter_select.php'; ?>
    <a href="newsletter_create.php">creane una nuova</a>   
  </fieldset>
  
  <fieldset>
    <legend>3) Fai click!</legend>
    <input name="send" type="submit" value="<?=SUBMIT?>" class="send">
  </fieldset>
</form>

<?php include_once 'foot.php';