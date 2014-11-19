<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
class APIFoursquareController extends \BaseController {



	public function places(){

		$data=array(
			'category' =>Input::get('category'),
			'lat'=> Input::get('lat'),
			'lng'=> Input::get('lng'),
			'lat_lng' => Input::get('lat_lng')
			);


		//venues/search?ll=19.419444, -99.145556&radius=450
		$clientFoursquare = new Client();
		$CLIENT_ID_API_FOURSQUARE = Config::get('app.CLIENT_ID_API_FOURSQUARE');
		$CLIENT_SECRECT_FOURSQUARE = Config::get('app.CLIENT_SECRECT_FOURSQUARE');
		$URL_FOURSQUARE_API =Config::get('app.URL_FOURSQUARE_API');
		$URL=$URL_FOURSQUARE_API . (string)$data['lat'] . ',' . (string)$data['lng'] . '&query='. 'pet mascota' .'&radius=800&limit=20&day=any' .'&client_id=' . $CLIENT_ID_API_FOURSQUARE . '&client_secret=' . $CLIENT_SECRECT_FOURSQUARE . '&v=20141118';
		$request = $clientFoursquare->createRequest('GET',$URL);
		$response = $clientFoursquare->send($request);
		$json = $response->json();
		

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
