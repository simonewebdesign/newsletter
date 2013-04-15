<table>
  
  <thead>
    <tr>
      <th>ID</th>
      <th><?=NAME?></th>
      <th><?=CREATED_AT?></th>
      <th><?=UPDATED_AT?></th>
      <th colspan=2><?=ACTIONS?></th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($templates as $n) { ?>
    <tr>
      <td><?=$n->id?></td>
      <td><?=$n->name?></td>
      <td><?=date(PHP_DATE, strtotime($n->created_at))?></td>
      
      <?php if ($n->updated_at == '0000-00-00 00:00:00') { ?>    
      <td><?=NEVER?></td>
      <?php } else { ?>    
      <td><?=date(PHP_DATE, strtotime($n->updated_at))?></td>    
      <?php } ?>

      <td><a href="<?=$cfg['root']?>template_update.php?id=<?=$n->id?>"><?=UPDATE?></a></td>
      <td><a href="<?=$cfg['root']?>template_delete.php?id=<?=$n->id?>" class="delete"><?=DELETE?></a></td>
    </tr>
    <?php } ?>
  </tbody>
  
  <tfoot>
  </tfoot>

</table>
