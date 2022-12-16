@extends('layouts.dashboard.master')

@section('title', 'Employees')


@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Employees" sub-page="index" route="employees" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header mb-3">
                            <h3 class="card-title">
                                <a href="{{ route('dashboard.employees.create') }}" class="btn btn-block btn-primary">Add
                                    Employee</a>
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <table class="table table-hover text-nowrap" id="Employees-datatable-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Occupation</th>
                                        <th>Company</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#Employees-datatable-table').DataTable({
                processing: true,
                serverSide: true,
                "dom": "flrtip",

                ajax: "{{ route('dashboard.employees.data') }}",

                "columns": [{
                        "searchable": false,
                        "sortable": false,
                        "data": "DT_RowIndex"
                    },
                    {
                        "data": "first_name",
                    },
                    {
                        "data": "last_name",
                    },
                    {
                        "data": "email",
                    },
                    {
                        "data": "phone",
                    },
                    {
                        "data": "occupation",
                    },
                    {
                        "searchable": false,
                        "data": "company",
                        render: function(data) {
                            return `<a href="Employees/${data.company_id}">${data.company_name}</a>`;
                        }
                    },
                    {
                        "searchable": false,
                        "sortable": false,
                        "data": "actions"
                    },
                ]
            });
        });
    </script>
@endpush
