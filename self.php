<?php	


	require_once 'alchemyapi.php';
	$alchemyapi = new AlchemyAPI('7f7435d53943f0907a4b0aa63a0a5b01de82a283');
	

	$demo_text = 'From US to China, international powers criticise North Korea hydrogen bomb test';
	
	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Keyword Extraction Example             #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->keywords('text',$demo_text, array('sentiment'=>1));

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Keywords ##', PHP_EOL;
		foreach ($response['keywords'] as $keyword) {
			echo 'keyword: ', $keyword['text'], PHP_EOL;
			// echo 'relevance: ', $keyword['relevance'], PHP_EOL;
			// echo 'sentiment: ', $keyword['sentiment']['type']; 			
			// if (array_key_exists('score', $keyword['sentiment'])) {
			// 	echo ' (' . $keyword['sentiment']['score'] . ')', PHP_EOL;
			// } else {
			// 	echo PHP_EOL;
			// }
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the keyword extraction call: ', $response['statusInfo'];
	}


	// echo PHP_EOL;
	// echo PHP_EOL;
	// echo PHP_EOL;
	// echo '############################################', PHP_EOL;
	// echo '#   Concept Tagging Example                 #', PHP_EOL;
	// echo '############################################', PHP_EOL;
	// echo PHP_EOL;
	// echo PHP_EOL;
	
	// echo 'Processing text: ', $demo_text, PHP_EOL;
	// echo PHP_EOL;

	// $response = $alchemyapi->concepts('text',$demo_text, null);

	// if ($response['status'] == 'OK') {
	// 	echo '## Response Object ##', PHP_EOL;
	// 	echo print_r($response);

	// 	echo PHP_EOL;
	// 	echo '## Concepts ##', PHP_EOL;
	// 	foreach ($response['concepts'] as $concept) {
	// 		echo 'concept: ', $concept['text'], PHP_EOL;
	// 		echo 'relevance: ', $concept['relevance'], PHP_EOL;
	// 		echo PHP_EOL;
	// 	}
	// } else {
	// 	echo 'Error in the concept tagging call: ', $response['statusInfo'];
	// }
	


	// echo PHP_EOL;
	// echo PHP_EOL;
	// echo PHP_EOL;
	// echo '############################################', PHP_EOL;
	// echo '#   Text Categorization Example            #', PHP_EOL;
	// echo '############################################', PHP_EOL;
	// echo PHP_EOL;
	// echo PHP_EOL;
	
	// echo 'Processing text: ', $demo_text, PHP_EOL;
	// echo PHP_EOL;

	// $response = $alchemyapi->category('text',$demo_text, null);

	// if ($response['status'] == 'OK') {
	// 	echo PHP_EOL;
	// 	echo '## Category ##', PHP_EOL;
	// 	echo 'category: ', $response['category'], PHP_EOL;
	// 	echo 'score: ', $response['score'], PHP_EOL;
	// } else {
	// 	echo 'Error in the text categorization call: ', $response['statusInfo'];
	// }


	
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   combined Example                       #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->combined('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		// echo '## Response Object ##', PHP_EOL;
		// echo print_r($response);

		echo PHP_EOL;
		
		echo '## Keywords ##', PHP_EOL;
		foreach ($response['keywords'] as $keyword) {
		  echo $keyword['text'], ' : ', $keyword['relevance'], PHP_EOL;
		}
		echo PHP_EOL;
		
		
		echo PHP_EOL;
	} else {
		echo 'Error in the taxonomy call: ', $response['statusInfo'];
	}
		
	echo PHP_EOL;
	echo PHP_EOL;

?>
