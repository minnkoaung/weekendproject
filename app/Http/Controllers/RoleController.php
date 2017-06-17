<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Role;
use App\Http\Requests\StoreRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware("auth");
        //$this->middleware("is_super");
        
    }
    public function index()
    {
        //
        return view("adminlte::role.index");
    }
   

    public function data()
    {

        $queryrole = Role::select(['id', 'name', 'slug', 'permissions']);
        return Datatables::of($queryrole)
        ->addColumn('permissions', function ($queryrole) {
                foreach ($queryrole->permissions as $key => $value) {
                    # code...
                    $data[] = $key;
                }
                return $data;
            })
        ->addColumn('option', function ($queryrole) {
                $data = '<a href="roles/'.$queryrole->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="roles/delete/'.$queryrole->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                return $data;
            })
        ->rawColumns(['option'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = config('role-permissions');
        return view('adminlte::role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
       Role::create($request->input());
        return redirect()->route('roles.index');
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
        
        $role = Role::FindOrFail($id);
        $permissions = config('role-permissions');
        return view('adminlte::role.edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        Role::findOrFail($id)->update($request->all());
        return redirect()->route('roles.index');
        
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
        Role::destroy($id);
        return redirect()->route("roles.index");
    }
}