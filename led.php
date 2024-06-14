<?php
$filename = 'led_state.txt';

// Überprüfen Sie, ob die Datei existiert und lesen Sie den aktuellen Zustand
if (file_exists($filename)) {
    $state = file_get_contents($filename);
} else {
    $state = 'off';
}

// Wechseln Sie den Zustand
if ($state == 'on') {
    $state = 'off';
} else {
    $state = 'on';
}

// Speichern Sie den neuen Zustand
file_put_contents($filename, $state);

// Erzeugen Sie die XML-Antwort    FARBEN  :   ORANGE , RED , GREEN


if ($state == 'on') {

	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	echo '<FanvilIPPhoneExecute Beep="yes">';
	echo '<ExecuteItem URI="Led:Line1_GREEN=fastflash/"/>';
    echo '<ExecuteItem URI="Key:STAR/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:KEY_4/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:KEY_5/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:POUND/"/>';
	echo '</FanvilIPPhoneExecute>';
	

	
} else {
	
	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	echo '<FanvilIPPhoneExecute Beep="yes">';
	echo '<ExecuteItem URI="Led:POWER=off/"/>';
    echo '<ExecuteItem URI="Key:STAR/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:KEY_4/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:KEY_5/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Delay:1/"/>';
	echo '<ExecuteItem URI="Key:POUND/"/>';
    echo '<ExecuteItem URI="Led:Line1_RED on/"/>';
	echo '</FanvilIPPhoneExecute>';
}


?>
