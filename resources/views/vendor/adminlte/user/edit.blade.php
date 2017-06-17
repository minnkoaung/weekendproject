@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
 
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit user</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             <div class="col-md-12">
             @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form method="post" action="{{route('users.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class='form-control' name="name" value="{{$user->name}}" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class='form-control' name="email" value="{{$user->email}}" placeholder="User Email">
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
                          @foreach($userole as $ur)
                            

                            @if($role->id == $ur->role_id)
                            <label class="checkbox-inline"><input name="roles[]" checked="checked" type="checkbox" value="{{ $role->id }}">{{ $role->name }}</label>
                            
                            @else
                             <label class="checkbox-inline"><input name="roles[]" type="checkbox" value="{{ $role->id }}">{{ $role->name }}</label>
                             
                            @endif
                            
                          @endforeach
                          
                      @endforeach

                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
      </div>
      <!-- /.box -->

     
      <!-- /.row -->

    </section>
    
@endsection
