<?php

namespace App\Http\Controllers;

use Alert;
use App\Role;
use Datatables;
use Illuminate\Http\Request;

class RoleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view("adminlte::role.index",compact('queryrole'));

	}

	public function data() {
		$queryrole = Role::select(['id', 'name', 'slug', 'permissions']);
		return Datatables::of($queryrole)->addColumn('option', function ($queryrole) {
			$data = '<a href="roles/' . $queryrole->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;
                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">delete</button>
								<!-- Modal -->
								  <div id="myModal" class="modal fade" role="dialog">
								    <div class="modal-dialog">
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Do you really wanna delete?</h4>
								        </div>
								        <div class="modal-body">
								          <p> <span class="text-danger"><b>' . $queryrole->name . '</b></span> will be delete Forever. It will not be undone.</p>
								        </div>
								        <div class="modal-footer">

													<button class="deleteProduct btn btn-danger" data-id="'.$queryrole->id.'" data-token="{{ csrf_token() }}" >Delete</button>
								          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        </div>
								      </div>
								    </div>
								  </div>

                ';
			return $data;
		})
			->rawColumns(['option'])
			->make(true);
	}

	/**
	 * Show the form for creating a new resource.

	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$permissions = config('role-permissions');
		return view('adminlte::role.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Role::create($request->input());
		return redirect()->route('roles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		// get the role_by_id
		$roles = Role::find($id);
		//get permission
		$permissions = config('role-permissions');
		return view('adminlte::role.edit', compact('roles', 'permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$roles = Role::find($id);
		dd($roles);
	}

}
