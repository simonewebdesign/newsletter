<h1>Cancellazione dalla Newsletter</h1>

<p><?=$msg?></p>

<?php

if ( !isset($_POST['submit']) ) { // user hasn't submitted the form yet

  $msg = 'Se desideri davvero cancellare la tua iscrizione alla Newsletter, per favore digita il tuo indirizzo email.';

?><form method=POST>
			<label for="email">Indirizzo email</label>
			<input id="email" name="email" type="email">
			<input name="submit" type="submit" value="Unsubscribe">
	</form><?php   

} else { // user has submitted the form

  $email = isset($_POST['email']) ? trim($_POST['email']) : '';

  if (!empty($email)) {
    
    include_once 'bootstrap.php';
    include_once 'User.php';
    $user = User::findByEmail($email);
    if ($user) { // user found
      
      if ($user->is_subscribed) {
        User::unsubscribe($user->id);
        $msg = "Da questo momento non riceverai più email da {$cfg['site_name']}. Torna a trovarci!";
      } else {
        $msg = 'Sei già stato cancellato dalla Newsletter!';
      }
      
    } else {
      $msg = 'Non sei iscritto alla Newsletter!';
    }
    
  } else {
    $msg = 'Non hai digitato il tuo indirizzo email. Riprova.';
  }

}