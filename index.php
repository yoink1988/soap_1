<?php
include_once '/lib/config.php';
include_once '/lib/functions.php';
include_once '/lib/FootballClient.php';

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
echo templateRender($output);
?>