<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\User;
use App\Role;
use DB;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware("auth");
        //$this->middleware("superauth");
    }
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
        return view('adminlte::user.create', compact('roles'));
    }
    public function data()
    {

        $queryuser = User::select(['id', 'name', 'email']);
        return Datatables::of($queryuser)->addColumn('option', function ($queryuser) {
                $data = '<a href="users/'.$queryuser->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="users/delete/'.$queryuser->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                return $data;
            })
        ->rawColumns(['option'])
        ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {

        //
       $data = [
        'name'      => $request->input("name"),
        'email'     => $request->input('email'),
        'password'  => bcrypt($request->input('password')),
        'is_admin' => 0,
        'is_super' => 0
        ];

        $user = User::create($data);
        $user->roles()->attach($request->get("roles"));
        return redirect()->route('users.index');
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
       
        $userole  = DB::select('select * from role_users where user_id = :id', ['id' => $id]);
        
        $user = User::FindOrFail($id);
         $roles = Role::select('name', 'id')->get();
        return view('adminlte::user.edit',compact('roles','user','userole'));
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
