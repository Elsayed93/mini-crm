@extends('layouts.dashboard.master')

@section('title', 'Companies')


@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Companies" sub-page="Show" route="companies" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Show Company</h3>
                        </div>
                        <!-- /.card-header -->


                        <!-- form start -->
                        <form>

                            <div class="card-body">
                                <!-- name -->
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" value="{{ $company->name }}" disabled>
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" value="{{ $company->email }}" disabled>
                                </div>

                                <!-- website -->
                                <div class="form-group">
                                    <label for="inputwebsite">Company Website</label>
                                    <input type="url" class="form-control" value="{{ $company->website }}" disabled>

                                </div>

                                <!-- revenue -->
                                <div class="form-group">
                                    <label>Company Revenue</label>
                                    <input type="number" class="form-control" value="{{ $company->revenue }}">

                                </div>

                                <!-- logo -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Logo <span class="text-muted">(optional)</span></label>

                                    <!-- logo preview -->
                                    <div class="form-group">
                                        <img src="{{ $company->logo_image_path }}" alt="" class="img-thumbnail"
                                            width="100">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                    <!-- /.card -->



                    <div class="card card-primary mt-5">
                        <div class="card-header mb-3">
                            <h3 class="card-title">
                                Company Employees
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <table class="table table-hover text-nowrap" id="company-employees-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Occupation</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#company-employees-table').DataTable({
                processing: true,
                serverSide: true,
                "dom": "flrtip",

                ajax: {
                    url: "{{ route('dashboard.company.employees') }}",
                    data: {
                        company_id: "{{ $company->id }}",
                    }
                },

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
                ]
            });
        });
    </script>
@endpush
