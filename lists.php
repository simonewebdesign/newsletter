<?php

include_once 'bootstrap.php';
include_once 'Lista.php';

#########################

$lists = Lista::all_with_users_count();

?>

<h1><?=$cfg['site_name']?> <?=LISTS?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($lists) {

include_once '_lists_table.php';

} else { ?>

<p><?=NO_DATA?></p>

<?php } ?>

<a href="<?=$cfg['root']?>list_create.php"><?=CREATE ." ". LISTA?></a>

<?php include_once "foot.php";
