<?php
/**
 * PleaseDontSwear checkForSwears method example
 */

require_once __DIR__ . '/../src/PleaseDontSwear.php';  // unnecesary if you use autoload

use PleaseDontSwear\PleaseDontSwear;

$PDS = new PleaseDontSwear();

// Aleksander Fredro, "Sztuka obłapiania" (original title "Sztuka jebania"), 1817
$myBadText = "Jeb, Młodzieńcze, jeb, lecz miej zwyczaj drogi,
Ze świecą kurwie patrzeć między nogi.";

$myNiceText = "Siała baba mak, nie wiedziała jak.
Dziadek wiedział, nie powiedział, a to było TAK!";

if ($PDS->checkForSwears($myBadText)) {
    echo "Ugh... Ugly text.";
} else {
    echo "Nice text.";
}

if ($PDS->checkForSwears($myNiceText)) {
    echo "Ugh... Ugly text.";
} else {
    echo "Nice text.";
}
