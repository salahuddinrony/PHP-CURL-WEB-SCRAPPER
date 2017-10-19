
<!-- Reference Url -->
<!-- http://kb4dev.com/tutorial/php-curl/data-mining-using-php-curl -->

<h1>Web Scrapping using Regular Expression</h1>

<?php
	header('Content-Type: text/plain;');
	$curl=curl_init('http://www.google.com/search?output=search&q=php');    // Please study the url and params.   q=php or q={your keyword here}
	 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 
	$data=curl_exec($curl);
	 
	curl_close($curl);
	 
	$mathces=array();
	 
	preg_match_all('|<h3 class="r">.*?href="/url\?q=(.*?)&amp;.*?".*?</h3>|', $data, $mathces);
	 
	print_r($mathces[1]);
 
?>

<h1>Web Scrapping using DOMDocument</h1>

<?php
 
	//header('Content-Type: text/html');
	 
	$curl=curl_init('http://www.google.com/search?output=search&q=php');
	 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 
	$data=curl_exec($curl);
	 
	$domdoc=new DOMDocument();
	 
	if(@$domdoc->loadHTML($data)){
	 
	    $link_list=$domdoc->getElementsByTagName('a');
	 
	    for($i=0;$i<$link_list->length;$i++){
	 
	        $link=$link_list->item($i);
	 
	        if(($class=$link->parentNode->attributes->getNamedItem('class')) and $class->nodeValue=='r'){
	 
	            print_r($link->attributes->getNamedItem('href')->nodeValue);
	        }
	         
	    }
	 
	}
?>
