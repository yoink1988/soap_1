<?php

function templateRender($array)
{
	$template = file_get_contents(TEMPLATE);
	foreach($array as $key => $val)
	{
		$template = str_replace($key, $val, $template);
	}
	echo $template;
   }


function makeList(array $data, $ul=true)
{
	$list ='';
	if($ul)
	{
		$list .='<ul>';
	}
	else
	{
		$list .='<ol>';
	}
	foreach($data as $row)
	{
		$list .='<li>'.$row.'</li>';
	}
	if($ul)
	{
		$list .='</ul>';
	}
	else
	{
		$list .='</ol>';
	}
	return $list;
}


function makeListCurr(array $data, $ul=true)
{
	$list ='';
	if($ul)
	{
		$list .='<ul>';
	}
	else
	{
		$list .='<ol>';
	}
	foreach($data as $country )
	{
		$list .='<li>Country:'.$country['name'].', currency code - '.$country['CurrencyCode'].'</li>';
	}
	if($ul)
	{
		$list .='</ul>';
	}
	else
	{
		$list .='</ol>';
	}
	return $list;
}

