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
		Log::info($categories);
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
