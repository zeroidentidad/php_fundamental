<?php

function crawlerDetect($USER_AGENT)
{
	$crawlers = array(
		'Google' => 'Google',
		'MSN' => 'msnbot',
		'Rambler' => 'Rambler',
		'Yahoo' => 'Yahoo',
		'AbachoBOT' => 'AbachoBOT',
		'accoona' => 'accoona',
		'Dumbot' => 'Dumbot',
		'Altavista robot' => 'Scooter',
		'Lycos spider' => 'Lycos',
		'Facebook' => 'facebookexternalhit',	
	);
	
	$crawlers_agents = implode('|',$crawlers);
	if(strpos($crawlers_agents,$USER_AGENT) === false){
		return false;
	}else{
		return true;
	}
}


$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
if (crawlerDetect($USER_AGENT)){
	echo $USER_AGENT.' es un robot';
}else{
	echo $USER_AGENT.' no es un robot';
}

?>