<table>
  
  <thead>
    <tr>
      <th>ID</th>
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
      <td><?=$l->users_count?></td>
      <td><?=date(PHP_DATE, strtotime($l->created_at))?></td>
      
      <?php if ($l->updated_at == '0000-00-00 00:00:00') { ?>
      <td><?=NEVER?></td>
      <?php } else { ?>
      <td><?=date(PHP_DATE, strtotime($l->updated_at))?></td>
      <?php } ?>

      <td><a href="<?=$cfg['root']?>list_read.php?id=<?=$l->id?>"><?=READ?></a></td>
      <td><a href="<?=$cfg['root']?>list_update.php?id=<?=$l->id?>"><?=UPDATE?></a></td>
      <td><a href="<?=$cfg['root']?>list_delete.php?id=<?=$l->id?>" class="delete"><?=DELETE?></a></td>
    </tr>
    <?php } ?>
  </tbody>
  
  <tfoot>
  </tfoot>

</table>
