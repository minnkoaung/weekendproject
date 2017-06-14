@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
               <form method="post" action="{{ route('users.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class='form-control' name="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class='form-control' name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class='form-control' name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" class='form-control' name="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            @foreach($roles as $role)
                            <label class="checkbox-inline"><input name="roles[]" type="checkbox" value="{{ $role->id }}">{{ $role->name }}</label>
                        @endforeach
                        </div>


                        <div class="form-group">

                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>

                        </form>
            </div>
        </div>
    </div>
@endsection
