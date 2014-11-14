<?php
use GuzzleHttp\Client;
class APIBBVAController extends \BaseController {





	public function Categories(){

		$client = new Client();
		$url = Config::get('app.URL_BBVA_API');
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $client->createRequest('GET', $url);
		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$response = $client->send($request);
		$json = $response->json();
		$categories = $json["data"]["categories"];
		return $categories;

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

		 Log::info(Input::get('lat_lng'));
		$data1=array(
			'category' =>Input::get('category'),
			'lat'=> '19.44',
			'lng'=>'-99.18'
			);
		$client = new Client();
		$API_KEY_GOOGLE_GEO = Config::get('app.API_KEY_GOOGLE_GEO');
		$URL_GOOGLE_GEO = Config::get('app.URL_GOOGLE_GEO');
		$URL=$URL_GOOGLE_GEO . (string)$data['lat'] . ',' . (string)$data['lng'] .'&key' . $API_KEY_GOOGLE_GEO;
		$request = $client->createRequest('GET',$URL);
		$response = $client->send($request);
		$json = $response->json();
		$direction=$json['results'][0]['formatted_address'];
		Log::info($json['results'][0]['formatted_address']);

		//venues/search?ll=19.419444, -99.145556&radius=450
		$clientFoursquare = new Client();
		$CLIENT_ID_API_FOURSQUARE = Config::get('app.CLIENT_ID_API_FOURSQUARE');
		$CLIENT_SECRECT_FOURSQUARE = Config::get('app.CLIENT_SECRECT_FOURSQUARE');
		$URL_FOURSQUARE_API =Config::get('app.URL_FOURSQUARE_API');
		$URL=$URL_FOURSQUARE_API . (string)$data['lat'] . ',' . (string)$data['lng'] . '&radius=450' . '&query='. 'mascota' .'&client_id=' . $CLIENT_ID_API_FOURSQUARE . '&client_secret=' . $CLIENT_SECRECT_FOURSQUARE . '&v=20141114';
		$request = $client->createRequest('GET',$URL);
		$response = $client->send($request);
		$json = $response->json();
		Log::info($json);


		$clientBBVA = new Client();
		$url = Config::get('app.URL_BBVA_API');
		$url = 'https://apis.bbvabancomer.com/datathon/tiles/'. (string)$data['lat'] . '/' . (string)$data['lng'] . '/basic_stats?category=mx_pet&date_min=20131101&date_max=20140430&group_by=month';
		Log::info($url);
		$API_ID = Config::get('app.API_ID');
		$APP_KEY = Config::get('app.APP_KEY');
		$APP_ID_BASE64 =Config::get('app.APP_ID_BASE64');
		$request = $client->createRequest('GET', $url);
		$request-> setHeader("Authorization",$APP_ID_BASE64);
		$response = $client->send($request);
		$json = $response->json();
		Log::info($json);
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
