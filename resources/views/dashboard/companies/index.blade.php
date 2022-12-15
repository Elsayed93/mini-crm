@extends('layouts.dashboard.master')

@section('title', 'Companies')


@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Companies" sub-page="index" route="companies" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header mb-3">
                            <h3 class="card-title">
                                <a href="#" class="btn btn-block btn-primary">Add Company</a>
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <table class="table table-hover text-nowrap" id="companies-datatable-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Revenue</th>
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
            $('#companies-datatable-table').DataTable({
                processing: true,
                serverSide: true,
                "dom": "flrtip",

                ajax: "{{ route('dashboard.companies.data') }}",

                "columns": [{
                        "searchable": false,
                        "data": "id"
                    },
                    {
                        "data": "name",
                    },
                    {
                        "data": "email",
                    },
                    {
                        "searchable": false,
                        "sortable": false,
                        "data": "logo_image_path",
                        render: function(data) {
                            return `<img src="${data}" class="img-thumbnail" width=80>`;
                        }
                    },
                    {
                        "data": "website",
                    },
                    {
                        "data": "revenue",
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
