@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
   <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add New user</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('roles.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class='form-control' name="name" placeholder="Role Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Role Slug</label>
                        <input type="text" class='form-control' name="slug" placeholder="Role Slug">
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


@push('scripts')
<script>
    $(function() {
        $('#roles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('roles.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'permissions', name: 'permissions' }
            ]
        });
    });
</script>
@endpush