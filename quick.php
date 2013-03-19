<?php

include_once 'bootstrap.php';
include_once 'Lista.php';
include_once 'Newsletter.php';
//include_once '.php';

#############################

?>

<h1><?=QUICK_SEND?></h1>

<style>
ol li {margin-bottom:50px;}
</style>

<form action="send.php">
  <ol>
    
    <li>
      <?=CHOOSE ." ". LISTA?>
      <?php $lists = Lista::all(); include_once '_list_select.php'; ?>
      <a href="list_create.php"><?=CREATE?></a> |
      <a href="lists.php"><?=LISTS?></a>
    </li>
    
    <li>
      <?=CHOOSE ." ". NEWSLETTER?>
      <?php $newsletters = Newsletter::all(); include_once '_newsletter_select.php'; ?>
      <a href="newsletter_create.php"><?=CREATE?></a> |
      <a href="newsletters.php"><?=NEWSLETTERS?></a>
    </li>
    
    <li>
      Click!
      <input name="send" type="submit" value="<?=SUBMIT?>" class="send">
    </li>
    
  </ol>
</form>

<?php include_once 'foot.php';