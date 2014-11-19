<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class APIBBVAController extends \BaseController {

	public function Categories(){
		
		$client = new Client();
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
		return $categories;

	}
	public function TestRedisLocal(){
		$SET=RedisConector::GetCodes();
		$redis = new Predis\Client();
		$redis->set('foo1', 'barLuis');
		$value = $redis->get('foo1');
		return $value.$SET;
	}
	public function TestRedis(){
		$redis = new Predis\Client(array(
		    'host' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_HOST),
		    'port' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PORT),
		    'password' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PASS),
		));
		$redis->set('foo', 'bar');
		$value = $redis->get('foo');
		return $value;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function find()
	{
		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng')
			);
		
		$clientBBVA = new Client();
		$url = Config::get('app.URL_BBVA_API');
		$url = 'https://apis.bbvabancomer.com/datathon/tiles/'. (string)$data['lat'] . '/' . (string)$data['lng'] . '/basic_stats?category=mx_food&date_min=20131101&date_max=20140430&group_by=month';
		Log::info($url);
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $clientBBVA->createRequest('GET', $url);
		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$response = $clientBBVA->send($request);
		$json = $response->json();
		Log::info($json);

		return $json;


		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
