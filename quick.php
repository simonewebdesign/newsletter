<?php

include_once 'bootstrap.php';
include_once 'Lista.php';
include_once 'Newsletter.php';
//include_once '.php';

#############################

?>

<h1>Invio veloce!</h1>

<style>
ol li {margin-bottom:50px;}
</style>

<form action="send.php">
  <ol>
    
    <li>
      Scegli la mailing list
      <?php $lists = Lista::all(); include_once '_list_select.php'; ?>
      <a href="list_create.php"><?=CREATE_LIST?></a> |
      <a href="lists.php"><?=LISTS?></a>
    </li>
    
    <li>
      Scegli la newsletter
      <?php $newsletters = Newsletter::all(); include_once '_newsletter_select.php'; ?>
      <a href="newsletter_create.php"><?=CREATE_NEWSLETTER?></a> |
      <a href="newsletters.php"><?=NEWSLETTERS?></a>
    </li>
    
    <li>
      Fai click!
      <input name="send" type="submit" value="<?=SUBMIT?>" class="send">
    </li>
    
  </ol>
</form>

<?php include_once 'foot.php';