@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Role</h3>

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
                <form  action="{{ route('roles.update', $role->id) }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class='form-control' value="{{$role->name}}" name="name" placeholder="Post Editor">
                    </div>
                    <div class="form-group">
                        <label for="name">Role Slug</label>
                        <input type="text" class='form-control' value="{{$role->slug}}" name="slug" placeholder="post-editor">
                    </div>
                    <fieldset>
                        
                        @foreach($permissions as $key => $per)
                        
                            <legend>{{ ucfirst($key) }}</legend>
                          
                           
                            @foreach($per as $p)
                               
                                   @if(isset($role->permissions[$p]))
                                        <div class="checkbox">
                                       
                                           
                                             <label>
                                            <input name="permissions[{{ $p }}]" checked="checked" type="checkbox" value="true">{{ $p }} </label>
                                       
                                    </div>
                                    @else
                                    <div class="checkbox">
                                       
                                           
                                             <label>
                                            <input name="permissions[{{ $p }}]"  type="checkbox" value="true">{{ $p }} </label>
                                       
                                    </div>
                                   @endif
                                   
                                    
                            @endforeach
                            <br>
                        
                        @endforeach
                    </fieldset>
                    <form action="{{ route('roles.store', $role->id) }}"
                >
                    {{ csrf_field() }}
                    {{ method_field("patch") }}
                    <button type="submit" class="btn btn-primary">Update Role</button>
                </form>
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


