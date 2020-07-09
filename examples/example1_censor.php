<?php
/**
 * PleaseDontSwear basic censor method example
 */

require_once __DIR__ . '/../src/PleaseDontSwear.php';  // unnecesary if you use autoload

use PleaseDontSwear\PleaseDontSwear;

// Aleksander Fredro, "Sztuka obłapiania" (original title "Sztuka jebania"), 1817
$myBadText = "Jeb, Młodzieńcze, jeb, lecz miej zwyczaj drogi,
Ze świecą kurwie patrzeć między nogi.";

$myCensoredText = (new PleaseDontSwear())->censor($myBadText);

echo $myCensoredText;
// Jeb, Młodzieńcze, jeb, lecz miej zwyczaj drogi,
// Ze świecą ****** patrzeć między nogi.
