<h1><?=DELETE  ." ". LISTS?></h1>

<?php

$subscribed = true;

if ( !isset($_POST['submit']) ) { // user hasn't submitted the form yet

  $msg = 'Se desideri davvero cancellare la tua iscrizione alla Newsletter, per favore digita il tuo indirizzo email.';

} else { // user has submitted the form

  $email = isset($_POST['email']) ? trim($_POST['email']) : '';

  if (!empty($email)) {
    
    include_once 'bootstrap.php';
    include_once 'User.php';
    $user = User::findByEmail($email);
    if ($user) { 
      // user found
      if ($user->is_subscribed) {

        User::unsubscribe($user->id);
        $msg = "Da questo momento non riceverai più email da {$cfg['site_name']}. Torna a trovarci!";
        $subscribed = false;
      }
      else {
        $msg = 'Sei già stato cancellato dalla Newsletter!';
        $subscribed = false;
      }
    } 
    else {
      $msg = 'Non sei iscritto alla Newsletter!';
      $subscribed = false;
    }
  }
  else {
    $msg = 'Non hai digitato il tuo indirizzo email. Riprova.';
  }

}

?>

<p><?=$msg?></p>

<?php if ($subscribed) { // show the form to unsubscribe ?>
<form method=POST>
      <label for="email"><?=EMAIL?></label>
      <input id="email" name="email" type="email">
      <input name="submit" type="submit" value="Cancellami">
</form>
<?php } ?>

