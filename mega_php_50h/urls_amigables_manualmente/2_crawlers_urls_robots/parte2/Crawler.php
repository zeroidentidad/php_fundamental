<?php

class Crawler
{
	
	public function esCrawler($agente_usuario){
		
		$bot_strings = Array(
			'google',  'bot',
			'yahoo', 'spider',
			'archiver', 'curl',
			'python', 'nambu',
			'twitt', 'perl',
			'sphere', 'PEAR',
			'java', 'wordpress',
			'radian', 'crawl',
			'monitor', 'facebookexternal'
		);
		
		foreach($bot_strings as $bot){
			if(strpos(strtolower($agente_usuario),$bot) !== false){
				return true;
			}
		}
		return false;
	}
	
	
}

?>