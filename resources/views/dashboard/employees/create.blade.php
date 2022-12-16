@extends('layouts.dashboard.master')

@section('title', 'Employees')

@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container .select2-selection--single {
            height: 2.5rem;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Employees" sub-page="Create" route="employees" />
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
                            <h3 class="card-title">Create Employee</h3>
                        </div>
                        <!-- /.card-header -->


                        <!-- form start -->
                        <form action="{{ route('dashboard.employees.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <!-- first_name -->
                                <div class="form-group">
                                    <label for="inputfirstname"> First Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="inputfirstname" name="first_name" value="{{ old('first_name') }}"
                                        placeholder="Enter Employee first name" required>

                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- last_name -->
                                <div class="form-group">
                                    <label for="inputlastname"> Last Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="inputlastname" name="last_name" value="{{ old('last_name') }}"
                                        placeholder="Enter Employee first name" required>

                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email<span class="required-field">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter Employee email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- phone -->
                                <div class="form-group">
                                    <label for="inputphone">Phone <span class="required-field">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="inputphone" name="phone" value="{{ old('phone') }}"
                                        placeholder="Enter Employee phone" required>

                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- occupation -->
                                <div class="form-group">
                                    <label for="inputoccupation">Occupation <span class="required-field">*</span></label>
                                    <input type="text" class="form-control @error('occupation') is-invalid @enderror"
                                        id="inputoccupation" name="occupation" value="{{ old('occupation') }}"
                                        placeholder="Enter Employee occupation" required>

                                    @error('occupation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- company_id -->
                                <div class="form-group">
                                    <label for="inputcompany_id"> Company <span class="required-field">*</span></label>
                                    <select name="company_id" id="companies"
                                        class="form-control companies-select-element @error('company_id') is-invalid @enderror"
                                        required>
                                        <option value="">Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.companies-select-element').select2();
        });
    </script>
@endpush
