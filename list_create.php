<?php

include_once 'bootstrap.php';
include_once 'Lista.php';
include_once 'User.php';

################################

?><h1><?=CREATE_LIST?></h1><?php

include_once '_list_form.php';

if ( isset($_POST['submit']) ) {

  if ( Lista::create($_POST['name']) ) {
    
    $list_id = $db->lastInsertId();
    
    // fetch email addresses and remove duplicates
    $separator = "\r\n";
    
    $duplicated_array = explode($separator, $_POST['email_addresses']);   var_dump($duplicated_array);
    $sanitized_array = array_unique($duplicated_array);                   var_dump($sanitized_array);

    foreach ($sanitized_array as $email_address) {
      if ( !empty($email_address) ) {
        if ( User::create($email_address) ) {
          echo "<p><b>$email_address</b> aggiunto con successo alla lista <b>{$_POST['name']}</b>.";
        } else {
          echo "<p>ERRORE durante l'inserimento di <b>$email_address</b>.";
        }
      }
    }

    $input_rows = count($duplicated_array);
    $output_rows = count($sanitized_array);
    $dupes = $input_rows - $output_rows;

    echo "Operazione conclusa con successo!<br>";
    echo "Email iniziali: $input_rows<br>";
    echo "Email finali: $output_rows<br>";
    echo "Duplicati rimossi: $dupes<br>";

    $update_list_id = $db->prepare("UPDATE users SET list_id = $list_id WHERE list_id <= 0");
    $update_list_id->execute();
    
    
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

?><p><a href="javascript:history.back(1)"><?=BACK?></a></p>