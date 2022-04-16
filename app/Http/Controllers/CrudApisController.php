<?php

namespace App\Http\Controllers;

use App\Models\CrudApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CrudApisController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$result = CrudApi::all();
		if ($result) {
			return Response::json(['data' => $result], 200);
		}
		return Response::json(['data' => false], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"name"=> "required",
			"description"=> "required",
			"logo"=> "required",
		]);
		$crud = new CrudApi;
		$crud->name = $request->name;
		$crud->description = $request->description;
		$crud->logo = $request->logo;
		$result = $crud->save();
		if ($result) {
			return Response::json(['data' => $result], 200);
		}
		return Response::json(['data' => false], 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$result = CrudApi::find($id);
		if ($result) {
			return Response::json(['data' => $result], 200);
		}
		return Response::json(['data' => false], 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$crud =  CrudApi::find($id);
		if (!$crud) {
			return Response::json(['data' => "no item found"], 200);
		};
		if ($request->name) {
			$crud->name = $request->name;
		}
		if ($request->description) {
			$crud->description = $request->description;
		}
		if ($request->logo) {
			$crud->logo = $request->logo;
		}
		$result= $crud->save();
		if ($result) {
			return Response::json(['data' => true], 200);
		}
		return Response::json(['data' => false], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$crud =  CrudApi::find($id);
		if (!$crud) {
			return Response::json(['data' => "no item found"], 200);
		};
		$result = $crud->delete();
		if ($result) {
			return Response::json(['data' => true], 200);
		}
		return Response::json(['data' => false], 200);
	}
}
