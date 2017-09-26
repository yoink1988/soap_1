<?php

/**
 * Description of FootballClient
 *
 * @author yoink
 */
class CbrClient
{
	private $soapclient;
	private $curlClient;
	private $wsdl;

	public function setWsdl($wsdlUrl)
	{
		$this->wsdl = $wsdlUrl;
		return $this;
	}

	public function getSoapClient()
	{
		$this->soapclient = new SoapClient($this->wsdl);
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function soapGetGoalKeepers()
	{
		$response = $this->soapclient->AllGoalKeepers(array('sCountryName' => $this->country));
		if($response instanceof stdClass)
		{
			return $this->getArrayFromSoapResponse($response);
		}
	}

	private function getArrayFromSoapResponse(stdClass $response)
	{
	foreach ($response->AllGoalKeepersResult->string as $string)
		{
			$result[] = $string;
		}
		return $result;
	}

	public function getCurlClient()
	{
		$curl_options = array (
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_HEADER => array(
				'Content-Type: application/soap+xml; charset=utf-8',
				'Content-Length: '.strlen('sCountryName='.$this->country)),
			CURLOPT_POSTFIELDS => 'sCountryName='.$this->country
		);
		$this->curlClient = curl_init();
		curl_setopt_array($this->curlClient, $curl_options);
	}

	public function setFuncUrl($url)
	{
		curl_setopt($this->curlClient, CURLOPT_URL, $url);
		return $this;
	}


}
