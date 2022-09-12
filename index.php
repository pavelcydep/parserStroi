<?php
header('Content-type: text/html; charset=utf-8');
require 'phpQuery.php';

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}
function parserPagination($url){
	$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);

	$arr['table'] = array();
	foreach($doc->find('.product-name a') as $article){
	$article = pq($article);
	$title=$article->attr('title');
	$arr['table']=$title;
	}
	
	
	foreach($doc->find('.price') as $article){
		$articlek = pq($article);
		$price=$articlek->text();
		$arr['table']=$price;
	}
	
$arr['table']=[$title,$price];
print_r($arr['table']);
}

function parser($url){
	
		$file = file_get_contents($url);
		$doc = phpQuery::newDocument($file);
		foreach($doc->find('.product-name a') as $article)
		{
			$article = pq($article);
            
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

