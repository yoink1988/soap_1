<?php

/**
 * Description of CurrencyClient
 *
 * @author yoink
 */
class CurrencyClient
{
	private $soapClient;
	public $curlClient;

	private $wsdl;

	public function setWsdl($wsdlUrl)
	{
		$this->wsdl = $wsdlUrl;
		return $this;
	}

	public function getSoapClient()
	{
		$this->soapClient = new SoapClient($this->wsdl);
	}



	public function soapGetCurrencyCodes()
	{
        $response = $this->soapClient->GetCurrencies();
 //       echo '<pre>';
        $xml = simplexml_load_string($response->GetCurrenciesResult);
        if($response)
        {
           return $this->getArrayFromXml($xml);
        }    
	}

	private function getArrayFromXml($xml)
    {
   //     var_dump($xml);
       // print_r(htmlspecialchars($xml));
        $i=0;
	    foreach ($xml->Table as $elem)
    {
        $result[$i]['name'] = $elem->Name->__toString();
        $result[$i]['CurrencyCode'] = $elem->CurrencyCode->__toString();
        $i++;
	}
		return $result;
	}

	public function getCurlClient()
	{
        $curl_options = array (
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => array(
               'POST /country.asmx/GetCurrencies HTTP/1.1',
                'Host: www.webservicex.net',
                'Content-Type: application/x-www-form-urlencoded',
                'Content-Length: 0'
            ));
		$this->curlClient = curl_init();
        curl_setopt_array($this->curlClient, $curl_options);
	}

	public function setFuncUrl($url)
	{
		curl_setopt($this->curlClient, CURLOPT_URL, $url);
		return $this;
	}

	public function curlGetCurrencyCodes()
	{
		$response = curl_exec($this->curlClient);

		if (!curl_errno($this->curlClient))
        {
           $header_size = curl_getinfo($this->curlClient, CURLINFO_HEADER_SIZE);

			$header = substr($response, 0, $header_size);
			$body = substr($response, $header_size);
            curl_close($this->curlClient);
            
            $body = str_replace("&lt;", "<", "$body");
            $body = str_replace("&gt;", ">", "$body");
            $xml = new SimpleXMLElement($body); 
            return $this->getArrayFromXml($xml->NewDataSet);
		}
	}
	


}
