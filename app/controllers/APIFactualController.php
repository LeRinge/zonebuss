<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
class APIFactualController extends \BaseController {



	public function places(){

		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng')
			);
		$clientFactual = new Client();
		$API_KEY_FACTUAL = Config::get('app.API_KEY_FACTUAL');
		$URL_API_FACTUAL = Config::get('app.URL_API_FACTUAL');
		$URL = $URL_API_FACTUAL;

		$request = $clientFactual->createRequest('GET',$URL);
		RedisConector::SetCodes();
		$codes=RedisConector::GetCodes($data['category']);
		Log::info('codes from API'.$codes);
		$query = $request->getQuery();
		$query->set('filters', '{"category_ids":{"$includes_any":['. $codes .']}}');
		$query->set('geo','{"$circle":{"$center":['.(string)$data['lat'].','.(string)$data['lng'].'],"$meters":550}}');
		$query->set('KEY',$API_KEY_FACTUAL);
		$response = $clientFactual->send($request);
		$json = $response->json();

		
		$dataArray=$json['response']['data'];
		$places=array();

		foreach ($dataArray as $key) {
			array_push($places, array(
				'name'=>$key['name'],
				'lat'=>$key['latitude'],
				'ln'=>$key['longitude']
			));
		}

		return json_encode($places);


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
