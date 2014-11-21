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
		RedisConector::SetCodes();
		$codes=RedisConector::GetCodes($data['category']);

	    $OAUTH_KEY_FACTUAL = Config::get('app.OAUTH_KEY_FACTUAL');
	    $OAUTH_SECRECT_FACTUAL = Config::get('app.OAUTH_SECRECT_FACTUAL');
		
		$factual = new Factual($OAUTH_KEY_FACTUAL,$OAUTH_SECRECT_FACTUAL);
		$query = new FactualQuery;
    	$query->limit(20);
    	$query->only("name,latitude,longitude");
    	$query->within(new FactualCircle($data['lat'],$data['lng'], 550));
    	$query->field("category_ids")->includesAny(array_values($codes));
    	
    	$res = $factual->fetch("places", $query);
    	
    	$resJson = $res->getDataAsJSON();
    	$resJsonArray=array();
    	array_push($resJsonArray,array('latitude' => $data['lat'],
    									'longitude' => $data['lng'],
    									'name' => 'Your place',
    									'$distance' => 0
    									));
    	$dataFinal=array_merge($resJsonArray,json_decode($resJson));
		return json_encode($dataFinal);


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
