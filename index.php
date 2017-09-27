<?php
include_once './lib/config.php';
include_once './lib/functions.php';
include_once './lib/FootballClient.php';
include_once './lib/CurrencyClient.php';




if(isset($_POST['soapCurr']))
{
    $currClient = new CurrencyClient();
    $currClient->setWsdl(CURRENCY_SERVICE)->getSoapClient();
    $res = $currClient->soapGetCurrencyCodes(); 
}

if(isset($_POST['curlCurr']))
{
    $currClient = new CurrencyClient();
    $currClient->getCurlClient();
    $currClient->setFuncUrl('http://webservicex.net/country.asmx/GetCurrencies');
    $res = $currClient->curlGetCurrencyCodes();
  //  echo'<pre>';
   // var_dump($res);
}

if(isset($_POST['soapFoot']))
{
	$footClient = new FootballClient();
	$footClient->setWsdl(FOOTBALL_SERVICE)->getSoapClient();
	if(!empty($_POST['country']))
	{
		$footClient->setCountry($_POST['country']);
	}
	$result = $footClient->soapGetGoalKeepers();
}

if(isset($_POST['curl']))
{
	$footClient = new FootballClient();

	if($_POST['country'])
	{
		$footClient->setCountry($_POST['country']);
	}
	$footClient->getCurlClient();
	$footClient->setFuncUrl('http://footballpool.dataaccess.eu/data/info.wso/AllGoalKeepers');
	$result = $footClient->curlGetGoalKeepers();
}

if(isset($result))
{
	$output['%output%'] = makeList($result, false);
}
else
{
	$output['%output%'] = '';
}

if(isset($res))
{
    $output['%outCurr%'] = makeListCurr($res, false);
}
else
{
	$output['%outCurr%'] = '';
}
echo templateRender($output);
?>
