
<?php
	$curl = curl_init('http://testing-ground.scraping.pro/textlist');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<div id="keygenerator_btn">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) ){
	    echo $list[0];
	}else{ 
	    print "Not found";
	} 
?>
