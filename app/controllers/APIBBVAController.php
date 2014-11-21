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
		
		$SET=RedisConector::GetCodes('mx_car');
		return $SET;
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
		$url = 'https://apis.bbvabancomer.com/datathon/tiles/'. (string)$data['lat'] . '/' . (string)$data['lng'] . '/basic_stats';
		$request = $clientBBVA->createRequest('GET', $url);
		$query = $request->getQuery();
		$query->set('category',$data['category']);
		$query->set('date_min','20131101');
		$query->set('date_max','20140430');
		$query->set('group_by','month');
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		
		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$response = $clientBBVA->send($request);
		$json = $response->json();

		return $json;


		
	}
	public function consumptionPattern(){

		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng'),
			'date'=> Input::get('date')
			);
		$client = new Client();
		$url = Config::get('app.URL_TILES');
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $client->createRequest('GET', $url .(string)$data['lat'].'/'.(string)$data['lng'].'/consumption_pattern');
		$query = $request->getQuery();
		$query->set('category', $data['category']);
		$query->set('group_by','month');
		if($data['date']=='Nov'){
			$query->set('date_min','20131101');
			$query->set('date_max','20131130');
		} elseif ($data['date']=='Dic') {
			$query->set('date_min','20131201');
			$query->set('date_max','20131231');
		} elseif ($data['date']=='Ene') {
			$query->set('date_min','20140101');
			$query->set('date_max','20140131');
		} elseif ($data['date']=='Feb') {
			$query->set('date_min','20140201');
			$query->set('date_max','20140228');
		} elseif ($data['date']=='Mar') {
			$query->set('date_min','20140301');
			$query->set('date_max','20140331');
		} elseif ($data['date']=='Abr') {
			$query->set('date_min','20140401');
			$query->set('date_max','20140430');
		} 

		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$request-> setHeader("Accept-Language",'ES');
		$response = $client->send($request);
		$json = $response->json();
		$dataJson=$json['data']['stats'];
		$dataFinal=array();
		$num_payments=0;
		Log::info($dataJson);

		$max=0;
		
		foreach ($dataJson as $item) {
				foreach ($item['days'] as  $item2) {
						array_push($dataFinal,array('day' =>  $item2['day'],
													'num_payments'=> $item2['num_payments'],
													'avg'=>$item2['avg']
													));
				}
					$max=0;
		}
		return json_encode($dataFinal);

	}

	
	public function paymentDistribution(){

		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng')
			);
		$client = new Client();
		$url = Config::get('app.URL_TILES');
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $client->createRequest('GET', $url .(string)$data['lat'].'/'.(string)$data['lng'].'/payment_distribution');
		$query = $request->getQuery();
		$query->set('category', $data['category']);
		$query->set('date_min','20131101');
		$query->set('date_max','20140430');
		$query->set('group_by','month');

		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$request-> setHeader("Accept-Language",'ES');
		$response = $client->send($request);
		$json = $response->json();
		$dataJson=$json['data']['stats'];
		$dataFinal=array();
		$num_payments=0;
		Log::info($dataJson);
		foreach ($dataJson as $item) {
				foreach ($item['histogram'] as $item2 ) {
						$num_payments+=$item2['num_payments'];
				}


				array_push($dataFinal,array('date' => $item['date'],
											'num_payments'=>$num_payments
											));
				$num_payments=0;
		}
		return json_encode(array_values($dataFinal));

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
