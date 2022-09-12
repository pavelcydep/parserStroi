<?php
header('Content-type: text/html; charset=utf-8');
require 'phpQuery.php';

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}
function parserPagination($url){
	$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);

	

$entry = $doc->find('.f-fix');
foreach ($entry as $row) 
{
	$row = pq($row);
	$name = $row->find('.product-name a')->attr('title');
	$value = $row->find('.regular-price')->text();
	$data['table'][$name] = $value;
}

foreach ($data['table'] as $x => $val) {
	echo "$x = $val<br>";
  } 

}

function parser($url){
	
		$file = file_get_contents($url);
		$doc = phpQuery::newDocument($file);
		foreach($doc->find('.product-name a') as $article)
		{
			$article = pq($article);
            
		}
        $entry = $doc->find('.f-fix');
		foreach ($entry as $row) 
		{
			$row = pq($row);
			$name = $row->find('.product-name a')->attr('title');
			$value = $row->find('.regular-price')->text();
			$data['table'][$name] = $value;
		}

		foreach ($data['table'] as $x => $val) {
			echo "$x = $val<br>";
		} 
		



		$posts = $doc->find('.pages ol li a');
		foreach($posts as $post){
			$pqLink = pq($post); 
			$nexts[] = $pqLink->attr('href');
			
			}
		for ($i = 0; $i <= 2; $i++) 
		{
			parserPagination($nexts[$i]);
			
		}
		
	
		}	
		
$url = 'https://armatura-optom.ru/armatura';

parser($url);

