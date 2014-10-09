<?php

use Illuminate\Routing\Controller;

class AssetController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /asset
	 *
	 * @return Response
	 */
	public function index()
	{
		return Asset::all();
	}
	
	public function latest()
	{
		return Asset::where('id', '<', '100')->get();
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /asset
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		
		$rules = array();
		
		$validator = Validator::make($data, $rules);
		
		if ($validator->fails()) {
			$messages = $validator->messages();
			return Response::json(array(
				'error'=>true,
				'message'=>$messages->toArray(),
				400
			));		
		} else {
			$asset = new Asset;
			$asset->name = Input::get('name');
			$asset->save();
			return Response::json(array(
				'error'=>false,
				'message'=>'Asset created',
				200
			));
		}
	}

	/**
	 * Display the specified resource.
	 * GET /asset/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Asset::where('id', '=', $id)->get();
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /asset/{id}/edit
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
	 * PUT /asset/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		Asset::find($id)->delete();
		return Response::json([
			'error'=>false,
			'message'=>'Asset deleted'y

		]);		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /asset/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
