@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('roles.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class='form-control' name="name" placeholder="Post Editor">
                </div>
                <div class="form-group">
                    <label for="name">Role Slug</label>
                    <input type="text" class='form-control' name="slug" placeholder="post-editor">
                </div>

                <fieldset>
                  @foreach($permissions as $key => $per)
                      <legend>{{ ucfirst($key) }}</legend>
                      @foreach($per as $p)
                          <div class="checkbox">
                              <label>
                                  <input name="permissions[{{ $p }}]" type="checkbox" value="true">{{ $p }}</label>
                              </label>
                          </div>
                      @endforeach

                      <br>
                  @endforeach

                </fieldset>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
