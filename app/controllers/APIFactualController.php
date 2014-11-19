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


		//venues/search?ll=19.419444, -99.145556&radius=450
		$clientFactual = new Client();
		$API_KEY_FACTUAL = Config::get('app.API_KEY_FACTUAL');
		$URL_API_FACTUAL = Config::get('app.URL_API_FACTUAL');
		//filters={"category_ids":{"$includes_any":[169]}}&geo={"$circle":{"$center":[19.413528, -99.166771],"$meters":1550}}&KEY=XNvygYbb7WZuLf6JLdeJ1dXtiCGQJHW2qc8IJ0En
		$URL = $URL_API_FACTUAL;
		$request = $clientFactual->createRequest('GET',$URL);
		$query = $request->getQuery();
		$query->set('filters', '{"category_ids":{"$includes_any":[2]}}');
		$query->set('geo','{"$circle":{"$center":['.(string)$data['lat'].','.(string)$data['lng'].'],"$meters":550}}');
		$query->set('KEY',$API_KEY_FACTUAL);
		Log::info($request);
		$response = $clientFactual->send($request);
		$json = $response->json();
		Log::info($json);

		return $json;


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
