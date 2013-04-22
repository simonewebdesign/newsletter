<?php

include_once 'bootstrap.php';

$users = User::all();

?>

<h1><?=$cfg['site_name']?> <?=USERS?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($users) {

include_once '_users_table.php';

} else { ?>

<p><?=NO_DATA?></p>

<?php } ?>

<a href="<?=$cfg['root']?>user_create.php"><?=CREATE ." ". USER?></a>

<?php include_once 'foot.php';
