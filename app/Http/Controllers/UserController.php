<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\User;
use App\Role;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("adminlte::user.index");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::select('name', 'id')->get();
        return view("adminlte::user.create", compact("roles"));
        
    }
    public function data() {
        return Datatables::of(User::query())->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          $data = [
        'name'      => $request->input("name"),
        'email'     => $request->input('email'),
        'password'  => bcrypt($request->input('password'))
        ];
        $user = User::create($data);
        $user->roles()->attach($request->get("roles"));
        return redirect()->route("users.index");

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}