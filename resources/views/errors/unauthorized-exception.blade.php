@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
   <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">Role Management</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Unauthorized Access</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

