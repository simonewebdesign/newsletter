<?php

include_once 'bootstrap.php';
include_once 'Lista.php';

#########################

$lists = Lista::all();

?>

<h1><?=$cfg['site_name']?> <?=LISTS?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($lists) { ?>

<table>
  
  <thead>
    <tr>
      <th><?=ID?></th>
      <th><?=NAME?></th>
      <th><?=USERS_COUNT?></th>
      <th><?=CREATED_AT?></th>
      <th><?=UPDATED_AT?></th>
      <th colspan=4><?=ACTIONS?></th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($lists as $l) { ?>
    <tr>
      <td><?=$l->id?></td>
      <td><?=$l->name?></td>
      <td><i>non disponibile</i></td>
      <td><?=date(PHP_DATE, strtotime($l->created_at))?></td>
      
      <?php if ($l->updated_at == '0000-00-00 00:00:00') { ?>    
      <td><?=NEVER?></td>
      <?php } else { ?>    
      <td><?=date(PHP_DATE, strtotime($l->updated_at))?></td>    
      <?php } ?>

      <td><a href="<?=$cfg['root']?>list_read.php?id=<?=$l->id?>"><?=READ_LIST?></a></td>
      <td><a href="<?=$cfg['root']?>list_update.php?id=<?=$l->id?>"><?=UPDATE_LIST?></a></td>
      <td><a href="<?=$cfg['root']?>list_delete.php?id=<?=$l->id?>" class="delete"><?=DELETE_LIST?></a></td>
    </tr>
    <?php } ?>
  </tbody>
  
  <tfoot>
  </tfoot>

</table>

<?php } else { ?>

<p><?=NO_LISTS?></p>

<?php } ?>

<?php include_once 'foot.php'; ?>

</body>
</html>