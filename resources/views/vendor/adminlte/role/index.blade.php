@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Role Management</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('roles.create') }}"><button class="btn btn-success">Create Role</button></a>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover" id="roles-table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Permissions</th>
                                        <th>Option</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                { data: 'permissions', name: 'permissions' },
                { data: 'option', name: 'option', orderable: false, searchable: false}
            ],
            responsive: true
        });
    });



</script>
@endpush
