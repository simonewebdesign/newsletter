<?php

// Just a back link to include in action pages.
// i.e. if you are in the newsletter_create.php page,
// the parent will be newsletter.php

$root = $cfg['root'];
$filename = basename($_SERVER['PHP_SELF']);
$parts = explode("_", $filename);
$parent_page = $parts[0] . "s.php";

?>

<p>
  <a href="<?=$parent_page?>"><?=BACK?></a>
</p>
