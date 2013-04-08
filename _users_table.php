<table>
  
  <thead>
    <tr>
      <th>ID</th>
      <th><?=NAME?></th>
      <th><?=EMAIL?></th>
      <th><?=IS_ACTIVE?></th>
      <th><?=IS_SUBSCRIBED?></th>
      <th><?=CREATED_AT?></th>
      <th><?=UPDATED_AT?></th>
      <th><?=LAST_SEEN_AT?></th>
      <th colspan=3><?=ACTIONS?></th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($users as $u) { ?>
    <tr>
      <td><?=$u->id?></td>
      <td><?=$u->name?></td>
      <td><?=$u->email?></td>
      
      <?php if ($u->is_active) { ?>
      <td><?=YES?></td>
      <?php } else { ?>
      <td><?=NO?></td>
      <?php } ?>
      
      <?php if ($u->is_subscribed) { ?>
      <td><?=YES?></td>
      <?php } else { ?>
      <td><?=NO?></td>
      <?php } ?>
      
      <td><?=date(PHP_DATE, strtotime($u->created_at))?></td> 
      
      <?php if ($u->updated_at == '0000-00-00 00:00:00') { ?>    
      <td><?=NEVER?></td>
      <?php } else { ?>    
      <td><?=date(PHP_DATE, strtotime($u->updated_at))?></td>    
      <?php } ?>
      
      <?php if ($u->last_seen_at == '0000-00-00 00:00:00') { ?>    
      <td><?=NEVER?></td>
      <?php } else { ?>    
      <td><?=date(PHP_DATE, strtotime($u->last_seen_at))?></td>    
      <?php } ?>

      <td><a href="<?=$cfg['root']?>user_read.php?id=<?=$u->id?>"><?=READ?></a></td>
      <td><a href="<?=$cfg['root']?>user_update.php?id=<?=$u->id?>"><?=UPDATE?></a></td>
      <td><a href="<?=$cfg['root']?>user_delete.php?id=<?=$u->id?>" class="delete"><?=SET_INACTIVE?></a></td>
    </tr>
    <?php } ?>
  </tbody>
  
  <tfoot>
  </tfoot>

</table>
