@extends('admin.layout.app')
@section('pageTitle', 'Account Details')
@section('content')

    <div class="main-content">
        <div class="page-content">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Account Details</h4>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">


                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            

                            <form action="" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="account_name" class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="bank" class="form-label">Bank</label>
                                    <select class="form-select" id="bank" name="bank" required>
                                        <option value="" disabled selected>Select a Bank</option>
                                        <option value="Access Bank">Access Bank</option>
                                        <option value="First Bank">First Bank</option>
                                        <option value="GTBank">GTBank</option>
                                        <option value="Zenith Bank">Zenith Bank</option>
                                        <!-- Add more banks as needed -->
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page-content -->
        </div>
    @endsection
