<?php

// fetch email addresses and remove duplicates
$emails = Lista::remove_duplicates_from($_POST['email_addresses']);

/* Saves users in the list.
* @param $list_id the ID of the mailing list you want to save the users to.
* @param $emails an array of unique emails.
*/
foreach ($emails as $email) {

  $_user_is_empty = empty($email);
  $_user_already_exists = User::findByEmail($email);

  if ($_user_is_empty) {

    echo "<p>$email cannot be added because it's empty.</p>";
  }

  else if ($_user_already_exists) {

    // then don't insert it.
    echo "<p>$email cannot be added to the list because it already exists in another list.</p>";

  } else {

    // let's create the user.
    if (User::create($email, '', $list_id)) {
      echo "<p><b>$email</b> successfully added to the list.";
    } else {
      echo "<p><b>$email</b> hasn't been created because of an unknown error. Sorry.</p>";
    }

  }
}
