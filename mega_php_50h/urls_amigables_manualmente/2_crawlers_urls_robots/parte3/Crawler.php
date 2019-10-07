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
				$this->sumaRobots();
			}
		}
		 $this->sumaHumanos();
	}
	
	
	public function sumaRobots(){
		$fp = fopen('robots.txt','r');
		$sumaRobots = fgets($fp);
		$sumaRobots++;
		fclose($fp);
	
		$fp2 = fopen('robots.txt','w');
		fputs($fp2,$sumaRobots);
		fclose($fp2);
	
		$fp3 = fopen('robots.txt','r');
		$resultado = fgets($fp3);
		echo '<br>Total Visitas Robots: '.$resultado;
	}
	
	public function sumaHumanos(){
		$fp = fopen('humanos.txt','r');
		$sumaHumanos = fgets($fp);
		$sumaHumanos++;
		fclose($fp);
	
		$fp2 = fopen('humanos.txt','w');
		fputs($fp2,$sumaHumanos);
		fclose($fp2);
	
		$fp3 = fopen('humanos.txt','r');
		$resultado = fgets($fp3);
		echo '<br>Total Visitas Humanas: '.$resultado;
	}
	
}

?>