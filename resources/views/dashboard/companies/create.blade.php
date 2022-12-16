@extends('layouts.dashboard.master')

@section('title', 'Companies')


@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header main-page="Companies" sub-page="create" route="companies" />
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
                            <h3 class="card-title">Create Company</h3>
                        </div>
                        <!-- /.card-header -->


                        <!-- form start -->
                        <form action="{{ route('dashboard.companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <!-- name -->
                                <div class="form-group">
                                    <label for="inputName">Company Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="inputName" name="name" value="{{ old('name') }}"
                                        placeholder="Enter company name" required>

                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span
                                            class="required-field">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter company email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- website -->
                                <div class="form-group">
                                    <label for="inputwebsite">Company Website <span class="required-field">*</span></label>
                                    <input type="url" class="form-control @error('website') is-invalid @enderror"
                                        id="inputwebsite" name="website" value="{{ old('website') }}"
                                        placeholder="Enter company website" required>

                                    @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- revenue -->
                                <div class="form-group">
                                    <label for="inputrevenue">Company Revenue <span class="required-field">*</span></label>
                                    <input type="number" class="form-control @error('revenue') is-invalid @enderror"
                                        id="inputrevenue" name="revenue" value="{{ old('revenue') }}"
                                        placeholder="Enter company revenue" required step=".01">

                                    @error('revenue')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- logo -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Logo <span class="text-muted">(optional)</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input imgInp @error('logo') is-invalid @enderror"
                                                id="exampleInputFile" name="logo">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            @error('logo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- logo preview -->
                                    <div class="form-group">
                                        <img src="" alt="" class="img-thumbnail image-show" width="100"
                                            style="display: none;">
                                    </div>
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
