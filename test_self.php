<?php
	require_once 'alchemyapi.php';
	$alchemyapi = new AlchemyAPI('7f7435d53943f0907a4b0aa63a0a5b01de82a283');
	
	$DATA='Woman hacked to death during morning walk in Gorakhpur'; //the news goes in here
	
	$FLAVOR='text';
	$response = $alchemyapi->keywords($FLAVOR, $DATA, array('sentiment'=>0));
    // $response = $alchemyapi->keywords('text', 'Bunnies are nice but sometimes robots are evil', array('sentiment'=>1));
    foreach ($response['keywords'] as $keyword) {
        echo $keyword['text'], PHP_EOL;
    }
?>