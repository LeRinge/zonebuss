<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class APIGoogleGeoController extends \BaseController {


	public function geocode(){
		
		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng')
			);

		$client = new Client();
		$API_KEY_GOOGLE_GEO = Config::get('app.API_KEY_GOOGLE_GEO');
		$URL_GOOGLE_GEO = Config::get('app.URL_GOOGLE_GEO');
		$URL=$URL_GOOGLE_GEO . (string)$data['lat'] . ',' . (string)$data['lng'] .'&key' . $API_KEY_GOOGLE_GEO;
		$request = $client->createRequest('GET',$URL);
		$response = $client->send($request);
		$json = $response->json();
		$direction=$json['results'][0]['formatted_address'];
		
		return Response::json(array('direccion' => $direction));
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
