<?php
$dHoy= date("Y-m-d");
$fecha_carga= date("Y-m-d");
$hora_carga= date("H:i:s",time());  //FORMAT 24HRS

echo "DATE : ".$dHoy." TIME : ".$hora_carga;

$url = isset($_REQUEST['url']) ? $_REQUEST['url'] : 'https://comunidad.comprasdominicana.gob.do/Public/Tendering/OpportunityDetail/Index?noticeUID=DO1.NTC.1131646';//test1, process data

include_once('simple_html_dom.php');

echo "<br>$url<br>";
function extraer($url){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
			 'authority: comunidad.comprasdominicana.gob.do', 
			 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 
			 'accept-language: es-CU,es-419;q=0.9,es;q=0.8,en;q=0.7', 
			 'cache-control: max-age=0', 
			 'cookie: STSSessionCookie=lkd2zixlgqidylg5qvutpvbe; PublicSessionCookie=ez2lbru5ao1iql3ge4xfu2f2', 
			 'sec-ch-ua: "Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"', 
			 'sec-ch-ua-mobile: ?0', 
			 'sec-ch-ua-platform: "Windows"', 
			 'sec-fetch-dest: document', 
			 'sec-fetch-mode: navigate', 
			 'sec-fetch-site: none', 
			 'sec-fetch-user: ?1', 
			 'upgrade-insecure-requests: 1', 
			 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36' 
          ),
        ));

        $result = curl_exec($curl);
        curl_close($curl);

  	return $result;     
}


$data = extraer($url);

if($data==NULL){
	echo "NULL";
}else{
	echo $data;
}

/*
$doc = new DOMDocument('1.0', 'utf-8');
libxml_use_internal_errors(true);
$doc->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', 'utf-8'));
$xpath = new DOMXPath($doc);

$tblContainer = $xpath->query('//table[@id="tblContainer"]');
*/
    
?>
