@extends('layouts.dashboard.master')

@section('title', 'Employees')

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Employees" sub-page="Show" route="employees" />
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
                            <h3 class="card-title">Show Employee</h3>
                        </div>
                        <!-- /.card-header -->


                        <!-- form start -->
                        <form>

                            <div class="card-body">
                                <!-- first_name -->
                                <div class="form-group">
                                    <label>
                                        First Name
                                    </label>

                                    <input type="text" class="form-control" value="{{ $employee->first_name }}" disabled>
                                </div>

                                <!-- last_name -->
                                <div class="form-group">
                                    <label>
                                        Last Name
                                    </label>
                                    <input type="text" class="form-control" value="{{ $employee->last_name }}" disabled>
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $employee->email }}" disabled>

                                </div>

                                <!-- phone -->
                                <div class="form-group">
                                    <label>Phone </label>
                                    <input type="text" class="form-control" value="{{ $employee->phone }}" disabled>
                                </div>

                                <!-- occupation -->
                                <div class="form-group">
                                    <label>Occupation </label>
                                    <input type="text" class="form-control" value="{{ $employee->occupation }}" disabled>
                                </div>

                                <!-- company_id -->
                                <div class="form-group">
                                    <label> Company </label>

                                    <select class="form-control" disabled>
                                        <option value=""> {{ $employee->company->name }} </option>
                                    </select>

                                </div>

                            </div>
                            <!-- /.card-body -->

                        </form>
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
