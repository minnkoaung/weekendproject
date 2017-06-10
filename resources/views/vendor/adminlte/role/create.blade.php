@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="store">
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