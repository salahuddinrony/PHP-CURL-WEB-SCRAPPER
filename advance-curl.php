<?php
	//  Advanced cURL Scrape
	//  Obtain data from url and force links to work
	//  This code was written by Michael Devaney
	//  Note: You might want to cache this
	//  All I ask is that you do not remove these notes
	//  Thank you
	$ch = curl_init ("http://www.phpsnaps.com/snaps/view/advanced-curl-scrape/"); //URL to Scrape
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$page = curl_exec($ch);
	
	preg_match('#</p[^>]*>(.+?)</p>#is', $page, $matches, $links); // grabs anything between <p> </p> tags
	foreach ($matches as &$match) {
	    $match = str_replace('href="', 'href="http://www.theurl.com', $match); 
		//This is used to make sure links work.
	}
	// output html, styles, and more.
	echo '<head>';
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />'; // make sure its able to be read correctlly
	echo '</head>';
	echo '<style type="text/css"></style>'; //add styles here
	echo '<body>';
	echo '<img src="http://www.yoursite.com/image.jpg">'; //Maybe add an image over the scaped data
	echo '<h1>cURL Scrape</h1>';
	echo $matches[1]; // change [1] to [2] If you want to grab data between the second <p></p> tags  
	echo '</body>';
?>
