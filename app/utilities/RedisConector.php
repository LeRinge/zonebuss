<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RedisConector {
    public static function GetCodes($category) {
       
      $redis = new Predis\Client(array(
		    'host' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_HOST),
		    'port' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PORT),
		    'password' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PASS),
		));
        //$redis = new Predis\Client();
       	$codes =$redis->smembers($category);
		return $codes;
    }
     public static function SetCodes() {
        
       /* $client = new Client();
		$url = Config::get('app.URL_BBVA_API');
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $client->createRequest('GET', $url);
		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$request-> setHeader("Accept-Language",'ES');
		$response = $client->send($request);
		$json = $response->json();
		$categories = $json["data"]["categories"];
		*/
		//These codes are from categories Factual
		$codesArray=array ( "mx_auto" => array ('2'),
							"mx_barsandrestaurants" => array ('312','347'),
							"mx_beauty" => array ('128','280'),
							"mx_book" => array ('130'),
							"mx_constructionmaterials" => array ('137','447'),
							"mx_education" => array ('26'),
							"mx_travel" => array ('430'),
							"mx_food" => array ('149','338'),
							"mx_health" => array ('62'),
							"mx_home" => array ('235'),
							"mx_hyper" => array ('169'),
							"mx_jewelry" => array ('144'),
							"mx_leisure" => array ('317'),
							"mx_music" => array ('140','162','333'),
							"mx_office" => array ('444'),
							"mx_others" => array (''),
							"mx_pet" => array ('167'),
							"mx_services" => array ('177'),
							"mx_shoes" => array ('145'),
							"mx_sport" => array ('372'),
							"mx_tech" => array ('460'),
							"mx_fashion" => array ('142')
                          );
		$redis = new Predis\Client(array(
		    'host' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_HOST),
		    'port' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PORT),
		    'password' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PASS),
		));
		//$redis = new Predis\Client();
		$redis->flushall();			
		foreach ($codesArray as $key => $value) {
			
			if($redis->exists($key)==0){
					foreach($value as $item) {
					$redis->sadd($key,$item);
				}
			}
		}
	}
}