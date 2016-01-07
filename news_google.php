<?php
	
	$keywords='Earthquake%20India';
	$url = "https://ajax.googleapis.com/ajax/services/search/news?" . "v=1.0&num=8&q=$keywords&userip=192.168.1.2&rsz=8";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$body = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($body);
	//Traversing the JSON response tree 

	if($json->responseStatus == 200){ 							//Traverse if response of http request is OK 2xx
		$results=$json->responseData->results;					//storing results tree in a seperate variable
		foreach($results as $news_primary){						//Traversing via for loop in the results tree
			echo "Title : " , $news_primary->titleNoFormatting ,PHP_EOL;
			echo "Pulisher : " , $news_primary->publisher,PHP_EOL;
			echo "Published Date : " , $news_primary->publishedDate,PHP_EOL;
			echo "URL : ", $news_primary->unescapedUrl,PHP_EOL;
			print PHP_EOL;
																//If related news is set then traverse in the subtree
			$related_news = (isset($news_primary->relatedStories)?$news_primary->relatedStories : false); 
			if($related_news){
				foreach($related_news as $sec_news){			//Traversing the subtree for related news
					echo "Title : " , $sec_news->titleNoFormatting ,PHP_EOL;
					echo "Pulisher : " , $sec_news->publisher,PHP_EOL;
					echo "Published Date : " , $sec_news->publishedDate,PHP_EOL;
					echo "URL : ", $sec_news->unescapedUrl,PHP_EOL;
					print PHP_EOL;
				}
			}
		}
	}else{														//If response is not OK then inform and return
		echo "Error in News Extraction -- ResponseCode ---- ",$json->responseStatus,PHP_EOL;
	}

?>